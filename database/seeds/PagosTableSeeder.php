<?php

use GotoPeru\Cotizacion;
use GotoPeru\Pago;
use Illuminate\Database\Seeder;

class PagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pago::truncate();

        $faker = Faker\Factory::create();
        $cotizaciones_id = Cotizacion::pluck('id')->All();

        for($i=1; $i<=20; $i++){
            factory(GotoPeru\Pago::class)->create(['cotizaciones_id'=>$faker->randomElement($cotizaciones_id)]);
        }
    }
}
