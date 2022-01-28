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
    {
        DB::table('monedas')->insert([
            'breve' => 'BS',
            'descripcion' => 'Bolivianos',
            'breve' => 0,
            'predeterminado' => 1,
        ]);

        DB::table('monedas')->insert([
            'breve' => '$',
            'descripcion' => 'Dolar',
            'breve' => 0,
            'breve' => 1,
            'predeterminado' => 1,
        ]);
    }
}
