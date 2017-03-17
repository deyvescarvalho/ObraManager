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


<script type="text/javascript">
document.getElementById('dataLancamento').valueAsDate = new Date();

// JavaScript Document
function mascara(o,f){
  v_obj=o
  v_fun=f
  setTimeout("execmascara()",1)
}

function execmascara(){
  v_obj.value=v_fun(v_obj.value)
}

function leech(v){
  v=v.replace(/o/gi,"0")
  v=v.replace(/i/gi,"1")
  v=v.replace(/z/gi,"2")
  v=v.replace(/e/gi,"3")
  v=v.replace(/a/gi,"4")
  v=v.replace(/s/gi,"5")
  v=v.replace(/t/gi,"7")
  return v
}

function soNumeros(v){
  return v.replace(/\D/g,"")
}

function telefone(v){
  v=v.replace(/\D/g,"") //Remove tudo o que não é dígito
  v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
  v=v.replace(/(\d{4})(\d)/,"$1 - $2") //Coloca hífen entre o quarto e o quinto dígitos
  return v
}

function cpf(v){
  v=v.replace(/\D/g,"") //Remove tudo o que não é dígito
  v=v.replace(/(\d{3})(\d)/,"$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
  v=v.replace(/(\d{3})(\d)/,"$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
  //de novo (para o segundo bloco de números)
  v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
  return v
}

function cep(v){
  v=v.replace(/\D/g,"") //Remove tudo o que não é dígito
  v=v.replace(/(\d{2})(\d)/,"$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
  v=v.replace(/(\d{3})(\d{1,3})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
  return v
}

function cnpj(v){
  v=v.replace(/\D/g,"") //Remove tudo o que não é dígito
  v=v.replace(/^(\d{2})(\d)/,"$1.$2") //Coloca ponto entre o segundo e o terceiro dígitos
  v=v.replace(/^(\d{2}).(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
  v=v.replace(/.(\d{3})(\d)/,".$1/$2") //Coloca uma barra entre o oitavo e o nono dígitos
  v=v.replace(/(\d{4})(\d)/,"$1-$2") //Coloca um hífen depois do bloco de quatro dígitos
  return v
}

function romanos(v){
  v=v.toUpperCase() //Maiúsculas
  v=v.replace(/[^IVXLCDM]/g,"") //Remove tudo o que não for I, V, X, L, C, D ou M
  //Essa é complicada! Copiei daqui: http://www.diveintopython.org/refactoring/refactoring.html22
  while(v.replace(/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/,"")!="")
  v=v.replace(/.$/,"")
  return v
}

function site(v){
  //Esse sem comentarios para que você entenda sozinho :wink:
  v=v.replace(/^http:\/\/?/,"")
  dominio=v
  caminho=""
  if(v.indexOf("/")>-1)
  dominio=v.split("/")[0]
  caminho=v.replace(/[^\/]*/,"")
  dominio=dominio.replace(/[^\w.+-:@]/g,"")
  caminho=caminho.replace(/[^\w\d+-@:\?&=%().]/g,"")
  caminho=caminho.replace(/([\?&])=/,"$1")
  if(caminho!="")dominio=dominio.replace(/.+$/,"")
  v="http://"+dominio+caminho
  return v
}

function data(v){
  v=v.replace(/\D/g,"") //Remove tudo o que não é dígito
  v=v.replace(/^(\d{2})(\d)/,"$1/$2") //Coloca ponto entre o segundo e o terceiro dígitos
  v=v.replace(/.(\d{2})(\d)/,".$1/$2") //Coloca uma barra entre o oitavo e o nono dígitos
  v=v.replace(/(\d{2})(\d)/,"$1/$2") //Coloca um hífen depois do bloco de quatro dígitos
  return v
}

function moeda(v){
  v=v.replace(/\D/g,"") // permite digitar apenas numero
  v=v.replace(/(\d{1})(\d{17})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
  v=v.replace(/(\d{1})(\d{13})$/,"$1.$2") // coloca ponto antes dos ultimos 13 digitos
  v=v.replace(/(\d{1})(\d{10})$/,"$1.$2") // coloca ponto antes dos ultimos 10 digitos
  v=v.replace(/(\d{1})(\d{7})$/,"$1.$2") // coloca ponto antes dos ultimos 7 digitos
  v=v.replace(/(\d{1})(\d{1,4})$/,"$1,$2") // coloca virgula antes dos ultimos 4 digitos
  return v;
}
</script>
