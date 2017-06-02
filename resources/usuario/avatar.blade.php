@extends('tema')

@section('title', 'Perfil')


@section('title_page', 'Perfil')

@section('conteudo')
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
    <h1>Troca imagem do perfil</h1>
  </div>
  {!! Form::open(['method' => 'POST', 'route' => 'usuario.avatar', 'class' => 'form-horizontal']) !!}



  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
    {!! Form::file('fotoavatar', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'20']) !!}
    {!! Form::label('fotoavatar', 'Seleciona uma foto ', ['class'=>'mdl-textfield__label']) !!}
    <span class="mdl-textfield__error">Escolha a foto do perfil!</span>
  </div>



      <div class="btn-group pull-right">
          {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
          {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
      </div>
  {!! Form::close() !!}
</div>
@endsection
