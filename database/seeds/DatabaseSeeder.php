<?php

use Illuminate\Database\Seeder;

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
        factory('App\User')->create(
          [
              'name' => 'Deyves',
              'email' => 'deyvescarvalho@gmail.com',
              // 'password' => $password ?: $password = bcrypt('secret'),
              'password' => bcrypt('secret'),
              'remember_token' => str_random(10),
          ]
        );
        $this->call(PostsTableSeeder::class);
    }
}
