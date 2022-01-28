<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaPlanTipo extends Model
{
    use HasFactory;
    protected $table = 'cuenta_plan_tipo';
    protected $primaryKey = 'idCuentaPlanTipo';

    const ESTADO_ACTIVO = 1;
    const ESTADO_DESACTIVO = 0;

    protected $fillable =[
        'descripcion',
        'estado'
    ];
    public $timestamps = false;
}
