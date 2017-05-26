@extends('temarelatorio');
@section('title', 'Relatório de funcionarios')

@section('tituloh2', 'Relatório de funcionarios')
@section('conteudo')
  @if (count($funcionarios) > 0)
    <table class="table table-striped ">
      <thead>
        <tr>
          <th class="">Nome</th>
          <th class="">Idade</th>
          <th class="">Data de nascimento</th>
          <th class="">CPF</th>
          <th class="">Telefone</th>
          <th class="">Cargo</th>
        </tr>
      </thead>
      <tbody>
        @foreach($funcionarios as $funcionario)
          <tr>
            <td class=" ">{{ ucwords(strtolower($funcionario->nome)) }}</td>
            <td class="">{{$funcionario->idade}}</td>
            <td class="">{{date('d/m/Y', strtotime($funcionario->dtNascimento))}}</td>
            <td class="">{{$funcionario->cpf}}</td>
            <td class="">({{$funcionario->ddd}}) - {{$funcionario->telefone}}</td>
            <td class="">{{$funcionario->cargo->descricao}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h2 class="text-center">Sem dados para este relatório</h2>
  @endif
@endsection
