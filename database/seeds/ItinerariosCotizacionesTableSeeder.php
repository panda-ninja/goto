<?php

use GotoPeru\Cotizacion;
use GotoPeru\ItinerarioCotizacion;
use GotoPeru\PaquetePersonalizado;
use Illuminate\Database\Seeder;

class ItinerariosCotizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItinerarioCotizacion::truncate();

        $faker = Faker\Factory::create();
        $cotizaciones_id = Cotizacion::pluck('id')->All();
        $paquete_personalizados_id = PaquetePersonalizado::pluck('id')->All();


        for($i=1; $i<=10; $i++){
            factory(GotoPeru\ItinerarioCotizacion::class)->create(['paquete_personalizados_id'=>$faker->randomElement($paquete_personalizados_id),'cotizaciones_id'=>$faker->randomElement($cotizaciones_id)]);
            $itinerario = ItinerarioCotizacion::pluck('id')->All();
            for($j=1; $j<=2; $j++){
                $horas = factory(GotoPeru\HoraCotizacion::class)->create(['itinerario_cotizaciones_id'=>$faker->randomElement($itinerario)]);
                $servicios = factory(GotoPeru\ServicioCotizacion::class)->create(['itinerario_cotizaciones_id'=>$faker->randomElement($itinerario)]);
            }
        }

    }
}
