<?php

namespace Database\Seeders;

use App\Models\Especifica;
use Illuminate\Database\Seeder;

class EspecificaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // NIVEL 1
        Especifica::create([
            'codigo_nivel' => 1,
            'codigo_cuenta' => null,
            'cuenta_especifica'=>'Cuentas de Resultados',
            'tipo_cuenta' => 'Resultado de la Gestión',
            'idCuentaPlan' => null
        ]);
        Especifica::create([
            'codigo_nivel' => 1,
            'codigo_cuenta' => null,
            'cuenta_especifica'=>'Cuentas de Resultados',
            'tipo_cuenta' => 'Resultados Acumulados',
            'idCuentaPlan' => null
        ]);


        // NIVEL 2
        Especifica::create([
            'codigo_nivel' => 2,
            'codigo_cuenta' => null,
            'cuenta_especifica'=>'Cuentas de Débito y Crédito',
            'tipo_cuenta' => 'Crédito Fiscal IVA',
            'idCuentaPlan' => null
        ]);
        Especifica::create([
            'codigo_nivel' => 2,
            'codigo_cuenta' => null,
            'cuenta_especifica'=>'Cuentas de Débito y Crédito',
            'tipo_cuenta' => 'Dédito Fiscal IVA',
            'idCuentaPlan' => null
        ]);
        Especifica::create([
            'codigo_nivel' => 2,
            'codigo_cuenta' => null,
            'cuenta_especifica'=>'Cuentas de Débito y Crédito',
            'tipo_cuenta' => 'Impuestos a las Transacciones por pagar',
            'idCuentaPlan' => null
        ]);
        Especifica::create([
            'codigo_nivel' => 2,
            'codigo_cuenta' => null,
            'cuenta_especifica'=>'Cuentas de Débito y Crédito',
            'tipo_cuenta' => 'Impuestos a las Transacciones',
            'idCuentaPlan' => null
        ]);

        // NIVEL 3
        Especifica::create([
            'codigo_nivel' => 3,
            'codigo_cuenta' => null,
            'cuenta_especifica'=>'Descuentos y Bonificaciones',
            'tipo_cuenta' => 'Descuento Sobre Compras',
            'idCuentaPlan' => null
        ]);
        Especifica::create([
            'codigo_nivel' => 3,
            'codigo_cuenta' => null,
            'cuenta_especifica'=>'Descuentos y Bonificaciones',
            'tipo_cuenta' => 'Descuentos Sobre Ventas',
            'idCuentaPlan' => null
        ]);
    }
}
