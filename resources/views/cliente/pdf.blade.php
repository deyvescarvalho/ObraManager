@extends('temarelatorio');
@section('title', 'Relatório de clientes')

@section('tituloh2', 'Relatório de clientes')
@section('conteudo')
  @if (count($clientes) > 0)
    <table class="table table-striped ">
      <thead>
        <tr>
          <th class="">Nome</th>
          <th class="">Idade</th>
          <th class="">Data de nascimento</th>
          <th class="">CPF</th>
          <th class="">Telefone</th>
          <th class="">Projetos/cliente</th>
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
            <td class="">{{count($cliente->projeto)}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h2 class="text-center">Sem dados para este relatório</h2>
  @endif
@endsection
