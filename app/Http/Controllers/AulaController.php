<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aula;

class AulaController extends Controller
{
  private $aula;
  public $alertas;



    public function __construct(Aula $aula)
    {
      $this->aula = $aula;
    }

    public function index()
    {
      # code...
      $messages = 'Ola mundo estou na home';
      return view('aula.index', compact('messages'));
    }

    public function create()
    {
      # code...

      return view('aula.cadastro');
    }


    public function store(Request $request)
    {
      # code...


      $this->validate($request, [
        'nome' => ['required', 'min:10'],
        'idade' => ['required'],
        'dtNascimento' => ['required', 'min:8'],
        'cpf' => ['required', 'min:11'],
        'telefone' => ['required']
      ]);



        # code...
        $cpf = $this->aula->where('cpf', $request->input('cpf'));
        if ($cpf) {
          return redirect()->route('aula.create')->with('status', 'Cpf já cadastrado');
        }else {

          $this->aula->create($request->all());
          return redirect()->route('aula.index');
        }
      // $request->input('nome') = str_replace($request->input('nome'), "" , "d");
      // dd($request->all());
      // dd($nome);



    }
}
