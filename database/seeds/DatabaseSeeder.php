<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::truncate();
        factory('App\User')->create(
          [
              'name' => 'Deyves',
              'email' => 'deyvescarvalho@gmail.com',
              // 'password' => bcrypt('secret'),
              'password' => bcrypt('123456'),
              'remember_token' => str_random(10),
          ]
        );
        // $this->call(PostsTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(FuncionarioTableSeeder::class);
        $this->call(ProjetoTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        $this->call(ProdutoTableSeeder::class);
        $this->call(FornecedorTableSeeder::class);
        $this->call(CargoTableSeeder::class);
    }
}
