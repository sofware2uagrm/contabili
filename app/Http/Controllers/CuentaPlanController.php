<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuentaPlanController extends Controller
{
    public function mostrar(){
        return view('page.cuentaPlan');
    }
}
