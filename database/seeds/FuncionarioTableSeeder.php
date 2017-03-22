<?php

use Illuminate\Database\Seeder;
use App\Funcionario;
class FuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::truncate();
        factory('App\Funcionario', 20)->create();

    }
}
