<?php

namespace App\Http\Livewire\LibroMayor;

use App\Models\Comprobante;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $table = false;
    public $desde = null;
    public $hasta = null ;
    public $idTipoComprobante = null ;
    public $cuentas = false;

    public $idCuentaPlan;
    public $message;

    public $example;
    


    protected $paginationTheme = 'bootstrap';
    public function render(){

        $comprobante = [];
        
        if(is_null($this->desde) || is_null($this->hasta) || is_null($this->idCuentaPlan)){
            $comprobante = Comprobante::
            join('comprobante_cuenta_detalle','comprobante_cuenta_detalle.idComprobante','=','comprobante.idComprobante')
            ->join('cuenta_plan','cuenta_plan.idCuentaPlan','=','comprobante_cuenta_detalle.idCuentaPlan')
            ->paginate(1);
        }else{
            $comprobante = libro_mayor_detalle($this->desde, $this->hasta, $this->idCuentaPlan)['comprobantes'];
        }
        
        return view('livewire.libro-mayor.index',[
            'comprobantes' => $comprobante  
        ]);
    }

    public function show_table(){
        if(!is_null($this->idCuentaPlan) && !is_null($this->desde) && !is_null($this->desde)){

            $this->table = true;

        }else{
            $this->message = "Complete los campos por favor";
        }
    }

    public function show_cuentas(){
        $this->cuentas = true;
    }

    public function close_table(){
         $this->table = false;
         $this->desde = null;
         $this->hasta = null;
    }
    public function seleccionar_cuenta_plan($key1, $key2, $key3, $key4, $key5, $idCuentaPlan)
    {

            $this->idCuentaPlan = $idCuentaPlan;
            $this->cuentas = false;
            $this->codigo = $key1 . "0" . $key2 . "0" . $key3 . "0" . $key4 . "0" . $key5;

    }
}
