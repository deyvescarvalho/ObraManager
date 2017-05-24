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
    <a href="{{ route('projeto.create') }}" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
      <i class="material-icons">add</i>
    </a> Novo projeto
    @if (count($projetos) > 0)


      <table class="mdl-cell mdl-cell--12-col mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--hide-phone mdl-cell--hide-tablet">
        <thead>
          <tr>
            <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Cliente</th>
            <th class="mdl-data-table__cell--non-numeric">Valor estimado R$</th>
            <th class="mdl-data-table__cell--non-numeric">Endereço</th>
            <th class="mdl-data-table__cell--non-numeric" colspan="4"></th>
          </tr>
        </thead>
        <tbody>
          @php
          $count =1
          @endphp
          @foreach($projetos as $projeto)
            <div class="mdl-cell mdl-cell--12-col-phone demo-card-square mdl-card mdl-shadow--2dp mdl-cell--hide-desktop">
              <div class="mdl-card__title ">
                <span><i class="material-icons md-light md-48">dashboard</i></span>
              </div>
              <div class="mdl-card__title ">
                <h2 class="mdl-card__title-text"> {{ strtoupper($projeto->cliente->nome) }}</h2>
              </div>
              <div class="mdl-card__supporting-text ">
                <p class="mdl-card__title-text">Valor: {{number_format($projeto->valorobra, 2, ',', '.')}}</p>
                <p class="mdl-card__title-text">Endereço: {{$projeto->endereco}} - {{ $projeto->cidade }}</p>
              </div>
            </div>

            <tr class="mdl-cell--hide-phone mdl-cell--hide-tablet">
              <td class="mdl-data-table__cell--non-numeric ">{{$projeto->cliente->nome}}</td>
              <td class="mdl-data-table__cell--non-numeric">{{ number_format($projeto->valorobra, 2, ',', '.')}}</td>
              <td class="mdl-data-table__cell--non-numeric">{{$projeto->endereco}} - {{ $projeto->cidade }}</td>
              <td id="viewProject{{print_r($count)}}" class="mdl-data-table__cell--non-numeric">
                <a href="{{ route('projeto.view', ['id'=>$projeto->id]) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                  <i class="material-icons">visibility</i>
                </a>
                <div class="mdl-tooltip" for="viewProject{{print_r($count)}}">Visualizar detalhes do projeto</div>
              </td>

              <td id="addLancamento{{print_r($count)}}" class="mdl-data-table__cell--non-numeric">
                <a href="{{ route('lancamento.create', ['id'=>$projeto->id]) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                  <i class="material-icons">add</i>
                </a>
                <div class="mdl-tooltip" for="addLancamento{{print_r($count)}}">Novo lançamento no projeto</div>
              </td>

              @php
              $count++
              @endphp

              <td class="mdl-data-table__cell--non-numeric">
                <a href="{{ route('projeto.edit', ['id'=>$projeto->id]) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                  <i class="material-icons">edit</i>
                </a>
              </td>

              <td class="mdl-data-table__cell--non-numeric">
                <a href="{{ route('projeto.destroy', ['id'=>$projeto->id]) }}" onClick="return confirm('Deseja realmente deletar o projeto ?')" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                  <i class="material-icons">delete</i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $projetos->render() }}
    @else
      <h2>Não hà projetos cadastrados</h2>
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
