<?php

namespace App\Http\Livewire\TipoCuenta;

use App\Models\CuentaPlanTipo;
use Livewire\Component;

class Index extends Component
{
    public $paginate = "5";
    public $idCuentaPlanTipo;

    public $flash="";
    public $title = "";

    public $descripcion;
    public $searchText;


    public $form = false;
    public $isEdit = false;

    public function render()
    {
        $searchText = "%".$this->searchText."%"; 

        return view('livewire.tipo-cuenta.index',[
            'tipos' => CuentaPlanTipo::where('descripcion','like',"%".$searchText."%")
            ->paginate($this->paginate)
        ]);
    }

    public function update_estado($idCuentaPlanTipo){
        $cuentaPlanTipo = CuentaPlanTipo::findOrFail($idCuentaPlanTipo);
        $cuentaPlanTipo->estado = !$cuentaPlanTipo->estado;
        $cuentaPlanTipo->update();
        $this->flash= $cuentaPlanTipo->estado ? "Estado desactivado" : "Estado activado";
    }

    public function update_tipo_cuenta(){
        $idCuentaPlanTipo = $this->idCuentaPlanTipo;
        $cuentaPlanTipo = CuentaPlanTipo::findOrFail($idCuentaPlanTipo);
        $cuentaPlanTipo->descripcion = $this->descripcion;
        $cuentaPlanTipo->update();

        $this->flash=  " Modificado exitosamente";
    }

    public function save_tipo_cuenta(){
        $cuentaPlanTipo = new CuentaPlanTipo();
        $cuentaPlanTipo->descripcion = $this->descripcion;
        $cuentaPlanTipo->estado = CuentaPlanTipo::ESTADO_ACTIVO;
        $cuentaPlanTipo->save();

        $this->flash="Guardado exitosamente";
    }

    public function delete_tipo_cuenta($idCuentaPlanTipo){
        $cuentaPlanTipo = CuentaPlanTipo::findOrFail($idCuentaPlanTipo);
        $cuentaPlanTipo->delete();
        $this->flash="Eliminado exitosamente";
    }

    public function show_update($idCuentaPlanTipo){
        
        $cuentaPlanTipo = CuentaPlanTipo::findOrFail($idCuentaPlanTipo);
        $this->descripcion =  $cuentaPlanTipo->descripcion;
        $this->idCuentaPlanTipo = $idCuentaPlanTipo;
        
        $this->form=true;
        $this->isEdit = true;
        $this->title = "Modificar Tipo de Cuenta $idCuentaPlanTipo";
    }

    public function show_create(){
        
        $this->form=true;
        $this->isEdit = false;
        $this->title = "Crear Tipo de Cuenta";

        $this->resetear();
    }

    public function create_or_update(){
        if($this->isEdit){
            $this->update_tipo_cuenta();
        }else{
            $this->save_tipo_cuenta();
        }

        $this->closed_form();
    }

    public function closed_form(){
        $this->form=false;
        $this->isEdit = false;
        $this->resetear();
    }

    public function resetear(){
        $this->descripcion = null;
        $this->idCuentaPlanTipo = null;
    }




}
