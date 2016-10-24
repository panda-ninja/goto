<?php

use GotoPeru\ItinerarioPersonalizado;
use GotoPeru\ItinerarioXHora;
use GotoPeru\PaquetePersonalizado;
use GotoPeru\Servicio;
use Illuminate\Database\Seeder;

class PaquetesPersonalizadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaquetePersonalizado::truncate();
        ItinerarioPersonalizado::truncate();
        ItinerarioXHora::truncate();
        Servicio::truncate();

//        factory(GotoPeru\PaquetePersonalizado::class, 10)->create()->each(
//        function ($paquete){
//            $paquete->itinerario_personalizados()->save(factory(GotoPeru\ItinerarioPersonalizado::class)->make())->each(
//                function($itinerario){
//                    $itinerario->itinerario_x_horas()->save(factory(GotoPeru\ItinerarioXHora::class)->make());
//                });
//        });

        factory(GotoPeru\PaquetePersonalizado::class, 10)->create();
        $faker = Faker\Factory::create();
        $paquete_personalizados_id = PaquetePersonalizado::pluck('id')->All();

        for($i=1; $i<=10; $i++){
            factory(GotoPeru\ItinerarioPersonalizado::class)->create(['paquete_personalizados_id'=>$faker->randomElement($paquete_personalizados_id)]);
            $itinerario = ItinerarioPersonalizado::pluck('id')->All();
            for($j=1; $j<=2; $j++){
                $horas = factory(GotoPeru\ItinerarioXHora::class)->create(['itinerario_personalizados_id'=>$faker->randomElement($itinerario)]);
                $servicios = factory(GotoPeru\Servicio::class)->create(['itinerario_personalizados_id'=>$faker->randomElement($itinerario)]);
            }
        }


    }
}
