<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Requests\CategoriaRequest;
use Auth;
class CategoriaController extends Controller
{

  private $categoria;

    public function __construct(Categoria $categoria)
    {
      $this->categoria = $categoria;
    }

    public function index()
    {
      $categorias = $this->categoria->where('user_id', Auth::getUser()->id)->paginate(10);

      return view('categoria.listagem', compact('categorias'));
    }

    public function create()
    {
      return view('categoria.cadastro');
    }

    public function store(CategoriaRequest $request)
    {
      $this->categoria->user_id = Auth::getUser()->id;
      $this->categoria->descricao = $request->input('descricao');
      $this->categoria->save();
      return redirect()->route('categoria.create')->with('status', 'Categoria cadastrada!');
    }

    public function edit($id)
    {
      $categoria = $this->categoria->find($id);

      return view('categoria.edit', compact('categoria'));
    }

    public function update($id, CategoriaRequest $request)
    {
      $this->categoria = $this->categoria->find($id);
      $this->categoria->user_id = Auth::getUser()->id;
      $this->categoria->descricao = $request->input('descricao');
      $this->categoria->update();
      return redirect()->route('categoria.listagem')->with('status', 'Categoria editada');
    }

    public function destroy($id)
    {
      $this->categoria->find($id)->delete();

      return redirect()->route('categoria.listagem')->with('status', 'Categoria excluída');
    }
}
