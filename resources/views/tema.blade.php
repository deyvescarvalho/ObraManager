<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/styles.css">
  <title>@yield('title')</title>
</head>
<body>
  <nav>
    <ul>
      <li><a href="/aula/home">Home</a></li>
      <li><a href="/aula/cadastrar">Cadastrar</a></li>
    </ul>


  </nav>

  <div class="container">
    <div class="row">
      @yield('conteudo')
    </div>
  </div>
</body>
</html>
