<?php

namespace Database\Seeders;

use App\Models\Seguridad\GrupoUsuario;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GrupoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        foreach ( $this->get_data() as $data ) {
            GrupoUsuario::create( $data );
        }
    }

    public function get_data() {
        $mytime = new Carbon("America/La_Paz");
        return [
            [
                "descripcion" => "SUPER ADMIN",
                "nota" => "Encargado de administrar a detalle todas las funcionalidades del sistema",

                "issuperadmin" => "A",

                "x_idusuario" => null,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
                
                "isdelete" => "N",
                "estado"   => "A",
            ],
            [
                "descripcion" => "ADMIN",
                "nota" => "Encargado de administrar todas las funcionalidades del sistema",

                "issuperadmin" => "A",

                "x_idusuario" => null,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
                
                "isdelete" => "N",
                "estado"   => "A",
            ],
            [
                "descripcion" => "CONTABLE",
                "nota" => "",

                "issuperadmin" => "A",

                "x_idusuario" => null,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
                
                "isdelete" => "N",
                "estado"   => "A",
            ],
        ];
    }
    
}
