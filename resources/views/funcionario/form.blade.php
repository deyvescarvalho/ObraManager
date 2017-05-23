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
  <select class="mdl-textfield__input" name="cargo_id">
    <option value="">Selecione uma profissão</option>
    @foreach($cargos as $cargo)
      <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
    @endforeach
  </select>

</div>
<button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab showw-modal"><i class="material-icons">add</i></button>
{{-- {!! Form::close() !!} --}}
<dialog class="mdl-dialog">
  <div class="mdl-dialog__content">
    <p>
      Cadastro de profissão
    </p>
  </div>

  {{-- {!! Form::open(['route'=> 'cargo.storeDinamico', 'method'=>'post']) !!} --}}

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
    {!! Form::text('descricao', null, ['class'=>'mdl-textfield__input', 'maxLength'=>'20']) !!}
    {!! Form::label('descricao', 'Descrição ', ['class'=>'mdl-textfield__label']) !!}
    <span class="mdl-textfield__error">Digite uma descrição para a profissão!</span>
  </div>

  {{-- @include('cargo.form') --}}
  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
    <button type='button' id="cadastrarAjax" class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>Enviar</button>

    {{-- {!! Form::submit('Enviar', ['id'=>'cadastroAjax', 'class'=>'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!} --}}
  </div>
</div>

{{-- {!! Form::close() !!} --}}

</dialog>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
var dialog = document.querySelector('dialog');
var showModalButton = document.querySelector('.showw-modal');
if (! dialog.showModal) {
  dialogPolyfill.registerDialog(dialog);
}
$(showModalButton).click(function(){

  dialog.showModal();
});
// showModalButton.addEventListener('click', function() {
// });
// $(dialog).('close').click(function(){
//
// });
// dialog.querySelector('.close').addEventListener('click', function() {
//   dialog.close();
// });
// $.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
//   }
// });
$("#cadastrarAjax").click(function(){
  var descricao = $('descricao').val();
  $.post("/cargo/novo/dinamico",
  {
    descricao: $('input[name=descricao]').val()
  },
  function(data, status){
    // alert("Data: " + data + "\nStatus: " + status);
    dialog.close();
    $('select[name=cargo_id]').empty();
    $.get('/cargo/ajax', function(cargos){
      $.each(cargos, function(key, value){
        $('select[name=cargo_id]').append('<option value=' + value.id + '>' + value.descricao + '</option>');
      });
    });
  }
)});
  </script>
