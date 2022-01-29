<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaPlan;

class CuentaPlanController extends Controller
{
    public function mostrar(){
        return view('page.cuentaPlan');
    }

    public  function editar(Request $request)
    {
        $data = $request->all();
        $datos222= CuentaPlan::find($data['id_plan_new']);
        
       
        if($request["id_plan_flujo"] != null)
        {  
            $datos222['id_flujo_efectivo'] = $data['id_plan_flujo_new'];
        }
    
        
        if($request["id_moneda"] != null)
        {
            $datos222['idMoneda'] = $data['id_moneda_new'];
        }
        if($request["id_rubro"] != null)
        {
            $datos222['id_rubro_ajuste'] = $data['id_rubro_ajuste_new'];
        }


        
        $datos222->save();
        return redirect('plan')->with('mensaje','Categoria Actualizada');
    }
}
