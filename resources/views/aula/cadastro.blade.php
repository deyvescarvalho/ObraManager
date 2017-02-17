@extends('tema')

@section('title', 'Cadastro de usuario')

@section('conteudo')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h2>Cadastro de usuarios</h2>
<form class="" route="aula.store" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="text" name="nome" placeholder="Nome">
  <input type="text" name="idade" placeholder="idade">
  <input type="text" name="dtNascimento" placeholder="Nascimento">
  <input type="text" name="cpf" placeholder="CPF">
  <input type="text" name="telefone" placeholder="telefone">
  <input type="submit" value="enviar" name="enviar"></input>
</form>

@endsection
