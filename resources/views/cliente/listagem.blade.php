@extends('tema')

@section('title', 'Listagem de Clientes')
@section('title_page', 'Listagem de Clientes')




@section('conteudo')

  @if (session('status'))
    <div class="alert success">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      {{ session('status') }}
    </div>

  @endif


  <div class="mdl-cell mdl-cell--12-col">
    <a href="{{ route('cliente.novo') }}" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
      <i class="material-icons">add</i>
    </a> Novo cliente
    <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" href="{{route('pdf.cliente')}}" target="_blank" >Relatório de clientes</a>

    @if (count($clientes) > 0)

      <table class="mdl-cell mdl-cell--12-col mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--hide-phone mdl-cell--hide-tablet">
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
            <div class="mdl-cell mdl-cell--12-col-phone demo-card-square mdl-card mdl-shadow--2dp mdl-cell--hide-desktop">
              <div class="mdl-card__title ">
                <span><i class="material-icons md-light md-48">person</i></span>
                <h2 class="mdl-card__title-text"> {{ strtoupper($cliente->nome) }}</h2>
              </div>
              <div class="mdl-card__supporting-text ">
                <p class="mdl-card__title-text">Idade: {{$cliente->idade}}</p>
                <p class="mdl-card__title-text">Dt. Nasc: {{$cliente->dia}}/{{$cliente->mes}}/{{$cliente->ano}}</p>
                <p class="mdl-card__title-text">CPF: {{$cliente->cpf or 'Sem CPF'}}</p>
                <p class="mdl-card__title-text">Telefone: ({{$cliente->ddd}}) - {{$cliente->telefone}}</p>
              </div>
            </div>

            <tr class="mdl-cell--hide-phone mdl-cell--hide-tablet">
              <td class="mdl-data-table__cell--non-numeric ">{{ ucwords(strtolower($cliente->nome)) }}</td>
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
      {{ $clientes->render()}}
    @else
      <h2>Não hà clientes cadastrados</h2>
    @endif
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
  </div>
@endsection
