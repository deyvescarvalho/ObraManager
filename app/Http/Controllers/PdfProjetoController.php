<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
class PdfProjetoController extends Controller
{


    public function index()
    {
      $projetos = Projeto::with('cliente')->where('user_id', Auth::getUser()->id)->orderBy('cliente_id', 'asc')->get();
      $pdf = PDF::loadView('projeto.pdf', ['projetos' => $projetos]);
      // dd($projetos[0]->getAttributes());
      return $pdf->stream('projeto.pdf');
    }

}
