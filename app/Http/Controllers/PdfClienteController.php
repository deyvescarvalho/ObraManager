<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Auth;
class PdfClienteController extends Controller
{


    public function index()
    {
      $clientes = Cliente::where('user_id', Auth::getUser()->id)->get();
      $clientesAniversario = Cliente::where('user_id', Auth::getUser()->id)->where('dtNascimento', '2222-02-25')->get();
      $pdf = PDF::loadView('cliente.pdf', ['clientes' => $clientesAniversario]);
      return $pdf->stream();
    }
}
