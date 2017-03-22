<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Cliente;
class ProjetoController extends Controller
{

  private $projeto;

  public function __construct(Projeto $projeto)
  {
    $this->projeto = $projeto;
  }


  public function index()
  {
    $projetos = $this->projeto->paginate(5);


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
    $clientes = Cliente::all();
    return view('projeto.cadastro', compact('clientes'));
  }

  public function store(Request $request)
  {

    $this->validate($request, [
      'endereco' => 'required',
      // 'cliente' => 'required',
      'cidade' => 'required',
      'valorobra' => 'required'
    ]);

    $this->projeto->create($request->all());

    return redirect()->route('projeto.create')->with('status', 'Projeto criado com sucesso!');
  }

  public function edit($id)
  {

    $projeto = $this->projeto->find($id);
    $clientes = Cliente::all();

    return view('projeto.edit', compact(['projeto', 'clientes']));
  }

  public function update($id, Request $request)
  {

    $this->validate($request, [
      'endereco' => 'required',
      // 'cliente' => 'required',
      'cidade' => 'required',
      'valorobra' => 'required'
    ]);

    $this->projeto->find($id)->update($request->all());

    return redirect()->route('projeto.listagem')->with('status', 'Projeto alterado com sucesso!');

  }

  public function destroy($id)
  {
    $this->projeto->find($id)->delete();

    return redirect()->route('projeto.listagem')->with('status', 'Projeto excluído com sucesso');
  }

}
