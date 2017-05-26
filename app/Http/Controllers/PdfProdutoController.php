<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
class PdfProdutoController extends Controller
{


    public function index()
    {
      $produtos = Produto::with('categoria')->where('user_id', Auth::getUser()->id)->orderBy('descricao','asc')->get();
      $pdf = PDF::loadView('produto.pdf', ['produtos' => $produtos]);
      return $pdf->stream('produto.pdf');
    }

}
