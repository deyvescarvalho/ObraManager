<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancamentoProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamento_projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projeto_id')->unsigned()->nullable();
            $table->integer('fornecedor_id')->unsigned()->nullable();
            $table->integer('produto_id')->unsigned()->nullable();
            $table->foreign('projeto_id')->references('id')->on('projetos')
              ->onUpdate('cascade')
              ->onDelete('set null');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors')
              ->onUpdate('cascade')
              ->onDelete('set null');
            $table->foreign('produto_id')->references('id')->on('produtos')
              ->onUpdate('cascade')
              ->onDelete('set null');
            $table->string('dataLancamento');
            $table->float('valorItem', 15, 4);
            $table->float('qtdItem', 15, 4);
            // $table->float('total');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lancamento_projetos');
    }
}
