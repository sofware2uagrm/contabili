<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroMayorController extends Controller
{
    public function mostrar(){
        return view('page.libroMayor');
    }
}
