<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
class PdfFornecedorController extends Controller
{


    public function index()
    {
      $fornecedores = Fornecedor::where('user_id', Auth::getUser()->id)->orderBy('descricao','asc')->get();
      $pdf = PDF::loadView('fornecedor.pdf', ['fornecedores' => $fornecedores]);
      return $pdf->stream('fornecedor.pdf');
    }

}
