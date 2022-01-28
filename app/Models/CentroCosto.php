<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroCosto extends Model
{
    use HasFactory;
    protected $table = 'centro_costo';
    protected $primaryKey = 'idCentroCosto';



    protected $fillable =[
        'idCentroCosto',
        'codigo',
        'descripcion',
        'estado'
    ];
    public $timestamps = false;
}
