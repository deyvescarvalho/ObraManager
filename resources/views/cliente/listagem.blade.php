@extends('tema')

@section('title', 'Listagem de Clientes')
@section('title_page', 'Listagem de Clientes')




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
        <th class="mdl-data-table__cell--non-numeric">Telefone</th>
        <th class="mdl-data-table__cell--non-numeric" colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($clientes as $cliente)
      <tr>
        <td class="mdl-data-table__cell--non-numeric ">{{$cliente->nome}}</td>
        <td class="mdl-data-table__cell--non-numeric">{{$cliente->idade}}</td>
        <td class="mdl-data-table__cell--non-numeric">{{$cliente->dia}}/{{$cliente->mes}}/{{$cliente->ano}}</td>
        <td class="mdl-data-table__cell--non-numeric">{{$cliente->cpf}}</td>
        <td class="mdl-data-table__cell--non-numeric">({{$cliente->ddd}}) - {{$cliente->telefone}}</td>
        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('cliente.edit', ['id'=>$cliente->id]) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">edit</i></a></td>
        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('cliente.destroy', ['id'=>$cliente->id]) }}" onClick="return confirm('Deseja realmente deletar o cliente ?')" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">delete</i></a></td>
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
  {{ $clientes->render()}}
</div>
@endsection
