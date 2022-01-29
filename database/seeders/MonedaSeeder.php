<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//modifique y aumente datos LUCAS
        DB::table('monedas')->insert([
            'breve' => 'BS',
            'descripcion' => 'Bolivianos',
            'predeterminado' => 1,
            'estado'=>1
        ]);

        DB::table('monedas')->insert([
            'breve' => '$',
            'descripcion' => 'Dolar',
            'predeterminado' => 1,
        ]);

        DB::table('monedas')->insert([
            'breve' => 'BS/$',
            'descripcion' => 'Bolivianos/Dolar',
            'predeterminado' => 1,
        ]);
    }
}
