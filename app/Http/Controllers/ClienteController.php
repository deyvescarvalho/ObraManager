<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
  public function index()
  {
    // return Cliente::all();

    return view('cliente.index');

  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'nome' => 'required',
      'idade' => 'required|min:2|size:2',
      'email' => 'email',
      'cidade' => 'required'
    ]);

    Cliente::create($request->all());

    return redirect()->route('cliente.novo')->with('status', 'Cliente cadastrado!');
  }

  public function clientes()
  {
    $clientes = Cliente::paginate(10);

    foreach ($clientes as $cliente) {
      $cpf = substr($cliente->cpf, 0,3) . '.';
      $cpf = $cpf . substr($cliente->cpf, 3,3) . '.';
      $cpf = $cpf . substr($cliente->cpf, 5,3) . '-';
      $cpf = $cpf . substr($cliente->cpf, 8,2);
      $cliente->cpf = $cpf;
    }

    return view('cliente.listagem', compact('clientes'));
  }

  public function show($id)
  {
    return Cliente::find($id);
  }

  public function edit($id)
  {
    // dd($id);
    $cliente = Cliente::find($id);
    return view('cliente.edit', compact('cliente'));
  }

  public function update(Request $request, $id)
  {

    $this->validate($request, [
      'nome' => 'required',
      'idade' => 'required|min:2|size:2',
      'email' => 'email',
      'cidade' => 'required'
    ]);

    Cliente::find($id)->update($request->all());
    return redirect()->route('cliente.listagem')->with('status', 'Cliente alterado com sucesso!');

    // return view('cliente.edit', compact('cliente'));
  }

  public function create()
  {
    return view('cliente.cadastro');
  }

  public function destroy($id)
  {

    Cliente::find($id)->delete();

    return redirect()->route('cliente.listagem')->with('status', 'Cliente deletado com sucesso!');
  }
}
