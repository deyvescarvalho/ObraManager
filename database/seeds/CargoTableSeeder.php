<?php

use Illuminate\Database\Seeder;
use App\Cargo;
class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Cargo::truncate();
      factory(Cargo::class, 20)->create();
    }
}
