<html lang="pt-br" >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <title> @yield('title')</title>

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/images/android-desktop.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Material Design Lite">
  <link rel="apple-touch-icon-precomposed" href="/images/ios-desktop.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="/images/touch/ms-touch-icon-144x144-precomposed.png">
  <meta name="msapplication-TileColor" content="#3372DF">

  <link rel="shortcut icon" href="/images/favicon.png">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
  <link rel="stylesheet" href="/css/stylesmd.css">
  <style>

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

  .demo-card-wide.mdl-card {
    width: 100%;
  }
  .demo-card-wide > .mdl-card__title {
    color: #fff;
    height: 176px;
    background: url('../assets/demos/welcome_card.jpg') center / cover;
  }
  .demo-card-wide > .mdl-card__menu {
    color: #fff;
  }

  .textError{
    list-style: none;
    color: rgba(244,67,54,0.8);
  }

@php
  $user = Auth::user();
@endphp

  </style>
</head>
<body>
  <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">@yield('title_page')</span>
        <div class="mdl-layout-spacer"></div>
        {{-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
          <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
            <i class="material-icons">search</i>
          </label>
          <div class="mdl-textfield__expandable-holder">
            <input class="mdl-textfield__input" type="text" id="search" placeholder="Digite sua pesquisa">
          </div>
        </div> --}}
        {{-- <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
          <i class="material-icons">more_vert</i>
        </button> --}}
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
          <li class="mdl-menu__item">About</li>
          <li class="mdl-menu__item">Contact</li>
          <li class="mdl-menu__item">Legal information</li>
        </ul>
      </div>
    </header>

    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
      <header class="demo-drawer-header">
        <img src="/images/user_icon.png" class="demo-avatar">
        <div class="demo-avatar-dropdown">
          <span>Olá, {{ $user->name }} !</span>
          <div class="mdl-layout-spacer"></div>
          <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
            <i class="material-icons" role="presentation">arrow_drop_down</i>
            <span class="visuallyhidden">Accounts</span>
          </button>
          <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
            <li class="mdl-menu__item">{{ $user->email }}</li>
            <a href="{{route('auth.logout')}}"> <li class="mdl-menu__item">  Sair </li> </a>
          </ul>
        </div>
      </header>
      <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
        <a class="mdl-navigation__link" href="/"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">dashboard</i>Principal</a>
        <a class="mdl-navigation__link" href="/cliente"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Clientes</a>
        <a class="mdl-navigation__link" href="/fornecedor"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Fornecedores</a>
        <a class="mdl-navigation__link" href="/funcionario"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Funcionários</a>
        <a class="mdl-navigation__link" href="/categoria"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">speaker_notes</i>Categorias</a>
        <a class="mdl-navigation__link" href="/produto"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Produtos</a>
        <a class="mdl-navigation__link" href="/cargo"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">assistant</i>Profissões</a>
        <a class="mdl-navigation__link" href="/projeto"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">business</i>Projetos</a>
      </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
      <div class="mdl-grid demo-content">
        @yield('conteudo')
      </div>
    </main>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
      <mask id="piemask" maskContentUnits="objectBoundingBox">
        <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
        <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
      </mask>
      <g id="piechart">
        <circle cx=0.5 cy=0.5 r=0.5 />
        <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
      </g>
    </defs>
  </svg>
  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
      <g id="chart">
        <g id="Gridlines">
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
        </g>
        <g id="Numbers">
          <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
          <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
          <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
          <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
          <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
          <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
          <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
          <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
          <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
          <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
          <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
          <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
        </g>
        <g id="Layer_5">
          <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
          294.5,80.5 380,165.2 437,75.5 469.5,223.3 	"/>
        </g>
        <g id="Layer_4">
          <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
          296.7,128 380.7,184.3 436.7,125 	"/>
        </g>
      </g>
    </defs>
  </svg>
  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.0/jspdf.plugin.autotable.js"></script> --}}
<script src="/js/mascara_moeda.js" charset="utf-8"></script>

</body>
</html>
