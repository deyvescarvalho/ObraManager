<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;

class FuncionarioController extends Controller
{

  private $funcionario;

  public function __construct(Funcionario $funcionario)
  {
    $this->funcionario = $funcionario;
  }

  public function index()
  {

    $funcionarios = $this->funcionario->paginate(5);
    return view('funcionario.listagem', compact('funcionarios'));

  }

  public function create()
  {
    return view('funcionario.cadastro');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'nome' => 'required',
      'idade' => 'required|min:2|size:2',
      'email' => 'email',
      'cargo' => 'required'
    ]);

    $this->funcionario->create($request->all());

    return redirect()->route('funcionario.create')->with('status', 'Funcionário cadastrado com sucesso!');
  }


  public function edit($id)
  {
    $funcionario = $this->funcionario->find($id);

    return view('funcionario.edit', compact('funcionario'));
  }

  public function update($id, Request $request)
  {
    $this->validate($request, [
      'nome' => 'required',
      'idade' => 'required|min:2|size:2',
      'email' => 'email',
      'cargo' => 'required'
      
    ]);

    $this->funcionario->find($id)->update($request->all());

    return redirect()->route('funcionario.listagem')->with('status', 'Funcionários alterado com sucesso!');

  }

  public function destroy($id)
  {
    $this->funcionario->find($id)->delete();

    return redirect()->route('funcionario.listagem')->with('status', 'Funcionário deletado com sucesso!');

  }
}
