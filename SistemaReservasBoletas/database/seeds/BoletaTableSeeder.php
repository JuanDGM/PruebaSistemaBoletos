<?php

use Illuminate\Database\Seeder;

use App\models\Cantidadboleta;

class BoletaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Cantidadboleta::create([
            'cantidad_boletos'=>200
        ]);

        
    }
}
