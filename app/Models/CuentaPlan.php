<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaPlan extends Model
{
    use HasFactory;
    protected $table = 'cuenta_plan';
    protected $primaryKey = 'idCuentaPlan';

    const ESTADO_ACTIVO = 1;
    const ESTADO_DESACTIVO = 0;

    const NIVEL_1 = 1;
    const NIVEL_2 = 2;
    const NIVEL_3 = 3;
    const NIVEL_4 = 4;
    const NIVEL_5 = 5;

    protected $fillable =[
        'codigo',
        'descripcion',
        'estado',
        'idPlanCuentaPadre',
        'idCuentaPlanTipo',
    ];
    public $timestamps = false;
}
