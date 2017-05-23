<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FuncionarioRequest;
use App\Funcionario;
use App\Cargo;
use Auth;
class FuncionarioController extends Controller
{

  private $funcionario;

  public function __construct(Funcionario $funcionario)
  {
    $this->funcionario = $funcionario;
  }

  public function index()
  {

    $funcionarios = $this->funcionario->where('user_id', Auth::getUser()->id)->paginate(10);
    return view('funcionario.listagem', compact('funcionarios'));

  }

  public function create()
  {
    $cargos = Cargo::where('user_id', Auth::getUser()->id)->get();
    return view('funcionario.cadastro', compact('cargos'));
  }

  public function store(FuncionarioRequest $request)
  {
    $this->funcionario->user_id = Auth::getUser()->id;
    $this->funcionario->nome = $request->input('nome');
    $this->funcionario->idade = $request->input('idade');
    $this->funcionario->dia = $request->input('dia');
    $this->funcionario->mes = $request->input('mes');
    $this->funcionario->ano = $request->input('ano');
    $this->funcionario->email = $request->input('email');
    $this->funcionario->cpf = $request->input('cpf');
    $this->funcionario->ddd = $request->input('ddd');
    $this->funcionario->telefone = $request->input('telefone');
    $this->funcionario->endereco = $request->input('endereco');
    $this->funcionario->cidade = $request->input('cidade');
    $this->funcionario->cargo_id = $request->input('cargo_id');

    try {
        $this->funcionario->save();
    } catch (Exception $e) {
      echo "Não concluído, erro: " . $e;
    }


    return redirect()->route('funcionario.create')->with('status', 'Funcionário cadastrado com sucesso!');
  }


  public function edit($id)
  {
    $cargos = Cargo::all();

    $funcionario = $this->funcionario->with('cargo')->find($id);

    return view('funcionario.edit', compact(['funcionario', 'cargos']));
  }

  public function update($id, FuncionarioRequest $request)
  {
    $this->funcionario = $this->funcionario->find($id);
    $this->funcionario->cargo_id = $request->input('cargo_id');
    $this->funcionario->nome = $request->input('nome');
    $this->funcionario->idade = $request->input('idade');
    $this->funcionario->dia = $request->input('dia');
    $this->funcionario->mes = $request->input('mes');
    $this->funcionario->ano = $request->input('ano');
    $this->funcionario->email = $request->input('email');
    $this->funcionario->cpf = $request->input('cpf');
    $this->funcionario->ddd = $request->input('ddd');
    $this->funcionario->telefone = $request->input('telefone');
    $this->funcionario->endereco = $request->input('endereco');
    $this->funcionario->cidade = $request->input('cidade');

    $this->funcionario->update();

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
