@extends('tema')

@section('title', 'Perfil')


@section('title_page', 'Perfil')

@section('conteudo')
  <div class="mdl-cell mdl-cell--12-col">
    <h4>Troca de imagem do perfil</h4>
  </div>
  {!! Form::open(['method' => 'POST', 'route' => 'usuario.perfil.post','files' => true]) !!}



  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
    {!! Form::file('fotoavatar', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'20']) !!}
    <span class="mdl-textfield__error">Escolha a foto do perfil!</span>
  </div>



  <div class="mdl-card__actions ">
    {!! Form::submit('Enviar', ['class'=>'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
  </div>
  {!! Form::close() !!}
</div>
@endsection
