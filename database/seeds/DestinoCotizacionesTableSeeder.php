<?php

use GotoPeru\DestinoCotizacion;
use Illuminate\Database\Seeder;

class DestinoCotizacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DestinoCotizacion::truncate();

        factory(GotoPeru\DestinoCotizacion::class, 10)->create();
    }
}
