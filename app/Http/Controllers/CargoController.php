<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
use App\Http\Requests\CargoRequest;
use Auth;
use Response;
class CargoController extends Controller
{
  private $cargo;

    public function __construct(Cargo $cargo)
    {
      $this->cargo = $cargo;
    }

    public function index()
    {
      $cargos = $this->cargo->where('user_id', Auth::getUser()->id)->paginate(10);

      return view('cargo.listagem', compact('cargos'));
    }

    public function create()
    {
      return view('cargo.cadastro');
    }

    public function store(Request $request)
    {
      $this->cargo->descricao = $request->input('descricao');
      $this->cargo->user_id = Auth::getUser()->id;
      $this->cargo->save();

      return redirect()->route('cargo.create')->with('status', 'Cargo cadastrado!');
    }

    public function storeDinamico(Request $request)
    {
      $this->cargo->descricao = $request->input('descricao');
      $this->cargo->user_id = Auth::getUser()->id;
      $this->cargo->save();

      return redirect()->route('funcionario.create')->with('status', 'Cargo cadastrado!');
    }

    public function cargosJson()
    {
      $cargos = $this->cargo->where('user_id', Auth::getUser()->id)->orderBy('descricao', 'asc')->get(['id', 'descricao']);
      return Response::json($cargos);
    }

    public function edit($id)
    {
      $cargo = $this->cargo->find($id);

      return view('cargo.edit', compact('cargo'));
    }

    public function update($id, Request $request)
    {
      $this->cargo = $this->cargo->find($id);
      $this->cargo->descricao = $request->input('descricao');
      $this->cargo->user_id = Auth::getUser()->id;
      $this->cargo->update();
      return redirect()->route('cargo.listagem')->with('status', 'Cargo editado');
    }

    public function destroy($id)
    {
      $this->cargo->find($id)->delete();

      return redirect()->route('cargo.listagem')->with('status', 'Cargo excluído');
    }
}
