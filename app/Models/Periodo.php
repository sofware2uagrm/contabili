<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $table = 'periodo';
    protected $primaryKey = 'idMoneda';



    protected $fillable =[
        'idPeriodo',
        'descripcion',
        'fechaInicio',
        'fechaFinal',
        'horaInicio',
        'horaFinal',
        'estado'
    ];
    public $timestamps = false;
}
