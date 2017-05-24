<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjetoRequest;
use App\Projeto;
use App\Cliente;
use Auth;
class ProjetoController extends Controller
{

  private $projeto;

  public function __construct(Projeto $projeto)
  {
    $this->projeto = $projeto;
  }


  public function index()
  {
    $projetos = $this->projeto->where('user_id', Auth::getUser()->id)->paginate(10);


    return view('projeto.listagem', compact('projetos'));

  }

  public function view($id)
  {
    $total =0;
    $somaQtd =0;
    $somaCampo =0;
    $projeto = Projeto::find($id);
     return view('projeto.view', compact(['projeto', 'total', 'somaCampo', 'somaQtd']));
  }

  public function create()
  {
    $clientes = Cliente::where('user_id', Auth::getUser()->id)->get();
    return view('projeto.cadastro', compact('clientes'));
  }

  public function store(ProjetoRequest $request)
  {
    $this->projeto->user_id = Auth::getUser()->id;
    $this->projeto->endereco = $request->input('endereco');
    $this->projeto->cliente_id = $request->input('cliente_id');
    $this->projeto->cidade = $request->input('cidade');
    $this->projeto->valorobra = $request->input('valorobra');
    $this->projeto->save();

    return redirect()->route('projeto.create')->with('status', 'Projeto criado com sucesso!');
  }

  public function edit($id)
  {

    $projeto = $this->projeto->find($id);
    $clientes = Cliente::where('user_id', Auth::getUser()->id)->get();

    return view('projeto.edit', compact(['projeto', 'clientes']));
  }

  public function update($id, ProjetoRequest $request)
  {
    $this->projeto = $this->projeto->find($id);
    $this->projeto->endereco = $request->input('endereco');
    $this->projeto->cliente_id = $request->input('cliente_id');
    $this->projeto->cidade = $request->input('cidade');
    $this->projeto->valorobra = $request->input('valorobra');
    $this->projeto->update();

    return redirect()->route('projeto.listagem')->with('status', 'Projeto alterado com sucesso!');

  }

  public function destroy($id)
  {
    $this->projeto->find($id)->delete();

    return redirect()->route('projeto.listagem')->with('status', 'Projeto excluído com sucesso');
  }

}
