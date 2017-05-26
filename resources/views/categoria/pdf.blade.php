@extends('temarelatorio');
@section('title', 'Relatório de categorias')


@section('tituloh2', 'Relatório de categorias')
@section('conteudo')
  @if (count($categorias) > 0)
    <table class="table table-striped ">
      <thead>
        <tr>
          <th class="">Descrição</th>
          <th class="">Qtd/produtos</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categorias as $categoria)
          <tr>
            <td class="">{{$categoria->descricao}}</td>
            <td class="">{{count($categoria->produtos)}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <h2 class="text-center">Sem dados para este relatório</h2>
@endif
@endsection
