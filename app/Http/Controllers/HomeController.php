<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Funcionario;
use App\Cliente;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalProjetos = Projeto::where('user_id', Auth::getUser()->id)->count();
        $totalFuncionario = Funcionario::where('user_id', Auth::getUser()->id)->count();
        $totalCliente = Cliente::where('user_id', Auth::getUser()->id)->count();
        return view('cliente.index', compact('totalProjetos', 'totalFuncionario', 'totalCliente'));
    }
}
