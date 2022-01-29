<?php

namespace Database\Seeders;

use App\Models\Seguridad\AsignarFormulario;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AsignarFormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ( $this->get_data() as $data ) {
            AsignarFormulario::create( $data );
        }
    }

    public function get_data() {
        $mytime = new Carbon("America/La_Paz");
        return [
            [
                "fkidformulario" => 1,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 2,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 3,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 4,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 5,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 6,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 7,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 8,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 9,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 10,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 11,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 12,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 13,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 14,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 15,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 16,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 17,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
            [
                "fkidformulario" => 18,
                "fkidgrupousuario" => 1,

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ],
        ];
    }
}
