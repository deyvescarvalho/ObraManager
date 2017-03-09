<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph
    ];
});

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->email,
        'dia' => $faker->randomNumber(2),
        'mes' => $faker->randomNumber(2),
        'ano' => $faker->randomNumber(4),
        'cpf' => $faker->ean13(11),
        'idade' => $faker->randomNumber(2),
        'endereco'=> $faker->address,
        'cidade'=> $faker->city,
        'telefone'=> $faker->randomNumber(9),
        'ddd'=> $faker->randomNumber(2)
    ];
});

$factory->define(App\Funcionario::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->email,
        'dia' => $faker->randomNumber(2),
        'mes' => $faker->randomNumber(2),
        'ano' => $faker->randomNumber(4),
        'cpf' => $faker->ean13(11),
        'idade' => $faker->randomNumber(2),
        'cargo' => $faker->sentence,
        'endereco'=> $faker->address,
        'cidade'=> $faker->city,
        'telefone'=> $faker->randomNumber(9),
        'ddd'=> $faker->randomNumber(2)
    ];
});

$factory->define(App\Produto::class, function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->name,
        'categoria' => $faker->sentence
    ];
});
