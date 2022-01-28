<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $primaryKey = 'idEmpresa';



    protected $fillable =[
     'idEmpresa',
     'logo',
     'razonsocial',
     'nit',
     'direccion',
     'telefono',
     'ciudad',
     'actividad',
     'responsable',
     'ci_responsable',
     'sucursal',     
     'estado',
     'idUser',
     
    ];
    public $timestamps = false;
}
