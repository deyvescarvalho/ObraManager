<!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
  {!! Form::text('cliente', null, ['id'=>'cliente', 'class'=>'mdl-textfield__input']) !!}
  {!! Form::label('cliente', 'Cliente...', ['class'=>'mdl-textfield__label'])!!}
</div> -->

<select class="mdl-textfield__input" name="cliente_id">
  <option value="">Selecione o cliente</option>
  @foreach($clientes as $cliente)
  <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
  @endforeach
</select>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
  {!! Form::text('valorobra', null, ['id'=>'valorobra', 'class'=>"mdl-textfield__input", 'pattern'=>"-?[0-9]*(\.[0-9]+)?"]) !!}
  {!! Form::label('valorobra', 'Valor da Construção', ['class'=>"mdl-textfield__label"]) !!}
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
  {!! Form::text('endereco', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'60']) !!}
  {!! Form::label('endereco', 'Endereco ', ['class'=>'mdl-textfield__label']) !!}
  <span class="mdl-textfield__error">Digite um endereco válido contendo apenas números!</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--5-col">

  {!! Form::select('cidade', array(null=>'Escolha uma cidade', 'jatai' => 'Jataí', 'rioverde' => 'Rio Verde'), null, ['class'=>'mdl-textfield__input']) !!}
  <span class="mdl-textfield__error">Escolha uma cidade!</span>
</div>
