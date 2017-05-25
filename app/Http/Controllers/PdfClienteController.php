<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
class PdfClienteController extends Controller
{


    public function index()
    {
      $clientes = Cliente::where('user_id', Auth::getUser()->id)->get();
      $clientesAniversario = Cliente::where('user_id', Auth::getUser()->id)->where('dtNascimento', '2222-02-25')->get();
      $pdf = PDF::loadView('cliente.pdf', ['clientes' => $clientes]);
      return $pdf->stream('cliente.pdf');
    }

    public function aniversariantes($mesInicio, $mesFinal)
    {
      $clientesAniversario = Cliente::where('user_id', Auth::getUser()->id)->whereBetween('dtNascimento', ['2015-01-01', '2017-05-05'])->get();
      $pdf = PDF::loadView('cliente.pdf', ['clientes' => $clientesAniversario]);
      return $pdf->stream('cliente.pdf');
    }
}
