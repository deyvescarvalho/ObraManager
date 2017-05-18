<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
class PdfClienteController extends Controller
{


    public function index()
    {
      $clientes = Cliente::all();
      $pdf = PDF::loadView('cliente.pdf', ['clientes' => $clientes]);
      return $pdf->stream();
    }
}
