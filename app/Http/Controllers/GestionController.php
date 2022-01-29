<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{    public function index()
    { if(session('empresa_id')){
        $gestions=Gestion::where('empresa_id','=',session('empresa_id'))->get();
        return view('gestions.index',compact('gestions'));        
    }
    else{
        return redirect()->route('empresas.index')->with('mensaje','Escoja una empresa para ver su getion');
    }
    }
    public function create()
    {
       return view('gestions.create');
    }

    public function store(Request $request)
    {
        $gestion= request()->except('_token');
       if($request->fecha_ini==null)
       {$request->validate([
        'fecha'=>'required',
        'fecha2'=>'required'
        ]);
      //  return session('empresa_id');
       $hola= Gestion::create([
        'descripcion'=> "$request->descripcion",
        'fecha_ini'=>$request->fecha,
        'fecha_fin'=>$request->fecha2,
        
        ]);
        $hola['empresa_id']=session('empresa_id');
        $hola->update();
    }
    else{

        $request->validate([
            'fecha_ini'=>'required',
            'fecha_fin'=>'required'
            ]);
           
       $hola= Gestion::create([
            'descripcion'=> "$request->descripcion",
            'fecha_ini'=>$request->fecha_ini,
            'fecha_fin'=>$request->fecha_fin,
            ]);
            $hola['empresa_id']=session('empresa_id');
            $hola->update();
    }
        return redirect()->route('gestions.index');

    }

    public function show(Gestion $gestion)
    {
        
    }
    public function edit(Gestion $gestion)
    {
        return view('gestions.edit', compact('gestion'));
    }

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
     return view('gestions.edit', compact('gestion'));
    }
    public function destroy(Gestion $gestion)
    {
        Gestion::destroy($gestion->id);
        return redirect()->route('gestions.index')->with('mensaje','Empleado borrado');
     }












}
