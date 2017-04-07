@extends('tema')

@section('title', 'Visualização do projeto')

@section('title_page', 'Visualização do projeto')

<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 512px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
.mdl-card__title-text {
  color: #9C9C9C !important;
}
</style>
@section('conteudo')
  <div class="demo-card-wide mdl-card mdl-shadow--2dp">
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Cliente: {{$projeto->cliente->nome}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Endereço: {{$projeto->endereco}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Cidade: {{$projeto->cidade}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Valor estimado: R$ {{number_format(floatval($projeto->valorobra), 2, ',', '.')}}</h2>
    </div>
  </div>


  <div class="mdl-cell mdl-cell--12-col">
    @if (count($projeto->produtos) > 0 )
      <table class="mdl-cell mdl-cell--12-col mdl-data-table mdl-js-data-table mdl-shadow--2dp ">
        <div class="mdl-card__supporting-text"> <br>
          <h2 class="mdl-card__title-text">Materiais já usados</h2>
        </div>
        <thead>
          <tr>
            <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Data de lançamento</th>
            <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Descrição</th>
            <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Categoria</th>
            <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Fornecedor</th>
            <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Valor</th>
            <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Quantidade</th>
            <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Total</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($projeto->produtos as $produto)
            <?php // TODO: REMOVER ITENS INSERIDOS ?>
            <?php // TODO: ALTERAR ITENS INSERIDOS ?>
            <tr>
              @php
              $forn = App\Fornecedor::find($produto->pivot->fornecedor_id);
              @endphp
              <td class="mdl-data-table__cell--non-numeric "> {{$produto->pivot->dataLancamento}}</td>
              <td class="mdl-data-table__cell--non-numeric "> {{ $produto->descricao}}</td>
              <td class="mdl-data-table__cell--non-numeric "> {{ $produto->categoria->descricao }}</td>
              <td class="mdl-data-table__cell--non-numeric "> {{ $forn->descricao or ' - ' }}</td>
              <td class="mdl-data-table__cell--non-numeric "> R$ {{ $produto->pivot->valorItem }}</td>
              <td class="mdl-data-table__cell--non-numeric "> {{ $produto->pivot->qtdItem }}</td>
              <td class="mdl-data-table__cell--non-numeric "> R$ {{ number_format(floatval($produto->pivot->qtdItem) * intval($produto->pivot->valorItem), 2, ',', '.') }} </td>
              @php
              $somaCampo = floatval($produto->pivot->qtdItem) * intval($produto->pivot->valorItem);
              $total = floatval($somaCampo) + floatval($total);
              $somaQtd = floatval($somaQtd) + floatval($produto->pivot->qtdItem);
              @endphp
            </tr>
          @endforeach
          <tr>
            <td class="mdl-data-table__cell--5-non-numeric" colspan="6">Total de itens: {{ number_format($somaQtd, 2, ',', '.' )}}</td>
            <td class="mdl-data-table__cell--1-non-numeric " colspan="1">Total: R$ {{ number_format($total, 2, ',', '.' )}}</td>
          </tr>
        </tbody>
      </table>


    @else
      <div class="mdl-card__supporting-text"> <br>
        <h2 class="mdl-card__title-text">Sem materiais lançados nesse projeto! </h2><br><br>
      </div>
    @endif



    @if (count($projeto->funcionarios) > 0)
      <h2 class="mdl-card__title-text"> Trabalhadores no projeto</h2>
    @endif

    <div class="mdl-grid">
      {{-- @foreach ($projeto->funcionarios as $funcionario) --}}
      @forelse ($projeto->funcionarios as $funcionario)

        <div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-phone">
          <div class="mdl-card mdl-shadow--2dp">
            <img class="mdl-chip__contact" src="/images/user_icon.png">
            <div class="mdl-card__title mdl-card--expand">
              Nome: {{ $funcionario->nome}}
            </div>
            <div class="mdl-card__title mdl-card--expand">
              Cargo: {{ $funcionario->cargo->descricao }}
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="{{ route('funcionario.detalhe',['id'=>$funcionario->id])}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Detalhes ...
              </a>
              <div class="mdl-layout-spacer"></div>
              <a href="{{ route('funcionario.listagem')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Ver todos.
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="mdl-card__supporting-text">
          <h2 class="mdl-card__title-text">Sem trabalhadores no projeto! </h2>
        </div>
      @endforelse
    </div>

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
    {{-- {{ $fornecedores->render() }} --}}
  </div>

@endsection
