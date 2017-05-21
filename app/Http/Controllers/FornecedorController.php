<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FornecedorRequest;
use App\Fornecedor;
use App\User;
use Auth;
class FornecedorController extends Controller
{
    private $fornecedor;

    public function __construct(Fornecedor $fornecedor)
    {
      $this->fornecedor = $fornecedor;
    }

    public function index()
    {
      $fornecedores = $this->fornecedor->where('id', Auth::getUser()->id)->paginate(10);
      return view('fornecedor.listagem', compact(['fornecedores', 'user']));
    }

    public function create()
    {
      return view('fornecedor.cadastro');
    }

    public function store(FornecedorRequest $request)
    {
      $this->fornecedor->user_id = Auth::getUser()->id;
      $this->fornecedor->descricao = $request->input('descricao');
      $this->fornecedor->ddd = $request->input('ddd');
      $this->fornecedor->telefone = $request->input('telefone');
      $this->fornecedor->endereco = $request->input('endereco');
      $this->fornecedor->cidade = $request->input('cidade');
      $this->fornecedor->save();

      return redirect()->route('fornecedor.create')->with('status', 'Fornecedor cadastrado com sucesso!');
    }

    public function edit($id)
    {
      $fornecedor = $this->fornecedor->find($id);

      return view('fornecedor.edit', compact('fornecedor'));
    }

    public function update($id, FornecedorRequest $request)
    {
      $this->fornecedor = $this->fornecedor->find($id);
      $this->fornecedor->descricao = $request->input('descricao');
      $this->fornecedor->ddd = $request->input('ddd');
      $this->fornecedor->telefone = $request->input('telefone');
      $this->fornecedor->endereco = $request->input('endereco');
      $this->fornecedor->cidade = $request->input('cidade');
      $this->fornecedor->update();

      return redirect()->route('fornecedor.listagem')->with('status', 'Fornecedor alterado com suesso!');
    }


    public function destroy($id)
    {
        $this->fornecedor->find($id)->delete();

        return redirect()->route('fornecedor.listagem')->with('status', 'Fornecedor excluído com sucesso!');
    }

}
