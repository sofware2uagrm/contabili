<?php

namespace Database\Seeders;

use App\Models\Seguridad\Formulario;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ( $this->get_data() as $data ) {
            Formulario::create( $data );
        }
    }

    public function get_data() {
        $mytime = new Carbon("America/La_Paz");
        return [
            [
                "fkidformulariopadre" => null,
                "x_idusuario" => null,

                "descripcion" => "Seguridad",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //1

            [
                "fkidformulariopadre" => null,
                "x_idusuario" => null,

                "descripcion" => "SuMenu Cuentas",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //2

            [
                "fkidformulariopadre" => 2,
                "x_idusuario" => null,

                "descripcion" => "Cuentas",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //3
            [
                "fkidformulariopadre" => 2,
                "x_idusuario" => null,

                "descripcion" => "Tipo Plan de Cuenta",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //4

            [
                "fkidformulariopadre" => 1,
                "x_idusuario" => null,

                "descripcion" => "Usuario",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //5
            [
                "fkidformulariopadre" => 5,
                "x_idusuario" => null,

                "descripcion" => "Nuevo",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //6
            [
                "fkidformulariopadre" => 5,
                "x_idusuario" => null,

                "descripcion" => "Editar",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //7
            [
                "fkidformulariopadre" => 5,
                "x_idusuario" => null,

                "descripcion" => "Ver",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //8

            
            [
                "fkidformulariopadre" => 1,
                "x_idusuario" => null,

                "descripcion" => "Grupo Usuario",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //9
            [
                "fkidformulariopadre" => 9,
                "x_idusuario" => null,

                "descripcion" => "Nuevo",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //10
            [
                "fkidformulariopadre" => 9,
                "x_idusuario" => null,

                "descripcion" => "Editar",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //11
            [
                "fkidformulariopadre" => 9,
                "x_idusuario" => null,

                "descripcion" => "Ver",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //12

            [
                "fkidformulariopadre" => 1,
                "x_idusuario" => null,

                "descripcion" => "Asignar Usuario",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //13

            [
                "fkidformulariopadre" => 1,
                "x_idusuario" => null,

                "descripcion" => "Formulario",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //14
            [
                "fkidformulariopadre" => 14,
                "x_idusuario" => null,

                "descripcion" => "Nuevo",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //15
            [
                "fkidformulariopadre" => 14,
                "x_idusuario" => null,

                "descripcion" => "Editar",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //16
            [
                "fkidformulariopadre" => 14,
                "x_idusuario" => null,

                "descripcion" => "Ver",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //17

            [
                "fkidformulariopadre" => 1,
                "x_idusuario" => null,

                "descripcion" => "Asignar Formulario",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //18

            [
                "fkidformulariopadre" => 3,
                "x_idusuario" => null,

                "descripcion" => "Plan De Cuentas",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //19
            [
                "fkidformulariopadre" => 3,
                "x_idusuario" => null,

                "descripcion" => "Libro Diario",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //20
            [
                "fkidformulariopadre" => 3,
                "x_idusuario" => null,

                "descripcion" => "Libro Mayor",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //21
            [
                "fkidformulariopadre" => 3,
                "x_idusuario" => null,

                "descripcion" => "Compras",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //22
            [
                "fkidformulariopadre" => 3,
                "x_idusuario" => null,

                "descripcion" => "Ventas",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //23

            [
                "fkidformulariopadre" => 2,
                "x_idusuario" => null,

                "descripcion" => "Contabilidad",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //24
            [
                "fkidformulariopadre" => 24,
                "x_idusuario" => null,

                "descripcion" => "Comprobante",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //25

            [
                "fkidformulariopadre" => null,
                "x_idusuario" => null,

                "descripcion" => "Gestion",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //26
            [
                "fkidformulariopadre" => 26,
                "x_idusuario" => null,

                "descripcion" => "Fecha De Inicio De Gestion Contable",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //27
            [
                "fkidformulariopadre" => 26,
                "x_idusuario" => null,

                "descripcion" => "Datos Generales de la Empresa",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //28

            [
                "fkidformulariopadre" => null,
                "x_idusuario" => null,

                "descripcion" => "Sistema",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //29

            [
                "fkidformulariopadre" => 29,
                "x_idusuario" => null,

                "descripcion" => "Configuracion De Parametros del Sistema",
                "activo" => "A",

                "x_fecha" => $mytime->toDateString(),
                "x_hora"  => $mytime->toTimeString(),
            ], //30

        ];
    }
}
