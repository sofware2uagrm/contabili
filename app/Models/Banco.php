<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;
    protected $table = 'bancos';
    protected $primaryKey = 'idBanco';



    protected $fillable =[
        'idBanco',
        'nombre',
        'numeroCuenta',
        'monto',
        'tc',
        'estado'
    ];
    public $timestamps = false;
}
