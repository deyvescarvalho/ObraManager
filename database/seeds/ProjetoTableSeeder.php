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
        // App\Projeto::truncate();
        factory('App\Projeto', 10)->create();
    }
}
