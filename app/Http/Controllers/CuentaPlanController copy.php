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
        $datos222['idFlujoEfectivo'] = $data['id_plan_flujo_new'];
        $datos222->save();
        return redirect('plan')->with('mensaje','Categoria Actualizada');
    }
}
