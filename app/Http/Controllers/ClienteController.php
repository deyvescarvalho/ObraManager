<?php

namespace App\Http\Controllers;

use Illuminate\Http\ClienteRequest;
use App\Cliente;

class ClienteController extends Controller
{
  private $cliente;

  public function __construct(Cliente $cliente)
  {
    $this->cliente = $cliente;
  }

  public function index()
  {
    return view('cliente.index');
  }

  public function store(ClienteRequest $request)
  {
    $this->cliente->create($request->all());

    return redirect()->route('cliente.novo')->with('status', 'Cliente cadastrado!');
  }

  public function clientes()
  {
    $clientes = $this->cliente->paginate(10);

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
    return $this->cliente->find($id);
  }

  public function edit($id)
  {
    $cliente = $this->cliente->find($id);
    return view('cliente.edit', compact('cliente'));
  }

  public function update(ClienteRequest $request, $id)
  {

    $this->cliente->find($id)->update($request->all());
    return redirect()->route('cliente.listagem')->with('status', 'Cliente alterado com sucesso!');
  }

  public function create()
  {
    return view('cliente.cadastro');
  }

  public function destroy($id)
  {

    $this->cliente->find($id)->delete();

    return redirect()->route('cliente.listagem')->with('status', 'Cliente deletado com sucesso!');
  }
}
