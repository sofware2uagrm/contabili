<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{ public function index()
    {
        $empresas=Empresa::where('idUser','=', Auth::user()->id)->get();
        return view('empresas.index',compact('empresas'));

    }
    

    public function create()
    {
        return view('empresas.create');
    
    }

    public function store(Request $request)
    { 
             $empresa= request()->except('_token');
        $request->validate([
            'razonsocial'=>'required',
           // 'licencia'=>'required',
            'nit'=>'required',
            'telefono'=>'required',
            'ciudad'=>'required',
            ]);   
            if($request->hasFile('logo')){
                $empresa['logo']=$request->file('logo')->store('uploads','public');
        }
        else{
            $empresa['logo']=null;
        }
        $empresa['idUser']=  Auth::user()->id;
            Empresa::insert($empresa);
//       return response()->json($datosEmpleado);
        return redirect()->route('empresas.index')->with('mensaje','Empleado agregado con éxito');  
   }
   


    public function show(Empresa $empresa)
    {   session([
            'empresa_id'=> "$empresa->idEmpresa",
            'nombre'=>"$empresa->razonsocial"
        ]);
    return  redirect()->route('empresas.index');
    }


    public function edit(Empresa $empresa)
    {  
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
     {  
        $datosEmpresa= request()->except(['_token','_method']);
        if($request->hasFile('logo')){
            Storage::delete('public/'.$empresa->logo);
            $datosEmpresa['logo']=$request->file('logo')->store('uploads','public');
        }
        else{
            $empresa['logo']=null;
        }

        Empresa::where('idEmpresa','=',$empresa->idEmpresa)->update($datosEmpresa);
        $empresa=Empresa::findOrFail($empresa->idEmpresa);
        return view('empresas.edit', compact('empresa'));
    }
 

    public function destroy(Empresa $empresa)
    {
        dd($empresa);
        $empresa= request()->except('_token');

       // $empresas=Empresa::findOrFail($empresa->idEmpresa);
      //  if(Storage::delete('public/'.$empresas->logo)){
        //}
      //  Empresa::destroy($empresa->idEmpresa);
       
    //    return redirect()->route('empresas.index')->with('mensaje','Empleado borrado');
 
    }



 
 


}
