<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especifica extends Model
{
    use HasFactory;

    protected $table = 'cuentas_especificas';
    protected $primaryKey = 'id';

    const NIVEL_1 = 1;
    const NIVEL_2 = 2;
    const NIVEL_3 = 3;

    protected $fillable =[
        'codigo_nivel',
        'codigo_cuenta',
        'cuenta_especifica',
        'tipo_cuenta',
        'idCuentaPlan'
    ];
    public $timestamps = false;


}
