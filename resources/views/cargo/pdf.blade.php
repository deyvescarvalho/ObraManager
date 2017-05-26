@extends('temarelatorio');
@section('title', 'Relatório de profissões')


@section('tituloh2', 'Relatório de profissões')
@section('conteudo')
  @if (count($cargos) > 0)
    <table class="table table-striped ">
      <thead>
        <tr>
          <th class="">Descrição</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cargos as $cargo)
          <tr>
            <td class="">{{$cargo->descricao}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h2 class="text-center">Sem dados para este relatório</h2>
  @endif
@endsection
