<?php

namespace App\Http\Livewire\EmpresaAc;

use Livewire\Component;

class Index extends Component
{
   
    public $empresa_id;
    public $razonsocial;
    public function render()
    {
       
        return view('livewire.empresa-ac.index');
    }


    public function cam(){
      
     $empresa=$this->empresa_id;
        return redirect()->route('acempresas.show',$empresa);
    }
}
