<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FuncionarioRequest;
use App\Funcionario;
use App\Cargo;
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
    $cargos = Cargo::all();
    return view('funcionario.cadastro', compact('cargos'));
  }

  public function store(FuncionarioRequest $request)
  {
    $this->funcionario->create($request->all());

    return redirect()->route('funcionario.create')->with('status', 'Funcionário cadastrado com sucesso!');
  }


  public function edit($id)
  {
    $cargos = Cargo::all();

    $funcionario = $this->funcionario->find($id);

    return view('funcionario.edit', compact(['funcionario', 'cargos']));
  }

  public function update($id, FuncionarioRequest $request)
  {

    $this->funcionario->find($id)->update($request->all());

    return redirect()->route('funcionario.listagem')->with('status', 'Funcionário alterado com sucesso!');

  }

  public function destroy($id)
  {
    $this->funcionario->find($id)->delete();

    return redirect()->route('funcionario.listagem')->with('status', 'Funcionário deletado com sucesso!');

  }

  public function view($id)
  {
    $funcionario = $this->funcionario->find($id);

    return view('funcionario.detalhe', compact('funcionario'));
  }
}
