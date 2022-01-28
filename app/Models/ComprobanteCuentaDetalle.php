<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteCuentaDetalle extends Model
{
    use HasFactory;
    protected $table = 'comprobante_cuenta_detalle';
    protected $primaryKey = 'idComprobanteCuentaDetalle';



    protected $fillable =[
     'idComprobanteCuentaDetalle',
     'codigo',
     'glosa',
     'debe',
     'haber',

     'idCuentaPlan',
     'idComprobante',
     
    ];
    public $timestamps = false;


}
