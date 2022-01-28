<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;
    protected $table = 'comprobante';
    protected $primaryKey = 'idComprobante';



    protected $fillable =[
        'idComprobante',
        'codigo',
        'referidoa',
        'numeroDocumento',
        'glosa',
        'tc',
        'fecha',
        'estado',
        'idMoneda',
        'idComprobanteTipo',
        'idEmpresa',
        'idUser',
    ];
    public $timestamps = false;
}
