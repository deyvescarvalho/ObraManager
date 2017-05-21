<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\Produto;
use App\Categoria;
use Auth;
class ProdutoController extends Controller
{

  private $produto;
  private $categoria;

    public function __construct(Produto $produto, Categoria $categoria)
    {
      $this->produto = $produto;
      $this->categoria = $categoria;
    }

    public function index()
    {
      $produtos = $this->produto->where('id', Auth::getUser()->id)->paginate(15);


      return view('produto.listagem', compact('produtos'));
    }

    public function create()
    {
      $categorias = $this->categoria->all();

      return view('produto.cadastro', compact('categorias'));
    }

    public function store(ProdutoRequest $request)
    {

      $this->produto->user_id = Auth::getUser()->id;
      $this->produto->categoria_id = $request->input('categoria_id');
      $this->produto->descricao = $request->input('descricao');
-     $this->produto->save();

      return redirect()->route('produto.create')->with('status', 'Produto cadastrado!');
    }

    public function edit($id)
    {

      $categorias = $this->categoria->all();

      $produto = $this->produto->find($id);

      return view('produto.edit', compact(['categorias', 'produto']));
    }

    public function update($id, ProdutoRequest $request)
    {
      $this->produto = $this->produto->find($id);
      $this->produto->user_id = Auth::getUser()->id;
      $this->produto->categoria_id = $request->input('categoria_id');
      $this->produto->descricao = $request->input('descricao');
      $this->produto->update();
      return redirect()->route('produto.listagem')->with('status', 'Produto editado');
    }

    public function destroy($id)
    {
      $this->produto->find($id)->delete();

      return redirect()->route('produto.listagem')->with('status', 'Produto excluído');
    }
}
