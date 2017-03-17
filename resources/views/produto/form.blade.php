


<select class="mdl-textfield__input mdl-cell mdl-cell--4-col" name="categoria_id">
  @foreach($categorias as $categoria)
  <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
  @endforeach
</select>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
  {!! Form::text('descricao', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'20']) !!}
  {!! Form::label('descricao', 'Descrição ', ['class'=>'mdl-textfield__label']) !!}
  <span class="mdl-textfield__error">Digite uma descrição para o produto!</span>
</div>
