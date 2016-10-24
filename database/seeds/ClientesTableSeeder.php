<?php

use GotoPeru\Cliente;
use GotoPeru\SubCliente;
use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::truncate();
        SubCliente::truncate();


        factory(GotoPeru\Cliente::class, 10)->create();
        $faker = Faker\Factory::create();
        $clientes_id = Cliente::pluck('id')->All();

        for($i=1; $i<=20; $i++){
            factory(GotoPeru\SubCliente::class)->create(['clientes_id'=>$faker->randomElement($clientes_id)]);
        }

    }
}
