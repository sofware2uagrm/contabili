<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table='facturas';
    protected $primaryKey='idFactura';

    protected $fillable=[
        'idFactura',
        'nro_factura',
        'nit_factura',
        'proveedor',
        'nroautorizacion',
        'codcontrol',
        'total_factura',
        'ice',
        'importes_excentos',
        'descuentos',
        'credito_fiscal',
        'idComprobanteCuentaDetalle',
    ];
    public $timestamps = false;
}
