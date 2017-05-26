<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
class PdfFuncionarioController extends Controller
{


    public function index()
    {
      $funcionarios = Funcionario::with('cargo')->where('user_id', Auth::getUser()->id)->orderBy('nome','asc')->get();
      $pdf = PDF::loadView('funcionario.pdf', ['funcionarios' => $funcionarios]);
      return $pdf->stream('funcionario.pdf');
    }

}
