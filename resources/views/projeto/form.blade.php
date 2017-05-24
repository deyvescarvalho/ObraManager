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

{{-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
  {!! Form::text('valorobra', null, ['id'=>'valorobra', 'onkeypress'=>'mascara(this,moeda)', 'class'=>"mdl-textfield__input"]) !!}
  {!! Form::label('valorobra', 'Valor da Construção', ['class'=>"mdl-textfield__label"]) !!}
</div> --}}
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
  {!! Form::text('valorobra', null, ['id'=>'valorobra', 'class'=>'moedaReal', 'class'=>"mdl-textfield__input"]) !!}
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

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
var mask = {
 money: function() {
 	var el = this
 	,exec = function(v) {
 	v = v.replace(/\D/g,"");
 	v = new String(Number(v));
 	var len = v.length;
 	if (1== len)
 	v = v.replace(/(\d)/,"0.0$1");
 	else if (2 == len)
 	v = v.replace(/(\d)/,"0.$1");
 	else if (len > 2) {
 	v = v.replace(/(\d{2})$/,'.$1');
 	}
 	return v;
 	};

 	setTimeout(function(){
 	el.value = exec(el.value);
 	},1);
 }

}

$(function(){
 $('#valorobra').bind('keypress',mask.money);
 $('#valorobra').bind('keyup',mask.money);
});


</script>
