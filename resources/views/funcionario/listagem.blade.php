@extends('tema')

@section('title', 'Listagem de Funcionarios')
@section('title_page', 'Listagem de Funcionarios')




@section('conteudo')

@if (session('status'))
<div class="alert">
  {{ session('status') }}
</div>

@endif


<div class="mdl-cell mdl-cell--12-col">
  <table class="mdl-cell mdl-cell--12-col mdl-data-table mdl-js-data-table mdl-shadow--2dp ">
    <thead>
      <tr>
        <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Nome</th>
        <th class="mdl-data-table__cell--non-numeric">Idade</th>
        <th class="mdl-data-table__cell--non-numeric">Data de nascimento</th>
        <th class="mdl-data-table__cell--non-numeric">CPF</th>
        <th class="mdl-data-table__cell--non-numeric">Cargo</th>
        <th class="mdl-data-table__cell--non-numeric">Telefone</th>
        <th class="mdl-data-table__cell--non-numeric" colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($funcionarios as $funcionario)
      <tr>
        <td class="mdl-data-table__cell--non-numeric ">{{$funcionario->nome}}</td>
        <td class="mdl-data-table__cell--non-numeric">{{$funcionario->idade}}</td>
        <td class="mdl-data-table__cell--non-numeric">{{$funcionario->dia}}/{{$funcionario->mes}}/{{$funcionario->ano}}</td>
        <td class="mdl-data-table__cell--non-numeric">{{$funcionario->cpf}}</td>
        <td class="mdl-data-table__cell--non-numeric">{{$funcionario->cargo}}</td>
        <td class="mdl-data-table__cell--non-numeric">({{$funcionario->ddd}}) - {{$funcionario->telefone}}</td>
        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('funcionario.edit', ['id'=>$funcionario->id]) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">edit</i></a></td>
        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('funcionario.destroy', ['id'=>$funcionario->id]) }}" onClick="return confirm('Deseja realmente deletar o funcionario ?')" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">delete</i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <style media="screen">
  ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

  </style>
  {{ $funcionarios->render()}}
</div>
@endsection
