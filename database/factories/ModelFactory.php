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

// paquete personalizado -> itinerario -> servicios -> itinerarios por hora

$factory->define(GotoPeru\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});



$factory->define(GotoPeru\PaquetePersonalizado::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->unique()->randomNumber(5),
        'titulo' => $faker->sentence(),
        'duracion' => $faker->randomNumber(2),
        'descripcion' => $faker->paragraph(),
        'incluye' => $faker->paragraph(),
        'noincluye' => $faker->paragraph(),
        'opcional' => $faker->paragraph(),
        'imagen' => $faker->image(),
        'estado' => $faker->boolean(),
    ];
});

$factory->define(GotoPeru\ItinerarioPersonalizado::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->sentence(),
        'descripcion' => $faker->paragraph(),
        'dias' => $faker->dayOfMonth(),
        'fecha' => $faker->date(),
        'imagen' => $faker->image(),
        'estado' => $faker->boolean(),
    ];
});

$factory->define(GotoPeru\ItinerarioXHora::class, function (Faker\Generator $faker) {
    return [
        'hora' => $faker->time(),
        'descripcion' => $faker->paragraph(),
        'estado' => $faker->boolean(),
    ];
});

$factory->define(GotoPeru\Servicio::class, function (Faker\Generator $faker) {
    return [
        'precio' => $faker->randomDigit(5000),
        'observaciones' => $faker->paragraph(),

    ];
});

// Clientes -> sub clientes

$factory->define(GotoPeru\Cliente::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'nombres' => $faker->name(),
        'apellidos' => $faker->firstName(),
        'sexo' => $faker->boolean(),
        'fechanacimiento' => $faker->date(),
        'nacionalidad' => $faker->country(),
        'residencia' => $faker->country(),
        'restricciones' => $faker->sentence(),
        'alergias' => $faker->sentence(),
        'dieta' => $faker->sentence(),
        'comentarios' => $faker->paragraph(),
        'pasaporte' => $faker->randomNumber(8),
        'telefono' => $faker->phoneNumber(),
        'email' => $faker->unique()->safeEmail(),
        'password' => $password ?: $password = bcrypt('secret'),
        'estado' => $faker->boolean(),
        'remember_token' => str_random(10),
    ];
});

$factory->define(GotoPeru\SubCliente::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'nombres' => $faker->name(),
        'apellidos' => $faker->firstName(),
        'sexo' => $faker->boolean(),
        'fechanacimiento' => $faker->date(),
        'nacionalidad' => $faker->country(),
        'residencia' => $faker->country(),
        'restricciones' => $faker->sentence(),
        'alergias' => $faker->sentence(),
        'dieta' => $faker->sentence(),
        'comentarios' => $faker->paragraph(),
        'pasaporte' => $faker->randomNumber(8),
        'telefono' => $faker->phoneNumber(),
        'email' => $faker->unique()->safeEmail(),
        'password' => $password ?: $password = bcrypt('secret'),
        'estado' => $faker->boolean(),
        'remember_token' => str_random(10),
    ];
});

//Cotizaciones
$factory->define(GotoPeru\Cotizacion::class, function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->date(),
        'estado' => $faker->boolean(),
    ];
});

//Pagos
$factory->define(GotoPeru\Pago::class, function (Faker\Generator $faker) {
    return [
        'concepto' => $faker->sentence(),
        'monto' => $faker->randomDigit(5000),
        'fecha' => $faker->date(),
        'vencimiento' => $faker->date(),
    ];
});

//Paquetes cotizacion

$factory->define(GotoPeru\PaqueteCotizacion::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->unique()->randomNumber(5),
        'titulo' => $faker->sentence(),
        'duracion' => $faker->randomNumber(2),
        'preciocosto' => $faker->randomDigit(),
        'descripcion' => $faker->paragraph(),
        'incluye' => $faker->paragraph(),
        'noincluye' => $faker->paragraph(),
        'opcional' => $faker->paragraph(),
        'imagen' => $faker->image(),
        'estado' => $faker->boolean(),
    ];
});

$factory->define(GotoPeru\ItinerarioCotizacion::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->sentence(),
        'descripcion' => $faker->paragraph(),
        'dias' => $faker->dayOfMonth(),
        'fecha' => $faker->date(),
        'imagen' => $faker->image(),
        'estado' => $faker->boolean(),
    ];
});

$factory->define(GotoPeru\HoraCotizacion::class, function (Faker\Generator $faker) {
    return [
        'hora' => $faker->time(),
        'descripcion' => $faker->paragraph(),
        'estado' => $faker->boolean(),
    ];
});

$factory->define(GotoPeru\ServicioCotizacion::class, function (Faker\Generator $faker) {
    return [
        'precio' => $faker->randomDigit(5000),
        'observaciones' => $faker->paragraph(),

    ];
});