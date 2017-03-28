@extends('tema')

@section('title', 'Listagem de profissões')
@section('title_page', 'Listagem de profissões')




@section('conteudo')

@if (session('status'))
<div class="alert success">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{ session('status') }}
</div>

@endif


<div class="mdl-cell mdl-cell--12-col">
  <a href="{{ route('cargo.novo') }}" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
    <i class="material-icons">add</i>
  </a> Novo cargo
  <table class="mdl-cell mdl-cell--12-col mdl-data-table mdl-js-data-table mdl-shadow--2dp ">
    <thead>
      <tr>
        <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Descrição</th>
        <th class="mdl-data-table__cell--non-numeric" colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($cargos as $cargo)
      <tr>
        <td class="mdl-data-table__cell--non-numeric ">{{$cargo->descricao}}</td>
        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('cargo.edit', ['id'=>$cargo->id]) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">edit</i></a></td>
        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('cargo.destroy', ['id'=>$cargo->id]) }}" onClick="return confirm('Deseja realmente deletar o cargo ?')" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">delete</i></a></td>
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
  {{ $cargos->render() }}
</div>
@endsection
