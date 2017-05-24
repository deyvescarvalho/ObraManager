<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LancamentoProjetosFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('lancamento_projetos_funcionarios', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('projeto_id')->unsigned();
          $table->foreign('projeto_id')->references('id')->on('projetos');
          $table->integer('funcionario_id')->unsigned();
          $table->foreign('funcionario_id')->references('id')->on('funcionarios');
          $table->string('dataLancamento');
          $table->float('valorSalario',15 , 0);
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lancamento_projetos_funcionarios');
    }
}
