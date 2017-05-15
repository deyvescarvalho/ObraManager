<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
use Illuminate\Http\ProdutoRequest;
use App\Produto;
use App\Categoria;
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
      $produtos = $this->produto->paginate(15);


      return view('produto.listagem', compact('produtos'));
    }

    public function create()
    {
      $categorias = $this->categoria->all();

      return view('produto.cadastro', compact('categorias'));
    }

    public function store(ProdutoRequest $request)
    {

      $this->produto->create($request->all());

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
      $this->produto->find($id)->update($request->all());

      return redirect()->route('produto.listagem')->with('status', 'Produto editado');
    }

    public function destroy($id)
    {
      $this->produto->find($id)->delete();

      return redirect()->route('produto.listagem')->with('status', 'Produto excluído');
    }
}
