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



  <!-- Simple header with fixed tabs. -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
  mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    {{-- <div class="mdl-layout__header-row"> --}}
    <!-- Title -->
    {{-- <span class="mdl-layout-title">Title</span> --}}
    {{-- </div> --}}
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Item</a>
      <a href="#fixed-tab-2" class="mdl-layout__tab">Funcionário</a>
      {{-- <a href="#fixed-tab-3" class="mdl-layout__tab">Tab 3</a> --}}
    </div>
  </header>
  {{-- <div class="mdl-layout__drawer"> --}}
  {{-- <span class="mdl-layout-title">Title</span> --}}
  {{-- </div> --}}
  @if (session('status'))

    <div class="alert success">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      {{ session('status') }}

    </div>
  @endif
  <main class="mdl-layout__content">
    <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
      <div class="page-content">


        <!-- <h1 class=" typo-styles__demo mdl-typography--display-1">Cadastro de usuarios</h1> -->
        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
          <div class="mdl-card__supporting-text">
            {{-- <h2 class="mdl-card__title-text">Lançamento de item</h2> --}}
            {!! Form::open(['route'=> 'lancamento.store', 'method'=>'post']) !!}

            @include('lancamento.form')
          </div>
          <div class="mdl-card__actions ">
            {!! Form::submit('Enviar', ['class'=>'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
          </div>

          {!! Form::close() !!}

        </div>
      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-2">
      <div class="page-content">
        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
          <div class="mdl-card__supporting-text">
            {{-- <h2 class="mdl-card__title-text">Lançamento de item</h2> --}}
            {!! Form::open(['route'=> 'lancamento.lancaFuncionario', 'method'=>'post']) !!}

            @include('lancamento.funcionarioForm')
          </div>
          <div class="mdl-card__actions ">
            {!! Form::submit('Enviar', ['class'=>'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
          </div>

          {!! Form::close() !!}

        </div>
      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-3">
      <div class="page-content"><!-- Your content goes here --></div>
    </section>
  </main>
</div>



















@endsection
