<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
  {!! Form::text('nome', null, ['id'=>'nome', 'class'=>'mdl-textfield__input']) !!}
  {!! Form::label('nome', 'Nome...', ['class'=>'mdl-textfield__label'])!!}
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
  {!! Form::text('idade', null, ['class'=>"mdl-textfield__input", 'pattern'=>"-?[0-9]*(\.[0-9]+)?"]) !!}
  {!! Form::label('idade', 'Idade', ['class'=>"mdl-textfield__label"]) !!}
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
  {!! Form::text('dia', null, ['class'=>"mdl-textfield__input", 'min'=>"1", 'max'=>"31", 'maxLength'=>"2", 'pattern'=>"-?[0-9]*(\.[0-9]+)?"]) !!}
  {!! Form::label('dia', 'dd', ['class'=>"mdl-textfield__label"]) !!}
  <span class="mdl-textfield__error">Digite um dia de nascimento válido</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
  {!! Form::text('mes', null, ['class'=>'mdl-textfield__input', 'max'=>'12', 'min'=>'1','maxLength'=>'2', 'patter'=>'-?[0-9]*(\.[0-9]+)?']) !!}
  {!! Form::label('mes', 'MM', ['class'=>"mdl-textfield__label"]) !!}
  <span class="mdl-textfield__error">Digite um mês de nascimento válido</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col">

  {!! Form::text('ano', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'4', 'min'=>'1950', 'max'=>'2017', 'pattern'=>'-?[0-9]*(\.[0-9]+)?']) !!}
  {!! Form::label('ano', 'yyyy', ['class'=>'mdl-textfield__label']) !!}
  <span class="mdl-textfield__error">Digite um ano de nascimento válido</span>
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
  <span class="mdl-textfield__error">Digite um DDD válido contendo apenas números!</span>
</div>


<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col">

  {!! Form::select('cargo', array(null=>'Escolha um cargo', 'administrador' => 'Administrador', 'arquiteto'=>'Arquiteto', 'mestreobra' => 'Mestre de obras', 'pedreiro'=>'Pedreiro'), null, ['class'=>'mdl-textfield__input']) !!}
  <span class="mdl-textfield__error">Escolha uma profissão!</span>
</div>
