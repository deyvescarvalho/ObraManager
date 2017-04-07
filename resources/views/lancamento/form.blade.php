<input type="hidden" name="cliente_id" value="{{ $projeto->cliente_id }}">
<input type="hidden" name="projeto_id" value="{{ $projeto->id }}">

<select class="mdl-textfield__input mdl-js-textfield mdl-cell mdl-cell--3-col" name="produto_id">
  <option value="">Selecione o produto</option>
  @foreach($categorias as $categoria)
    <optgroup label="{{$categoria->descricao}}">
      @foreach($categoria->produtos as $produto)
        <option value="{{$produto->id}}">{{$produto->descricao}}</option>
      @endforeach
    </optgroup>
  @endforeach
</select>
<?php // TODO: voltar para ver questao de lançar funcionarios na obra ?>
<br>
<select class="mdl-textfield__input mdl-js-textfield mdl-cell mdl-cell--3-col" name="fornecedor_id">
  <option value="">Selecione o fornecedor</option>
  @foreach ($fornecedores as $fornecedor)
    <option value="{{ $fornecedor->id }}">{{ $fornecedor->descricao}}</option>
  @endforeach
</select>

<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--5-col">
  {!! Form::label('dataLancamento', 'Data de Lançamento') !!}
  {!! Form::date('dataLancamento', null, ['id'=>'dataLancamento', 'min'=>'2000-01-01','class'=>"mdl-textfield__input", 'pattern'=>"-?[0-9]*(\.[0-9]+)?"]) !!}
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
  {!! Form::text('valorItem', null, ['id'=>'valoritem', 'onkeypress'=>'mascara(this,moeda)','class'=>"mdl-textfield__input"]) !!}
  {!! Form::label('valorItem', 'Valor do item R$', ['class'=>"mdl-textfield__label"]) !!}
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
  {!! Form::number('qtdItem', null, ['class'=>'mdl-textfield__input', 'min'=>'0', 'step'=>'0.01', 'maxLength'=>'60']) !!}
  {!! Form::label('qtdItem', 'Quantidade ', ['class'=>'mdl-textfield__label']) !!}
  <span class="mdl-textfield__error">Digite uma quantidade válida contendo apenas números!</span>
</div>
