<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable =['descripcion','fecha_ini','fecha_fin','idEmpresa'];  
}
