<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    use HasFactory;
    protected $table = 'monedas';
    protected $primaryKey = 'idMoneda';



    protected $fillable =[
        'idMoneda',
        'breve',
        'descripcion',
        'predeterminado',
        'estado',
    ];
    public $timestamps = false;
}
