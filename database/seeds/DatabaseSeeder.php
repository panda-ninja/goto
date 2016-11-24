<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(PaquetesPersonalizadosTableSeeder::class);
//        $this->call(ClientesTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        $this->call(CotizacionesTableSeeder::class);
//        $this->call(PagosTableSeeder::class);
//        $this->call(PagosTableSeeder::class);
//        $this->call(DestinoCotizacionesTableSeeder::class);
        $this->call(IncluyePaquetesCotizacionesTableSeeder::class);
        //$this->call(PaquetesCotizacionesTableSeeder::class);
//        $this->call(ItinerariosCotizacionesTableSeeder::class);
    }
}
