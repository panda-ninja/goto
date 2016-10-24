<?php

use GotoPeru\Cliente;
use GotoPeru\Cotizacion;
use GotoPeru\User;
use Illuminate\Database\Seeder;

class CotizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cotizacion::truncate();

        $faker = Faker\Factory::create();
        $clientes_id = Cliente::pluck('id')->All();
        $usuario_id = User::pluck('id')->All();

        for($i=1; $i<=10; $i++) {
            factory(GotoPeru\Cotizacion::class)->create([
                'clientes_id' => $faker->randomElement($clientes_id),
                'users_id' => $faker->randomElement($usuario_id),

            ]);
        }
    }
}
