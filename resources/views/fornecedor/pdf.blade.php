@extends('temarelatorio');
@section('title', 'Relatório de fornecedores')


@section('tituloh2', 'Relatório de fornecedores')
@section('conteudo')
  @if (count($fornecedores) > 0)
    <table class="table table-striped ">
      <thead>
        <tr>
          <th class="">Nome</th>
          <th class="">Endereço</th>
          <th class="">Cidade</th>
          <th class="">Telefone</th>
        </tr>
      </thead>
      <tbody>
        @foreach($fornecedores as $fornecedor)
          <tr>
            <td class=" ">{{ ucwords(strtolower($fornecedor->descricao)) }}</td>
            <td class="">{{$fornecedor->endereco}}</td>
            <td class="">{{$fornecedor->cidade}}</td>
            <td class="">({{$fornecedor->ddd}}) - {{$fornecedor->telefone}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h2 class="text-center">Sem dados para este relatório</h2>
  @endif
@endsection
