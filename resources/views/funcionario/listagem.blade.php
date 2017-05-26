@extends('tema')

@section('title', 'Listagem de Funcionarios')
@section('title_page', 'Listagem de Funcionarios')




@section('conteudo')

  @if (session('status'))
    <div class="alert success">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      {{ session('status') }}
    </div>

  @endif


  <div class="mdl-cell mdl-cell--12-col">
    <a href="{{ route('funcionario.create') }}" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
      <i class="material-icons">add</i>
    </a> Novo funcionário
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" href="{{route('pdf.funcionarios')}}" target="_blank" >Relatório de funcionarios</a>

    @if (count($funcionarios) > 0)



      <table class="mdl-cell mdl-cell--12-col mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--hide-phone mdl-cell--hide-tablet">
        <thead>
          <tr>
            <th class="mdl-data-table__header--sorted-ascending mdl-data-table__cell--non-numeric">Nome</th>
            <th class="mdl-data-table__cell--non-numeric">Idade</th>
            <th class="mdl-data-table__cell--non-numeric">Data de nascimento</th>
            <th class="mdl-data-table__cell--non-numeric">CPF</th>
            <th class="mdl-data-table__cell--non-numeric">Cargo</th>
            <th class="mdl-data-table__cell--non-numeric">Telefone</th>
            <th class="mdl-data-table__cell--non-numeric" colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($funcionarios as $funcionario)
            {{-- <hr class="mdl-cell--hide-desktop"> --}}

            <div class="mdl-cell mdl-cell--12-col-phone demo-card-square mdl-card mdl-shadow--2dp mdl-cell--hide-desktop">
              <div class="mdl-card__title ">
                <span><i class="material-icons md-light md-48">person</i></span>
                <h2 class="mdl-card__title-text"> {{ strtoupper($funcionario->nome) }}</h2>
              </div>
              <div class="mdl-card__supporting-text ">
                <p class="mdl-card__title-text">Idade: {{$funcionario->idade}}</p>
                <p class="mdl-card__title-text">Dt. Nasc: {{date('d/m/Y', strtotime($funcionario->dtNascimento))}}</p>
                <p class="mdl-card__title-text">Profissão: {{$funcionario->cargo->descricao or 'Sem profissão'}}</p>
                <p class="mdl-card__title-text">CPF: {{$funcionario->cpf or 'Sem CPF'}}</p>
                <p class="mdl-card__title-text">Telefone: ({{$funcionario->ddd}}) - {{$funcionario->telefone}}</p>
              </div>
            </div>

            <tr class="mdl-cell--hide-phone mdl-cell--hide-tablet">
              <td class="mdl-data-table__cell--non-numeric ">{{$funcionario->nome}}</td>
              <td class="mdl-data-table__cell--non-numeric">{{$funcionario->idade}}</td>
              <td class="mdl-data-table__cell--non-numeric">{{date('d/m/Y', strtotime($funcionario->dtNascimento))}}</td>
              <td class="mdl-data-table__cell--non-numeric">{{$funcionario->cpf}}</td>
              <td class="mdl-data-table__cell--non-numeric">{{$funcionario->cargo->descricao or 'Sem profissão'}}</td>
              <td class="mdl-data-table__cell--non-numeric">({{$funcionario->ddd}}) - {{$funcionario->telefone}}</td>
              <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('funcionario.edit', ['id'=>$funcionario->id]) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">edit</i></a></td>
              <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('funcionario.destroy', ['id'=>$funcionario->id]) }}" onClick="return confirm('Deseja realmente deletar o funcionario ?')" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored"><i class="material-icons">delete</i></a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $funcionarios->render()}}
    @else
      <h2>Não hà funcionários cadastrados</h2>
    @endif
    <style media="screen">
    ul.pagination {
      display: inline-block;
      padding: 0;
      margin: 0;
    }

    ul.pagination li {display: inline;}

    ul.pagination li a {
      color: black;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
    }

    .demo-card-square.mdl-card {
  /*width: 350px;*/
}
.demo-card-square > .mdl-card__title {
  color: #000;
}

    </style>
  </div>
@endsection
