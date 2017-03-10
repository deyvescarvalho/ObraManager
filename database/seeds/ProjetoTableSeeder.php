<?php

use Illuminate\Database\Seeder;
use App\Projeto;
class ProjetoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Projeto::truncate();
        factory('App\Projeto', 20)->create();
    }
}
