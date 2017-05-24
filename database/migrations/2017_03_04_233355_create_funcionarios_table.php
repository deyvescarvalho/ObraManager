<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('funcionarios', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('cargo_id')->unsigned();
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users');
      $table->string('nome');
      $table->date('dtNascimento');
      // $table->string('dia');
      // $table->string('mes');
      // $table->string('ano');
      $table->string('cpf');
      $table->string('email');
      $table->string('idade');
      $table->string('telefone');
      $table->string('ddd');
      $table->string('cidade');
      $table->text('endereco');
      $table->timestamps();
      $table->foreign('cargo_id')->references('id')->on('cargos')
      ->onUpdate('cascade')
      ->onDelete('cascade');
    });
  }


  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('funcionarios');
  }
}
