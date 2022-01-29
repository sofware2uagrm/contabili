<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignarUsuario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'asignarusuario';
    protected $primaryKey = 'idasignarusuario';

    public $timestamps = true;

    protected $dates = [
        "created_at", "updated_at", "deleted_at",
    ];

    protected $attributes = [
        "habilitado" => "A",
        "x_idusuario" => null,
        "isdelete" => "A", "estado" => "A",
    ];

    protected $fillable = [
        "fkidusers", "fkidgrupousuario", "habilitado",
        "x_idusuario", "x_fecha", "x_hora", "isdelete", "estado",
    ];

    public function guardar( $query, $request ) 
    {
        $fkidusers  = $request->fkidusers;
        $fkidgrupousuario  = $request->fkidgrupousuario;

        $x_idusuario  = isset( $request->x_idusuario ) ? $request->x_idusuario : null;
        $x_fecha      = isset( $request->x_fecha ) ? $request->x_fecha : null;
        $x_hora       = isset( $request->x_hora ) ? $request->x_hora : null;

        $grupousuario = $query->create( [
            'fkidusers' => $fkidusers,
            'fkidgrupousuario' => $fkidgrupousuario,

            'x_idusuario' => $x_idusuario,
            'x_fecha'     => $x_fecha,
            'x_hora'      => $x_hora,
        ] );

        return $grupousuario;
    }

}
