<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'logo' => '',
            'razonsocial' => 'FINOR',
            'nit' => '9890833',
            'direccion' => 'C/Ezequiel #3344',
            'telefono' => '78368732',
            'ciudad' => 'Santa Cruz',
            'actividad' => 'Contable',
            'responsable' => 'Antonio Cuchi',
            'ci_responsable' => '883292991',
            'sucursal' => 'Sucursal 1',
            'estado' => 'activo',
            'idUser' => User::first()->id
        ]);
    }
}
