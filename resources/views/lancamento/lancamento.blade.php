@extends('tema')


@section('title', 'Lançamentos gerais')
@section('title_page', 'Lançamentos gerais')


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

<!-- <h1 class=" typo-styles__demo mdl-typography--display-1">Cadastro de usuarios</h1> -->
<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__supporting-text">
    <h2 class="mdl-card__title-text">Lançamento de item</h2>
    {!! Form::open(['route'=> 'lancamento.store', 'method'=>'post']) !!}

    @include('lancamento.form')
  </div>
  <div class="mdl-card__actions ">
    {!! Form::submit('Enviar', ['class'=>'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
  </div>

  {!! Form::close() !!}

</div>


@endsection
