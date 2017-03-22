@extends('tema')

@section('title', 'Alteração de Funcionário')
@section('title_page', 'Alteração de Funcionário')

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

<div class="success">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{ session('status') }}

</div>
@endif

<!-- <h1 class=" typo-styles__demo mdl-typography--display-1">Cadastro de usuarios</h1> -->
<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__supporting-text">
    <h2 class="mdl-card__title-text">Dados pessoais do Funcionário</h2>

    {!! Form::model($funcionario, ['route'=>['funcionario.update', $funcionario->id], 'method'=>'put'] ) !!}


    @include('funcionario.form')
    <div class="mdl-card__actions ">

      {!! Form::submit('Enviar', ['class'=>'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
    </div>


    {!! Form::close() !!}


  </div>

</div>
@endsection
