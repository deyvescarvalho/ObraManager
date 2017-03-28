@extends('tema')

@section('title', 'Visualização do funcionário')

@section('title_page', 'Visualização do funcionário')

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
      <h2 class="mdl-card__title-text">Nome: {{$funcionario->nome }}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Endereço: {{$funcionario->endereco}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Cidade: {{$funcionario->cidade}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h2 class="mdl-card__title-text">Obras: {{ count($funcionario->projetos) }}</h2>
    </div>


  </div>


@endsection
