@extends('temarelatorio');
@section('title', 'Relatório de produtos')

@section('tituloh2', 'Relatório de produtos')
@section('conteudo')
  @if (count($produtos) > 0)
    <table class="table table-striped ">
      <thead>
        <tr>
          <th width="300px" >Descrição</th>
          <th >Categoria</th>
        </tr>
      </thead>
      <tbody>
        @foreach($produtos as $produto)
          <tr >
            <td >{{ ucwords(strtolower($produto->descricao)) }}</td>
            <td >{{$produto->categoria->descricao}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h2 class="text-center">Sem dados para este relatório</h2>
  @endif
@endsection
