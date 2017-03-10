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
        'precio' => $faker->randomFloat(2,0,null),
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

//Cotizaciones
$factory->define(GotoPeru\Cotizacion::class, function (Faker\Generator $faker) {
    return [
        'nropersonas' => $faker->randomNumber(2),
        'precioventa' => $faker->randomFloat(2,500,5000),
        'fecha' => $faker->date(),
        'estado' => $faker->boolean(),
    ];
});

//cotizacion cliente
$factory->define(GotoPeru\ClienteCotizacion::class, function (Faker\Generator $faker) {
    return [
        'estado' => $faker->boolean(),
    ];
});

//Pagos
$factory->define(GotoPeru\Pago::class, function (Faker\Generator $faker) {
    return [
        'concepto' => $faker->sentence(),
        'monto' => $faker->randomFloat(2,500,5000),
        'fecha' => $faker->date(),
        'vencimiento' => $faker->date(),
        'medio' => $faker->creditCardType(),
        'transaccion' => $faker->bankAccountNumber(),
        'estado' => $faker->boolean(),
    ];
});

//Paquetes cotizacion

$factory->define(GotoPeru\PaqueteCotizacion::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->unique()->randomNumber(5),
        'titulo' => $faker->sentence(),
        'duracion' => $faker->randomNumber(2),
        'preciocosto' => $faker->randomFloat(2,500,5000),
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
        'precio' => $faker->randomFloat(2,500,5000),
        'observaciones' => $faker->paragraph(),
        'idvarios' => $faker->randomNumber(2),
        'tiposervicio' => $faker->numberBetween(0,10),
        'verificacion' => $faker->creditCardNumber,
        'estado' => $faker->boolean(),
    ];
});

$factory->define(GotoPeru\IncluyePaquete::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->sentence(),
        'descripcion' => $faker->paragraph(),
        'imagen' => $faker->image(),
        'estado' => $faker->boolean(),
    ];
});

$factory->define(GotoPeru\IncluyePaqueteCotizacion::class, function (Faker\Generator $faker) {
    return [

    ];
});

//Precio Paquetes
$factory->define(GotoPeru\PrecioPaquete::class, function (Faker\Generator $faker) {
    return [
        'estrellas' => $faker->numberBetween(2,5),
        'precio_s' => $faker->randomFloat(2,500,5000),
        'personas_s' => $faker->randomNumber(2),
        'precio_d' => $faker->randomFloat(2,500,5000),
        'personas_d' => $faker->randomNumber(2),
        'precio_t' => $faker->randomFloat(2,500,5000),
        'personas_t' => $faker->randomNumber(2),
        'estado' => $faker->boolean(),

    ];
});

//servicios extras
$factory->define(GotoPeru\ServicioExtra::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->sentence(),
        'descripcion' => $faker->paragraph(),
        'precio' => $faker->randomDigit(5000),
        'estado' => $faker->boolean(),
    ];
});

//destinos cotizacion
$factory->define(GotoPeru\DestinoCotizacion::class, function (Faker\Generator $faker) {
    return [
        'destino' => $faker->city(),
        'region' => $faker->locale(),
        'pais' => $faker->country(),
        'descripcion' => $faker->paragraph(),
        'estado' => $faker->boolean(),
    ];
});

$factory->define(GotoPeru\DestinoPaqueteCotizacion::class, function (Faker\Generator $faker) {
    return [

    ];
});