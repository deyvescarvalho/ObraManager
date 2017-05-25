<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
  {!! Form::text('nome', null, ['id'=>'nome', 'class'=>'mdl-textfield__input']) !!}
  {!! Form::label('nome', 'Nome...', ['class'=>'mdl-textfield__label'])!!}
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
  {!! Form::text('idade', null, ['class'=>"mdl-textfield__input", 'pattern'=>"-?[0-9]*(\.[0-9]+)?"]) !!}
  {!! Form::label('idade', 'Idade', ['class'=>"mdl-textfield__label"]) !!}
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col}">
    {!! Form::label('dtNascimento', 'Data de nascimento') !!}
    {!! Form::date('dtNascimento', null, ['class'=>"mdl-textfield__input"]) !!}
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
  {!! Form::email('email', null, ['class'=>"mdl-textfield__input"]) !!}
  {!! Form::label('email', 'Email', ['class'=>"mdl-textfield__label"]) !!}
</div>


<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col">
  {!! Form::text('cpf', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'11', 'pattern'=>'-?[0-9]*(\.[0-9]+)?', 'id'=>'cpf'])!!}
  {!! Form::label('cpf', 'CPF', ['class'=>'mdl-textfield__label'])  !!}
  <span class="mdl-textfield__error">Digite um CPF válido contendo apenas números!</span>
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

  {!! Form::select('cidade', array(null=>'Escolha uma cidade', 'jatai' => 'Jataí', 'rioverde' => 'Rio Verde'), null, ['class'=>'mdl-textfield__input']) !!}
  <span class="mdl-textfield__error">Escola uma cidade!</span>
</div>
