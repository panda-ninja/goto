<?php

use GotoPeru\IncluyePaquete;
use GotoPeru\IncluyePaqueteCotizacion;
use Illuminate\Database\Seeder;

class IncluyePaquetesCotizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncluyePaquete::truncate();
        IncluyePaqueteCotizacion::truncate();

        factory(GotoPeru\IncluyePaquete::class, 8)->create();
        $faker = Faker\Factory::create();
        $paquete_id = \GotoPeru\PaqueteCotizacion::pluck('id')->All();
        $incluye_id = \GotoPeru\IncluyePaquete::pluck('id')->All();

        for($i=1; $i<=30; $i++){
            factory(GotoPeru\IncluyePaqueteCotizacion::class)->create(['incluye_paquetes_id'=>$faker->randomElement($incluye_id), 'paquete_cotizaciones_id'=>$faker->randomElement($paquete_id)]);
        }
    }
}
