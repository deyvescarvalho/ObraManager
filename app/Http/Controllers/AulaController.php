<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Cliente;

class AulaController extends Controller
{
  private $cliente;
  public $alertas;



    public function __construct(Cliente $cliente)
    {
      $this->cliente = $cliente;
    }

    public function index()
    {
      $clientes = $this->cliente->all();
      $messages = 'Ola mundo estou na home';
      return view('aula.index', compact('aulas'));
    }

    public function clientes()
    {
      $aulas = $this->aula->all();
      return view('aula.listagem_clientes', compact('aulas'));
    }

    public function create()
    {
      $aulas = $this->aula->all();

      return view('aula.cadastro', compact('aulas'));
    }

    public function edit($id)
    {
      # code...
      $aula = $this->aula->find($id);

      return view('aula.edit', compact('aula'));
    }

    public function update($id, ClienteRequest $request)
    {

      $this->aula->find($id)->update($request->all());
      return redirect()->route('aula.listagem_clientes');
    }

    public function destroy($id)
    {

      $this->aula->find($id)->delete();
      return redirect()->route('aula.listagem_clientes');
    }


    public function store(ClienteRequest $request)
    {
      $this->validate($request, [
        'nome' => ['required', 'min:10'],
        'idade' => ['required'],
        'dia' => ['required', 'min:2'],
        'mes' => ['required', 'min:2'],
        'ano' => ['required', 'min:4'],
        'cpf' => ['required', 'min:11'],
        'telefone' => ['required']
      ]);



        # code...
        // $cpf = $this->aula->where('cpf', $request->input('cpf'));
        // $cpf = $this->aula->where('cpf', $request->input('cpf'))->first();
        // dd($cpf->all());
        // if ($cpf === $request->input('cpf')) {
        //   return redirect()->route('aula.create')->with('status', 'Cpf já cadastrado');
        // }else {

          $this->aula->create($request->all());
          return redirect()->route('aula.listagem_clientes');
        // }
      // $request->input('nome') = str_replace($request->input('nome'), "" , "d");
      // dd($request->all());
      // dd($nome);



    }
}
