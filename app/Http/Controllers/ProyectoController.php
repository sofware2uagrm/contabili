<?php

namespace App\Http\Controllers;

use App\Models\proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    protected $proyecto;
    public function __construct()
    {
        $this->middleware('auth');
        $this->proyecto= new proyecto();
    }
    public function index()
    {
        $datos= $this->proyecto->get();
       $dato = ['datos'=>$datos];
        echo view('configuracion_parametros_sistema/proyecto/proyecto',$dato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proyecto $proyecto)
    {
        $phc=$proyecto->habilitar_contabilidad;
        $proyecto->habilitar_contabilidad=$request->habilitar_contabilidad;
        
        $proyecto->update();
        if ($phc != $request->habilitar_contabilidad){
        return redirect()->to(asset('proyecto'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(proyecto $proyecto)
    {
        //
    }
}
