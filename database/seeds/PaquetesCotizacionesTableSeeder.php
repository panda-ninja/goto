<?php

use GotoPeru\Cotizacion;
use GotoPeru\HoraCotizacion;
use GotoPeru\ItinerarioCotizacion;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\ServicioCotizacion;
use Illuminate\Database\Seeder;

class PaquetesCotizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaqueteCotizacion::truncate();
        ItinerarioCotizacion::truncate();
        HoraCotizacion::truncate();
        ServicioCotizacion::truncate();

        $faker = Faker\Factory::create();
        $cotizaciones_id = Cotizacion::pluck('id')->All();

        for ($i=1; $i<=10; $i++){

            factory(GotoPeru\PaqueteCotizacion::class)->create(['cotizaciones_id'=>$faker->randomElement($cotizaciones_id)]);

            $paquete_cotizaciones_id = PaqueteCotizacion::pluck('id')->All();
            for($j=1; $j<=2; $j++){

                factory(GotoPeru\ItinerarioCotizacion::class)->create(['paquete_cotizaciones_id'=>$faker->randomElement($paquete_cotizaciones_id)]);

                $itinerario = \GotoPeru\ItinerarioCotizacion::pluck('id')->All();
                for($k=1; $k<=2; $k++){
                    $horas = factory(GotoPeru\HoraCotizacion::class)->create(['itinerario_cotizaciones_id'=>$faker->randomElement($itinerario)]);
                    $servicios = factory(GotoPeru\ServicioCotizacion::class)->create(['itinerario_cotizaciones_id'=>$faker->randomElement($itinerario)]);
                }
            }//
        }
    }
}
