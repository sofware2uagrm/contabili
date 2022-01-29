<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    

    protected $moneda;
    public function __construct()
    {
        $this->middleware('auth');
        $this->moneda= new Moneda();
    }
    public function index()
    {   
        $moneda=$this->moneda->get();
        $idaux=$this->moneda->where('estado',1)->first();
        $idaux=$idaux->idMoneda;
        $datos=['datos'=>$moneda , 'idaux'=>$idaux];
        echo view('configuracion_parametros_sistema/moneda/moneda',$datos);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(moneda $moneda)
    {
        //
    }

   
    public function edit(moneda $moneda)
    {
        //
    }

   
    public function update(Request $request, Moneda $moneda)
    {  
        if($moneda->idMoneda != $request->id_aux){
        $monena_idaux=$moneda->idMoneda;
        $moneda->estado=1;
        $moneda->update();

        $moneda=$this->moneda->where('idMoneda',$request->id_aux)->first();
        $moneda->estado=0;
        $moneda->update();

        if($monena_idaux != $request->id_aux){
        return redirect()->to(asset('moneda'));
        }
        }
    }

  
    public function destroy(moneda $moneda)
    {
        //
    }
}
