<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuentaPlanTipoController extends Controller
{
    public function mostrar(){
        return view('page.tipoCuenta');
    }    
}

