<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteTipo extends Model
{
    use HasFactory;
    protected $table = 'comprobante_tipo';
    protected $primaryKey = 'idComprobanteTipo';



    protected $fillable =[
        'idComprobanteTipo',
        'descripcion',
        'estado',
    ];
    public $timestamps = false;
}
