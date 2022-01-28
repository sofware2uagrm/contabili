<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    public function mostrar(){
        return view('page.comprobante');
    }
}
