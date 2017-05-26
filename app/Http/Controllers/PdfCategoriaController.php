<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
class PdfCategoriaController extends Controller
{


    public function index()
    {
      $categorias = Categoria::with('produtos')->where('user_id', Auth::getUser()->id)->orderBy('descricao','asc')->get();
      $pdf = PDF::loadView('categoria.pdf', ['categorias' => $categorias]);
      return $pdf->stream('categoria.pdf');
    }

}
