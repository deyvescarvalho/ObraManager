
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
  {!! Form::text('descricao', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'20']) !!}
  {!! Form::label('descricao', 'Descrição ', ['class'=>'mdl-textfield__label']) !!}
  <span class="mdl-textfield__error">Digite uma descrição para o fornecedor!</span>
</div>


<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--1-col">
  {!! Form::text('ddd', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'2']) !!}
  {!! Form::label('ddd', 'DDD', ['class'=>'mdl-textfield__label']) !!}
  <span class="mdl-textfield__error">Digite um DDD válido contendo apenas números!</span>
</div>


<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--7-col">
  {!! Form::text('telefone', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'11', 'pattern'=>'-?[0-9]*(\.[0-9]+)?' ]) !!}
  {!! Form::label('telefone', 'Telefone', ['class'=>'mdl-textfield__label']) !!}
  <span class="mdl-textfield__error">Digite um telefone válido contendo apenas números!</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
  {!! Form::text('endereco', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'60']) !!}
  {!! Form::label('endereco', 'Endereco ', ['class'=>'mdl-textfield__label']) !!}
  <span class="mdl-textfield__error">Digite um endereco válido contendo apenas números!</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col">

  {!! Form::select('cidade', array(null=>'Escolha uma cidade', 'Jataí' => 'Jataí', 'Rio Verde' => 'Rio Verde'), null, ['class'=>'mdl-textfield__input']) !!}
  <span class="mdl-textfield__error">Escolha uma cidade!</span>
</div>
