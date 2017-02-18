@extends('tema')

@section('title', 'Home')


@section('conteudo')
<h1> Estou no Dashboard</h1>


<div class='table-responsive'>
  <table class='table'>
    <thead>
      <tr>
        <th>Nome</th>
        <th>Idade</th>
        <th>Data de nascimento</th>
        <th>CPF</th>
        <th>Telefone</th>
      </tr>
    </thead>
    <tbody>
      @foreach($aulas as $aula)
      <tr>
        <td>{{$aula->nome}}</td>
        <td>{{$aula->idade}}</td>
        <td>{{$aula->dtNascimento}}</td>
        <td>{{$aula->cpf}}</td>
        <td>{{$aula->telefone}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection
