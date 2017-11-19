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
//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Entities\Aluno::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'filiacao' => $faker->text(10),
        'matricula'=> $faker->numberBetween(1,100),
        'dt_nasc'=> $faker->date('m-d-Y'),
        'natural'=> $faker->text(10),
        'cpf'=> $faker->numberBetween(1,100),
        'rg'=> $faker->text(10),
        'org_exp'=> $faker->text(10),
        'est_civil'=> $faker->text(10),
        'escolaridade'=> $faker->text(10),
        'endereco'=> $faker->text(10),
        'local_trabalho'=> $faker->text(10),
        'data_conversao'=> $faker->text(10),
        'batismo'=> $faker->text(10),
        'membro'=> $faker->text(10),
        'batismo_espirito'=> $faker->text(10),
        'nome_igreja'=> $faker->text(10),
        'end_igreja'=> $faker->text(10),
        'nome_pastor'=> $faker->text(10),
        'tel_pastor'=> $faker->text(10),
        'chamado_ministerial'=> $faker->text(10),
        'comunhao_igreja'=> $faker->text(10),

    ];
});

$factory->define(App\Entities\Professore::class, function (Faker\Generator $faker) {
    return [
        'login' => $faker->text(7),
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(App\Entities\Disciplina::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text(7),
    ];
});

$factory->define(App\Entities\Curso::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text(7),
    ];
});
