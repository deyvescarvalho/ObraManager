<html>
<head>
  <meta charset="utf-8">
  <title>Relatório de clientes</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <h2 class="text-center">Relatório de clientes</h2>
  @if (count($clientes) > 0)
      <table class="table table-striped ">
        <thead>
          <tr>
            <th class="">Nome</th>
            <th class="">Idade</th>
            <th class="">Data de nascimento</th>
            <th class="">CPF</th>
            <th class="">Telefone</th>
            <th class="" colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($clientes as $cliente)
            <tr>
              <td class=" ">{{ ucwords(strtolower($cliente->nome)) }}</td>
              <td class="">{{$cliente->idade}}</td>
              <td class="">{{date('d/m/Y', strtotime($cliente->dtNascimento))}}</td>
              <td class="">{{$cliente->cpf}}</td>
              <td class="">({{$cliente->ddd}}) - {{$cliente->telefone}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <h2 class="text-center">Sem dados para este relatório</h2>
    @endif

</body>
</html>
