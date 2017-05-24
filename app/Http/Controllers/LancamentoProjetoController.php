<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Produto;
use App\Categoria;
use App\Fornecedor;
use App\Funcionario;
use App\Cargo;
use Auth;
class LancamentoProjetoController extends Controller
{
  //

  public function create($id)
  {

    $categorias = Categoria::where('user_id', Auth::getUser()->id)->with('produtos')->get();
    $cargos = Cargo::where('user_id', Auth::getUser()->id)->with('funcionarios')->get();
    $fornecedores = Fornecedor::where('user_id', Auth::getUser()->id)->get();
    $funcionarios = Funcionario::where('user_id', Auth::getUser()->id)->get();
    $projeto = Projeto::find($id);
    return view('lancamento.lancamento', compact(['projeto', 'categorias', 'fornecedores', 'funcionarios', 'cargos']));
  }

  public function store(Request $request)
  {
    $trocas = array(".", ",");
    $projeto = Projeto::find($request->projeto_id);
    $projeto->produtos()->attach([$request->produto_id => ['fornecedor_id' => $request->fornecedor_id, 'dataLancamento' => $request->dataLancamento, 'valorItem' => str_replace($trocas, "", $request->input('valorItem')), 'qtdItem' => $request->qtdItem]]);

    return redirect()->route('lancamento.create', ['id' => $request->projeto_id])->with('status', 'Item inserido com sucesso, você pode continuar a inserir mais itens. =]');

  }

  public function lancaFuncionario(Request $request)
  {
    $trocas = array(".", ",");
    $projeto = Projeto::find($request->projeto_id);

    $projeto->funcionarios()->attach([$request->funcionario_id => ['dataLancamento' => $request->dataLancamento, 'valorSalario' => str_replace($trocas, "", $request->input('valorSalario'))]]);

    return redirect()->route('lancamento.create', ['id' => $request->projeto_id])->with('status', 'Funcionário inserido com sucesso, você pode continuar a inserir mais colaboradores. =]');

  }

  public function removeFuncionario($id, $idfuncionario)
  {
    $projeto = Projeto::find($id);

    $projeto->funcionarios()->detach([$idfuncionario]);

    return redirect()->route('projeto.view', ['id' => $id])->with('status', 'Funcionário removido com sucesso!');

  }



















}
