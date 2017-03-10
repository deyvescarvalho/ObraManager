<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
class ProjetoController extends Controller
{

    private $projeto;

    public function __construct(Projeto $projeto)
    {
      $this->projeto = $projeto;
    }


    public function index()
    {
      $projetos = $this->projeto->paginate(10);

      return view('projeto.listagem', compact('projetos'));
    }

    public function create()
    {
      return view('projeto.cadastro');
    }

    public function store(Request $request)
    {

      $this->validate($request, [
        'endereco' => 'required',
        'cliente' => 'required',
        'cidade' => 'required',
        'precoProjeto' => 'required'
      ]);

      $this->projeto->create($request->all());

      return redirect()->
        route('projeto.cadastro')->
        with('status', 'Projeto criado com sucesso!');
    }

    public function edit($id)
    {
      $projeto = $this->projeto->find($id);

      return view('projeto.edit', compact('projeto'));
    }

    public function update($id, Request $request)
    {

      $this->validate($request, [
        'endereco' => 'required',
        'cliente' => 'required',
        'cidade' => 'required',
        'precoProjeto' => 'required'
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
