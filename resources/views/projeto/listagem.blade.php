@extends('tema')

@section('title', 'Listagem de Projetos')
@section('title_page', 'Listagem de Projetos')




@section('conteudo')

@if (session('status'))
<div class="alert success">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{ session('status') }}
</div>

@endif


<div class="mdl-cell mdl-cell--12-col">
  <table class="mdl-cell mdl-cell--12-col mdl-data-table mdl-js-data-table mdl-shadow--2dp ">
    <thead>
      <tr>
        <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Cliente</th>
        <th class="mdl-data-table__cell--non-numeric">Valor estimado R$</th>
        <th class="mdl-data-table__cell--non-numeric">Endereço</th>
        <th class="mdl-data-table__cell--non-numeric" colspan="3"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($projetos as $projeto)
      <tr>
        <td class="mdl-data-table__cell--non-numeric ">{{$projeto->cliente->nome}}</td>
        <td class="mdl-data-table__cell--non-numeric">{{$projeto->valorobra}}</td>
        <td class="mdl-data-table__cell--non-numeric">{{$projeto->endereco}} - {{ $projeto->cidade }}</td>
        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('lancamento.create', ['id'=>$projeto->id]) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">Lançar</i></a></td>
        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('projeto.edit', ['id'=>$projeto->id]) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">edit</i></a></td>
        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('projeto.destroy', ['id'=>$projeto->id]) }}" onClick="return confirm('Deseja realmente deletar o projeto ?')" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">delete</i></a></td>
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
  {{ $projetos->render() }}
</div>
@endsection
