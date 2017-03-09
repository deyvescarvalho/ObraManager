@extends('tema')

@section('title', 'Cadastro de Funcionário')
@section('title_page', 'Cadastro de Funcionário')

@section('conteudo')
<style media="screen">
.alert {
  padding: 10px;
  background-color: #f44336;
  color: white;
  opacity: 0.83;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {
  background-color: #4CAF50;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}
</style>
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

<!-- <h1 class=" typo-styles__demo mdl-typography--display-1">Cadastro de usuarios</h1> -->
<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__supporting-text">
    <h2 class="mdl-card__title-text">Dados pessoais</h2>
    {!! Form::open(['route'=> 'funcionario.store', 'method'=>'post']) !!}

    @include('funcionario.form')
  </div>
  <div class="mdl-card__actions ">
    {!! Form::submit('Enviar', ['class'=>'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
  </div>

  {!! Form::close() !!}

</div>


@endsection
