<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Produto;
use App\Categoria;
use App\Fornecedor;
use App\Funcionario;
use App\Cargo;
class LancamentoProjetoController extends Controller
{
  //

  public function create($id)
  {

    $categorias = Categoria::with('produtos')->get();
    $cargos = Cargo::with('funcionarios')->get();
    $fornecedores = Fornecedor::all();
    $funcionarios = Funcionario::all();
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

    $projeto = Projeto::find($request->projeto_id);

    $projeto->funcionarios()->attach([$request->funcionario_id => ['dataLancamento' => $request->dataLancamento, 'valorSalario' => $request->valorSalario]]);

    return redirect()->route('lancamento.create', ['id' => $request->projeto_id])->with('status', 'Funcionário inserido com sucesso, você pode continuar a inserir mais colaboradores. =]');

  }



















}
