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
  @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>

        {{ $error }}
      </li>
      @endforeach
    </ul>
  @endif

  @if (session('status'))

  <div class="alert success">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ session('status') }}

  </div>
  @endif

  <div class="demo-card-wide mdl-card mdl-shadow--2dp">
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Cliente: {{strtoupper($projeto->cliente->nome)}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Endereço: {{$projeto->endereco}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Cidade: {{$projeto->cidade}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Valor estimado: R$ {{number_format($projeto->valorobra, 2, ',', '.')}}</h2>
    </div>
  </div>


  <div class="mdl-cell mdl-cell--12-col">
    @if (count($projeto->produtos) > 0 )
      <table class="mdl-cell mdl-cell--12-col mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--hide-phone mdl-cell--hide-tablet">
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
            <th class="mdl-cell--1-col"></th>
          </tr>
        </thead>
        <tbody>

          @foreach ($projeto->produtos as $produto)

            <div class="mdl-cell mdl-cell--12-col-phone demo-card-square mdl-card mdl-shadow--2dp mdl-cell--hide-desktop">
              <a href="{{ route('lancamento.removeItem', ['id'=>$projeto->id, 'item_id' => $produto->id]) }}" onClick="return confirm('Deseja realmente remover o item ?')" class="exclusaoFuncionario mdl-button mdl-js-button mdl-button--icon mdl-button">
                <i class="material-icons">clear</i>
              </a>
              <div class="mdl-card__title ">
                <span><i class="material-icons md-light md-48">person</i></span>
                <h2 class="mdl-card__title-text"> {{ strtoupper($produto->descricao)}}</h2>
              </div>
              <div class="mdl-card__supporting-text ">
                <p class="mdl-card__title-text">Data: {{date('d/m/Y', strtotime($produto->pivot->dataLancamento))}}</p>
                <p class="mdl-card__title-text">Categoria: {{$produto->categoria->descricao}}</p>
                <p class="mdl-card__title-text">Qtd: {{$produto->pivot->qtdItem}}</p>
                <p class="mdl-card__title-text">Valor R$ {{ number_format($produto->pivot->valorItem, 2, ',', '.') }}</p>
                <p class="mdl-card__title-text">Total R${{ number_format(intval($produto->pivot->qtdItem) * $produto->pivot->valorItem, 2, ',', '.') }}</p>
              </div>
            </div>


            <tr class="mdl-cell--hide-phone mdl-cell--hide-tablet">
              @php
              $forn = App\Fornecedor::find($produto->pivot->fornecedor_id);
              @endphp

              <td class="mdl-data-table__cell--non-numeric "> {{date('d/m/Y', strtotime($produto->pivot->dataLancamento))}}</td>
              <td class="mdl-data-table__cell--non-numeric "> {{ $produto->descricao}}</td>
              <td class="mdl-data-table__cell--non-numeric "> {{ $produto->categoria->descricao }}</td>
              <td class="mdl-data-table__cell--non-numeric "> {{ $forn->descricao or ' - ' }}</td>
              <td class="mdl-data-table__cell--non-numeric "> R$ {{ number_format($produto->pivot->valorItem, 2, ',', '.') }}</td>
              <td class="mdl-data-table__cell--non-numeric "> {{ $produto->pivot->qtdItem }}</td>
              <td class="mdl-data-table__cell--non-numeric "> R$ {{ number_format(intval($produto->pivot->qtdItem) * $produto->pivot->valorItem, 2, ',', '.') }} </td>
              <td class="mdl-data-table__cell--non-numeric">
                <a href="{{ route('lancamento.removeItem', ['id'=>$projeto->id, 'item_id' => $produto->id]) }}" onClick="return confirm('Deseja realmente deletar o item ?')" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                  <i class="material-icons">delete</i>
                </a>
              </td>
              @php
              $somaCampo = floatval($produto->pivot->qtdItem) * intval($produto->pivot->valorItem);
              $total = floatval($somaCampo) + floatval($total);
              $somaQtd = floatval($somaQtd) + floatval($produto->pivot->qtdItem);
              @endphp
            </tr>
          @endforeach
          <tr class="mdl-cell--hide-phone mdl-cell--hide-tablet">
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
            <a href="{{ route('lancamento.removefuncionario', ['id'=>$projeto->id, 'funcionario_id' => $funcionario->id]) }}" onClick="return confirm('Deseja realmente remover o funcionário ?')" class="exclusaoFuncionario mdl-button mdl-js-button mdl-button--icon mdl-button">
              <i class="material-icons">clear</i>
            </a>
            <img class="mdl-chip__contact" src="/images/user_icon.png">
            <div class="mdl-card__title mdl-card--expand">
              Nome: {{ $funcionario->nome}}
            </div>
            <div class="mdl-card__title mdl-card--expand">
              Cargo: {{ $funcionario->cargo->descricao }}
            </div>
            <div class="mdl-card__title mdl-card--expand">
                Salário: R$ {{number_format($funcionario->pivot->valorSalario, 2, ',', '.' ) }}
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

    .exclusaoFuncionario {
      position: absolute;
      right: 0;
      color: red;
    }

    </style>
    {{-- {{ $fornecedores->render() }} --}}
  </div>

@endsection
