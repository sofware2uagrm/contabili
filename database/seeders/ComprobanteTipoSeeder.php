<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComprobanteTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ingreso Egreso y traspaso

        DB::table('comprobante_tipo')->insert([
            'descripcion' => 'ingreso',
            'estado' => 1
        ]);
        DB::table('comprobante_tipo')->insert([
            'descripcion' => 'egreso',
            'estado' => 1
        ]);
        DB::table('comprobante_tipo')->insert([
            'descripcion' => 'traspaso',
            'estado' => 1
        ]);
    }
}
