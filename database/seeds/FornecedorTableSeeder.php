<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
class FornecedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Fornecedor::truncate();
        factory(Fornecedor::class,20)->create();
    }
}
