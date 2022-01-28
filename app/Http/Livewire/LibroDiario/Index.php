<?php

namespace App\Http\Livewire\LibroDiario;

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


    protected $paginationTheme = 'bootstrap';
    public function render(){

        $comprobante = [];
        
        if(is_null($this->desde) || is_null($this->hasta) || is_null($this->idTipoComprobante)){
            $comprobante = Comprobante::paginate(1);
        }else{
            $comprobante = Comprobante::
            where('fecha','>=',$this->desde)
            ->where('fecha','<=',$this->hasta)
            ->where('idComprobanteTipo','=',$this->idTipoComprobante)
            ->paginate(1);
        }
        
        return view('livewire.libro-diario.index',[
            'comprobantes' => $comprobante  
        ]);
    }

    public function show_table(){

        $this->table = true;

    }

    public function close_table(){
         $this->table = false;
         $this->desde = null;
         $this->hasta = null;
    }
}
