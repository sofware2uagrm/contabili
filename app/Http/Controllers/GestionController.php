<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function index()
    {//<h1></h1>  
        $gestions=Gestion::where('empresa_id','=',session('empresa_id'))->get();
        return view('gestions.index',compact('gestions'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('gestions.create');
    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $gestion= request()->except('_token');
       if($request->fecha_ini==null)
       {$request->validate([
        'fecha'=>'required',
        'fecha2'=>'required'
        ]);
        return $request;
        Gestion::create([
        'descripcion'=> "$request->descripcion",
        'fecha_ini'=>$request->fecha,
        'fecha_fin'=>$request->fecha2,
        'empresa_id'=>session('empresa_id')
        ]);
    }
    else{

        $request->validate([
            'fecha_ini'=>'required',
            'fecha_fin'=>'required'
            ]);
        Gestion::create([
            'descripcion'=> "$request->descripcion",
            'fecha_ini'=>$request->fecha_ini,
            'fecha_fin'=>$request->fecha_fin,
            ]);

    }
        return redirect()->route('gestions.index');


        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gestion  $gestion
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gestion  $gestion
     * @return \Illuminate\Http\Response
     */
    public function show(Gestion $gestion)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gestion  $gestion
     * @return \Illuminate\Http\Response
     */



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gestion  $gestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Gestion $gestion)
    {
        return view('gestions.edit', compact('gestion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gestion  $gestion
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gestion  $gestion
     * @return \Illuminate\Http\Response
     */
  
    public function update(Request $request, Gestion $gestion)
    { 
      
         $ges=Gestion::findOrfail($gestion->id);
         
        if($request->fecha_ini==null)
       {  
       $ges['descripcion']="$request->descripcion";
       $ges['fecha_ini']="$request->fecha";
       $ges['fecha_fin']="$request->fecha2";
       $ges->update();  
    }
    else{
        $request->validate([
            'fecha_ini'=>'required',
            'fecha_fin'=>'required'
            ]);
       $ges['descripcion']="$request->descripcion";
       $ges['fecha_ini']="$request->fecha_ini";
       $ges['fecha_fin']="$request->fecha_fin";
       $ges->update();  
       
    

    }
    $gestion=$ges;
        //  $datosgestion= request()->except(['_token','_method']);
     //   Gestion::where('id','=',$gestion->id)->update($datosgestion);
      //  $gestion=Gestion::findOrFail($gestion->id);
     //   return view('gestions.edit', compact('gestion'));
     return view('gestions.edit', compact('gestion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gestion  $gestion
     * @return \Illuminate\Http\Response
     */
   
    /**example
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gestion  $gestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gestion $gestion)
    {
        Gestion::destroy($gestion->id);
        return redirect()->route('gestions.index')->with('mensaje','Empleado borrado');
 
    }












}
