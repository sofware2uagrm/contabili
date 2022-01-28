<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTransaccion extends Model
{
    use HasFactory;
    protected $table = 'tipo_transaccion';
    protected $primaryKey = 'idTipoTransaccion';

    protected $fillable =[
        'idTipoTransaccion',
        'descripcion',
        'estado',
    ];
    public $timestamps = false;
}
