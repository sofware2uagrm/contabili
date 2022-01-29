<?php

namespace App\Http\Controllers;

use App\Models\tiponivel;
use Illuminate\Http\Request;

class TiponivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $tiponivel;
    public function __construct()
    {
        $this->middleware('auth');
        $this->tiponivel= new tiponivel();
    }
    
    public function index()
    {
        $datos= $this->tiponivel->get();
        $dato = ['datos'=>$datos];
        echo view('configuracion_parametros_sistema/Niveles/niveltipocuenta',$dato);

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
     * @param  \App\Models\tiponivel  $tiponivel
     * @return \Illuminate\Http\Response
     */
    public function show(tiponivel $tiponivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tiponivel  $tiponivel
     * @return \Illuminate\Http\Response
     */
    public function edit(tiponivel $tiponivel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tiponivel  $tiponivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tiponivel $tiponivel)
    {
        $tipo_aux=$tiponivel->tipoNivel;
        $tiponivel->tipoNivel=$request->tipo;
        
        $tiponivel->update();

        if($tipo_aux != $request->tipo){
        return redirect()->to(asset('tipoNivel'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tiponivel  $tiponivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(tiponivel $tiponivel)
    {
        //
    }
}
