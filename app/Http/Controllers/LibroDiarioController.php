<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroDiarioController extends Controller
{
    public function mostrar(){
        return view('page.libroDiario');
    }
}
