<?php

use GotoPeru\Cliente;
use GotoPeru\ClienteCotizacion;
use GotoPeru\Cotizacion;
use Illuminate\Database\Seeder;

class CotizacionesClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClienteCotizacion::truncate();
        $faker = Faker\Factory::create();
        $clientes_id = Cliente::pluck('id')->All();
        $cotizacion_id = Cotizacion::pluck('id')->All();

        for($i=1; $i<=10; $i++) {
            factory(GotoPeru\ClienteCotizacion::class)->create([
                'cotizaciones_id' => $faker->randomElement($cotizacion_id),
                'clientes_id' => $faker->randomElement($clientes_id),
            ]);
        }

    }
}
