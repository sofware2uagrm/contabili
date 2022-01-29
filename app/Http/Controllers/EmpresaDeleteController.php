<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EmpresaDeleteController extends Controller
{ public function index()
    {
      

    }
    

    public function create()
    {
      
    
    }

    public function store(Request $request)
    { 
        $datos = $request->all();
        $id = $datos["id_empresa"];
        $sql = "DELETE FROM empresas WHERE idEmpresa = $id";
        $comments = DB::select($sql);
        $empresas=Empresa::where('idUser','=', Auth::user()->id)->get();
        return view('empresas.index',compact('empresas'));

         
    }
   


    public function show(Empresa $empresa)
    {  
       }


    public function edit(Empresa $empresa)
    {  
       
    }

    public function update(Request $request, Empresa $empresa)
     {  
       
    }
 

    public function destroy(Empresa $empresa)
    {
        
 
    }



 
 


}
