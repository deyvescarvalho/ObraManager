<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
class CargoController extends Controller
{
  private $cargo;

    public function __construct(Cargo $cargo)
    {
      $this->cargo = $cargo;
    }

    public function index()
    {
      $cargos = $this->cargo->paginate(5);

      return view('cargo.listagem', compact('cargos'));
    }

    public function create()
    {
      return view('cargo.cadastro');
    }

    public function store(Request $request)
    {


      $this->cargo->create($request->all());

      return redirect()->route('cargo.create')->with('status', 'Cargo cadastrada!');
    }

    public function edit($id)
    {
      $cargo = $this->cargo->find($id);

      return view('cargo.edit', compact('cargo'));
    }

    public function update($id, Request $request)
    {
      $this->cargo->find($id)->update($request->all());

      return redirect()->route('cargo.listagem')->with('status', 'Cargo editado');
    }

    public function destroy($id)
    {
      $this->cargo->find($id)->delete();

      return redirect()->route('cargo.listagem')->with('status', 'Cargo excluído');
    }
}
