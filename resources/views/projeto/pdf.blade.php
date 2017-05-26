@extends('temarelatorio');
@section('title', 'Relatório de projetos')

@section('tituloh2', 'Relatório de projetos')
@section('conteudo')
  @if (count($projetos) > 0)
    <table class="table table-striped ">
      <thead>
        <tr>
          <th class="">Cliente</th>
          <th class="">Valor estimado R$</th>
          <th class="">Endereço</th>
          <th class="">Cidade</th>
        </tr>
      </thead>
      <tbody>
        @foreach($projetos as $projeto)
          <tr>
            <td class=" ">
              {{ ucwords(strtolower($projeto->cliente->nome)) }}
            </td>
            <td class="">
              {{number_format($projeto->valorobra, 2, ',', '.')}}
            </td>
            <td class="">
              {{$projeto->endereco}}
            </td>
            <td class="">
              {{$projeto->cidade}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h2 class="text-center">Sem dados para este relatório</h2>
  @endif
@endsection
