@extends('tema')

@section('title', 'Principal')
@section('title_page', 'Principal')



@section('conteudo')
<style media="screen">
.contadores{
  background: #ccc;
  text-align: center;
  padding: 5px;
  border-radius: 100px;
  border-style: none;
}
.contadores > span, p{
  margin: 20px;
  font-family: helvetica;
  font-size: 150%;
}

.info-box {
  display: block;
  min-height: 90px;
  background: #fff;
  width: 100%;
  box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  border-radius: 2px;
  margin-bottom: 15px;
}
.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
  background-color: #00c0ef !important;
}
.info-box-icon {
  border-top-left-radius: 2px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 2px;
  display: block;
  float: left;
  height: 90px;
  width: 90px;
  text-align: center;
  font-size: 45px;
  line-height: 90px;
  background: rgba(0,0,0,0.2);
}
.info-box-content {
  padding: 5px 10px;
  margin-left: 90px;
}
.info-box-text {
  text-transform: uppercase;
  text-align: center;
}
.progress-description, .info-box-text {
  display: block;
  font-size: 14px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.info-box-number {
  text-align: center;
  display: block;
  font-weight: bold;
  font-size: 18px;
}
.material-icons.md-48 { font-size: 48px; }
.material-icons.md-light { color: rgba(255, 255, 255, 1); }
</style>
<div class="mdl-js-layout mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-grid mdl-grid--no-spacing">

  <div class=" mdl-cell mdl-cell--3-col mdl-cell mdl-cell--12-col-phone">
    <div class="info-box">
      <span class="bg-aqua info-box-icon"><i class="material-icons md-48 md-light">assignment_ind</i></span>

      <div class="info-box-content">
        <span class="info-box-text">CLIENTES</span>
        <span class="info-box-number">{{ $totalCliente }}<small> </small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class=" mdl-cell--1-offset-desktop mdl-cell mdl-cell--3-col mdl-cell mdl-cell--12-col-phone">
    <div class="info-box">
      <span class="bg-aqua info-box-icon"><i class="material-icons md-48 md-light">assignment_ind</i></span>

      <div class="info-box-content">
        <span class="info-box-text">FUNCIONÁRIOS</span>
        <span class="info-box-number">{{ $totalFuncionario }}<small> </small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class=" mdl-cell--1-offset-desktop mdl-cell mdl-cell--3-col mdl-cell mdl-cell--12-col-phone">
    <div class="info-box">
      <span class="bg-aqua info-box-icon"><i class="material-icons md-48 md-light ">&#xE85C;</i></span>

      <div class="info-box-content">
        <span class="info-box-text">PROJETOS</span>
        <span class="info-box-number">{{ $totalProjetos }}<small> </small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>





@endsection
