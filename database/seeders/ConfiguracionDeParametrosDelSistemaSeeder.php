<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\moneda;
use App\Models\asiento_LCV;
use App\Models\formato_doc;
use App\Models\firma_reporte;
use App\Models\proyecto;
use App\Models\tiponivel;
use GuzzleHttp\Promise\Create;

class ConfiguracionDeParametrosDelSistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        asiento_LCV::create([
            'generar_asientos'=>1,
            'credito_Fiscal'=>13,
            'IT'=>3,
        ]);  
        formato_doc::create([
            'habilitar_ref'=>0,
            'imprimir_nombre_comprobante'=>0,
            'mostrar_fecha_hora'=>1,
        ]);
        firma_reporte::create([
           'nombre_reporte' => 'Comprobante De Ingreso' ,
           'firma1'=> '',
           'firma2'=> 'condator',
           'firma3'=> 'gerente',
           'opcion_firma_enteresado'=>0,
           'activo_opcion'=>1,
        ]);
        firma_reporte::create([
            'nombre_reporte' => 'Comprobante De Traspaso' ,
            'firma1'=> '',
            'firma2'=> 'condator',
            'firma3'=> 'gerente',
            'opcion_firma_enteresado'=>0,
            'activo_opcion'=>1,
         ]);
         firma_reporte::create([
            'nombre_reporte' => 'Comprobante De Egreso' ,
            'firma1'=> '',
            'firma2'=> 'condator',
            'firma3'=> 'gerente',
            'opcion_firma_enteresado'=>1,
            'activo_opcion'=>1,
         ]);
         firma_reporte::create([
            'nombre_reporte' => 'Comprobante De Financieros' ,
            'firma1'=> '',
            'firma2'=> 'condator',
            'firma3'=> 'gerente',
            'opcion_firma_enteresado'=>0,
            'activo_opcion'=>1,
         ]);
         proyecto::create([
            'habilitar_contabilidad'=>1,
         ]);

         tiponivel::create([
            'tipoNivel'=>1,
            'nivel'=>1,  
         ]);
         tiponivel::create([
            'tipoNivel'=>1,
            'nivel'=>2,  
         ]);
         tiponivel::create([
            'tipoNivel'=>1,
            'nivel'=>3,  
         ]);
         tiponivel::create([
            'tipoNivel'=>1,
            'nivel'=>4,  
         ]);
         tiponivel::create([
            'tipoNivel'=>1,
            'nivel'=>5,  
         ]);
         tiponivel::create([
            'tipoNivel'=>4,
            'nivel'=>6,  
         ]);
    }
}
