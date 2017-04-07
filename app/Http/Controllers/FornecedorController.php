<?php

namespace App\Http\Controllers;

use Illuminate\Http\FornecedorRequest;
use App\Fornecedor;
use App\User;

class FornecedorController extends Controller
{
    private $fornecedor;

    public function __construct(Fornecedor $fornecedor)
    {
      $this->fornecedor = $fornecedor;
    }

    public function index()
    {
      $user = User::find(1);
      $fornecedores = $this->fornecedor->paginate(10);
      return view('fornecedor.listagem', compact(['fornecedores', 'user']));
    }

    public function create()
    {
      return view('fornecedor.cadastro');
    }

    public function store(FornecedorRequest $request)
    {
      $this->fornecedor->create($request->all());

      return redirect()->route('fornecedor.create')->with('status', 'Fornecedor cadastrado com sucesso!');
    }

    public function edit($id)
    {
      $fornecedor = $this->fornecedor->find($id);

      return view('fornecedor.edit', compact('fornecedor'));
    }

    public function update($id, FornecedorRequest $request)
    {
      $this->fornecedor->find($id)->update($request->all());

      return redirect()->route('fornecedor.listagem')->with('status', 'Fornecedor alterado com suesso!');
    }


    public function destroy($id)
    {
        $this->fornecedor->find($id)->delete();

        return redirect()->route('fornecedor.listagem')->with('status', 'Fornecedor excluído com sucesso!');
    }

}
