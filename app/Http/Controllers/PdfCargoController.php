<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
class PdfCargoController extends Controller
{


    public function index()
    {
      $cargos = Cargo::where('user_id', Auth::getUser()->id)->orderBy('descricao','asc')->get();
      $pdf = PDF::loadView('cargo.pdf', ['cargos' => $cargos]);
      return $pdf->stream('cargo.pdf');
    }

}
