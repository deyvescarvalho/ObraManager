<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Requests\CategoriaRequest;
class CategoriaController extends Controller
{

  private $categoria;

    public function __construct(Categoria $categoria)
    {
      $this->categoria = $categoria;
    }

    public function index()
    {
      $categorias = $this->categoria->paginate(5);

      return view('categoria.listagem', compact('categorias'));
    }

    public function create()
    {
      return view('categoria.cadastro');
    }

    public function store(CategoriaRequest $request)
    {


      $this->categoria->create($request->all());

      return redirect()->route('categoria.create')->with('status', 'Categoria cadastrada!');
    }

    public function edit($id)
    {
      $categoria = $this->categoria->find($id);

      return view('categoria.edit', compact('categoria'));
    }

    public function update($id, Request $request)
    {
      $this->categoria->find($id)->update($request->all());

      return redirect()->route('categoria.listagem')->with('status', 'Categoria editada');
    }

    public function destroy($id)
    {
      $this->categoria->find($id)->delete();

      return redirect()->route('categoria.listagem')->with('status', 'Categoria excluída');
    }
}
