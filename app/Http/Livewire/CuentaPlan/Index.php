<?php

namespace App\Http\Livewire\CuentaPlan;

use App\Models\CuentaPlan;
use Livewire\Component;

class Index extends Component
{
    public $paginate = "5";
    public $idCuentaPlan;

    public $flash="";
    public $title = "";

    public $descripcion;
    public $codigo;
    public $estado;
    public $idPlanCuentaPadre;
    public $idCuentaPlanTipo;

    public $optionCuentaPadre = false;
    public $option_add_sub_cuenta = false;

    public $searchText;

    public $form = false;
    public $isEdit = false;
    public $isSelect = false;
    public $isDetail = false;


    public $cuentas;

    public $descripcionCuentaPlanTipo;

    public function render()
    {
        $searchText = "%".$this->searchText."%"; 

        $plan = [];
        
        if($this->idCuentaPlanTipo){
            $plan = CuentaPlan::where('descripcion','like',"%".$searchText."%")
            ->where('idCuentaPlanTipo','=',$this->idCuentaPlanTipo)
            ->whereNull('idPlanCuentaPadre')->paginate($this->paginate);
        }

        return view('livewire.cuenta-plan.index',[
            'plan' => $plan
        ]);
    }

    public function interface($form,$isEdit,$isDetail,$isSelect){
        $this->form=$form;
        $this->isEdit=$isEdit;
        $this->isDetail=$isDetail;
        $this->isSelect=$isSelect;
    }

    public function update_estado($idCuentaPlan){
        $cuentaPlanTipo = CuentaPlan::findOrFail($idCuentaPlan);
        $cuentaPlanTipo->estado = !$cuentaPlanTipo->estado;
        $cuentaPlanTipo->update();
        $this->flash= $cuentaPlanTipo->estado ? "Estado desactivado" : "Estado activado";
    }

    public function update_tipo_cuenta(){
        $idCuentaPlan = $this->idCuentaPlan;
        $cuentaPlanTipo = CuentaPlan::findOrFail($idCuentaPlan);
        $cuentaPlanTipo->codigo = $this->codigo;
        $cuentaPlanTipo->descripcion = $this->descripcion;
        $cuentaPlanTipo->idCuentaPlanTipo = $this->idCuentaPlanTipo;
        // $cuentaPlanTipo->idPlanCuentaPadre = null;
        $cuentaPlanTipo->update();

        $this->flash=  " Modificado exitosamente";
    }

    public function save_tipo_cuenta(){
        $cuentaPlanTipo = new CuentaPlan();
        $cuentaPlanTipo->codigo = $this->codigo;
        $cuentaPlanTipo->descripcion = $this->descripcion;
        $cuentaPlanTipo->idCuentaPlanTipo = $this->idCuentaPlanTipo;
        $cuentaPlanTipo->idPlanCuentaPadre = null;
        $cuentaPlanTipo->estado = CuentaPlan::ESTADO_ACTIVO;
        $cuentaPlanTipo->save();

        $this->flash="Guardado exitosamente";
    }

    public function delete_tipo_cuenta($idCuentaPlan){
        $cuentaPlanTipo = CuentaPlan::findOrFail($idCuentaPlan);
        $cuentaPlanTipo->delete();
        $this->flash="Eliminado exitosamente";
    }

    public function show_update($idCuentaPlan){
        $cuentaPlanTipo = CuentaPlan::findOrFail($idCuentaPlan);
        $this->descripcion = $cuentaPlanTipo->descripcion;
        $this->codigo = $cuentaPlanTipo->codigo;
        $this->idCuentaPlanTipo = $cuentaPlanTipo->idCuentaPlanTipo;
        // $cuentaPlanTipo->idPlanCuentaPadre = null;

        $this->idCuentaPlan = $idCuentaPlan;
        
        $this->interface(true,true,false,false);

        $this->title = "Modificar Tipo de Cuenta $idCuentaPlan";
    }

    public function show_create(){
        // $this->form=true;
        // $this->isEdit = false;
        $this->interface(true,false,false,false);
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



    public function create_sub_cuenta($idCuentaPlan){
        $cuentaPlan = cuenta_plan($idCuentaPlan);
        $cuentaPlanTipo = new CuentaPlan();
        $cuentaPlanTipo->codigo = $this->codigo;
        $cuentaPlanTipo->descripcion = $this->descripcion;
        $cuentaPlanTipo->idCuentaPlanTipo = $cuentaPlan->idCuentaPlanTipo;
        $cuentaPlanTipo->idPlanCuentaPadre = $idCuentaPlan;
        $cuentaPlanTipo->estado = CuentaPlan::ESTADO_ACTIVO;
        $cuentaPlanTipo->save();

        $this->descripcion = null;
        $this->codigo = null;


    }

    public function closed_form(){
        $this->form=false;
        $this->isEdit = false;
        $this->resetear();
    }

    public function resetear(){
        $this->descripcion = null;
        $this->codigo = null;
        $this->idCuentaPlanTipo = null;
        $this->idPlanCuentaPadre = null;
        $this->idCuentaPlan = null;
    }

    //MANTENIMIENTO
    //Controla el boton drow  
    public function showPlanCuenta($idCuentaPlanTipo){
        $this->idCuentaPlanTipo = $idCuentaPlanTipo;
        $this->descripcionCuentaPlanTipo = cuenta_plan_tipo($idCuentaPlanTipo)->descripcion;
    }

    //  
    public function show_detalle_cuenta_padre($idCuentaPlan){
        $this->idCuentaPlan = $idCuentaPlan;
        $this->interface(false,false,true,false);
    }


    public function closed_form_detail(){
        $this->interface(false,false,false,false);
        $this->idCuentaPlan = null;
    }


    public function show_add_sub_cuentas(){
        $this->option_add_sub_cuenta = !$this->option_add_sub_cuenta;
    }

    public function add_sub_cuenta($idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $cuenta->idPlanCuentaPadre = $this->idCuentaPlan;
        $cuenta->update();
        $this->option_add_sub_cuenta = false;
    }
}
