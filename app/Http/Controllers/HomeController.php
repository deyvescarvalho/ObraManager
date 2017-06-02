<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Funcionario;
use App\Cliente;
use Auth;
use File;
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
    $somaProjetos = Projeto::where('user_id', Auth::getUser()->id)->sum('valorobra');
    // dd(number_format($somaProjetos, 2, ',', '.'));
    $totalFuncionario = Funcionario::where('user_id', Auth::getUser()->id)->count();
    $totalCliente = Cliente::where('user_id', Auth::getUser()->id)->count();
    return view('cliente.index', compact('totalProjetos', 'totalFuncionario', 'totalCliente', 'somaProjetos'));
  }

  public function trocaAvatar(Request $request)
  {
    if ($request->hasFile('fotoavatar')) {

      File::delete(['./images/avatar/' . md5(Auth::getUser()->id) . "." ."jpg", './images/avatar/' . md5(Auth::getUser()->id) . "." ."jpeg", './images/avatar/' . md5(Auth::getUser()->id) . "." ."png"]);

      $imagem = $request->file('fotoavatar');
      $nomearquivo = md5(Auth::getUser()->id) . "." . $imagem->getClientOriginalExtension();
      $request->file('fotoavatar')->move(public_path('./images/avatar/'), $nomearquivo);
      return redirect()->route('home');
    }

  }

  public function perfilAvatar()
  {
    return view('usuario.avatar');
  }
}
