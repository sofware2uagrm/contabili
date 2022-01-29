<?php

namespace App\Http\Livewire\Plan;

use App\Models\CuentaPlan;
use App\Models\CuentaPlanTipo;
use App\Models\Especifica;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $descripcion_nivel1;
    public $descripcion_nivel2;
    public $descripcion_nivel3;
    public $descripcion_nivel4;
    public $descripcion_nivel5;


    public $estado1 = 0;
    public $estado2 = 0;
    public $estado3 = 0;
    public $estado4 = 0;
    public $estado5 = 0;

    public $idCuentaTipo1 ;
    public $idCuentaTipo2 ;
    public $idCuentaTipo3 ;
    public $idCuentaTipo4 ;
    public $idCuentaTipo5 ;

    public $codigo1 ;
    public $codigo2 ;
    public $codigo3 ;
    public $codigo4 ;
    public $codigo5 ;


    public $idCuentaPlan;
    public $idCuentaPadre;

    public $isEdit = false;

    public $interfaz_cuenta_especifica;
    public $table_plan_cuenta=false;

    public $cuenta_especifica_id=null;

    public function render()
    {
        return view('livewire.plan.index',[
           'cuentas' =>  CuentaPlanTipo::paginate(5)
        ]);
    }

    public function mount($user){
    }

    public function show_cuenta_nivel1(){
        $this->interfaz_cuenta_especifica = 1;
    }
    public function show_cuenta_nivel2(){
        $this->interfaz_cuenta_especifica = 2;
    }
    public function show_cuenta_nivel3(){
        $this->interfaz_cuenta_especifica = 3;
    }

    public function mostrar_plan_cuenta($cuenta_especifica_id){
        //CUENTA ESPECIFICA HA MODIFICAR
        $this->table_plan_cuenta = true;
        $this->cuenta_especifica_id = $cuenta_especifica_id;


    }

    public function seleccionar_cuenta_especifica($idCuentaPlan,$key1,$key2,$key3,$key4,$key5){
        $cuenta_especifica = Especifica::findOrFail($this->cuenta_especifica_id);
        $cuenta_especifica->idCuentaPlan = $idCuentaPlan;
        $cuenta_especifica->codigo_cuenta = $key1."0".$key2."0".$key3."0".$key4."0".$key5;
        $cuenta_especifica->update();

        $this->table_plan_cuenta = false;
        $this->cuenta_especifica_id = null;
    }

    public function interfaz($condicion){
        $this->interfaz_cuenta_especifica = $condicion;
    }

    public function nivel_1_cuenta(){
        $tipoCuenta = new CuentaPlanTipo();
        $tipoCuenta->descripcion = $this->descripcion_nivel1;
        $tipoCuenta->estado = $this->estado1;
        $tipoCuenta->nivel = CuentaPlan::NIVEL_1;
        $tipoCuenta->save();

        $this->reset_nivel_1();


    }
    public function nivel_2_cuenta($idCuentaPlanTipo){
        $tipoCuenta = new CuentaPlan();
        $tipoCuenta->codigo = $this->codigo2;
        $tipoCuenta->descripcion = $this->descripcion_nivel2;
        $tipoCuenta->estado = $this->estado2;
        $tipoCuenta->nivel = CuentaPlan::NIVEL_2;
        $tipoCuenta->idPlanCuentaPadre = null;
        $tipoCuenta->idCuentaPlanTipo = $idCuentaPlanTipo;
        $tipoCuenta->save();

        $this->reset_nivel_2();

    }

    public function nivel_3_cuenta($idCuentaPlanTipo,$idCuentaPlan){
        $tipoCuenta = new CuentaPlan();
        $tipoCuenta->codigo = $this->codigo3;
        $tipoCuenta->descripcion = $this->descripcion_nivel3;
        $tipoCuenta->estado = $this->estado3;
        $tipoCuenta->idPlanCuentaPadre = $idCuentaPlan;
        $tipoCuenta->nivel = CuentaPlan::NIVEL_3;
        $tipoCuenta->idCuentaPlanTipo = $idCuentaPlanTipo;
        $tipoCuenta->save();

        $this->reset_nivel_3();
    }

    public function nivel_4_cuenta($idCuentaPlanTipo,$idCuentaPlan){
        $tipoCuenta = new CuentaPlan();
        $tipoCuenta->codigo = $this->codigo4;
        $tipoCuenta->descripcion = $this->descripcion_nivel4;
        $tipoCuenta->estado = $this->estado4;
        $tipoCuenta->nivel = CuentaPlan::NIVEL_4;
        $tipoCuenta->idPlanCuentaPadre = $idCuentaPlan;
        $tipoCuenta->idCuentaPlanTipo = $idCuentaPlanTipo;
        $tipoCuenta->save();

        $this->reset_nivel_4();
    }

    public function nivel_5_cuenta($idCuentaPlanTipo,$idCuentaPlan){
        $tipoCuenta = new CuentaPlan();
        $tipoCuenta->codigo = $this->codigo5;
        $tipoCuenta->descripcion = $this->descripcion_nivel5;
        $tipoCuenta->estado = $this->estado5;
        $tipoCuenta->nivel = CuentaPlan::NIVEL_5;
        $tipoCuenta->idPlanCuentaPadre = $idCuentaPlan;
        $tipoCuenta->idCuentaPlanTipo = $idCuentaPlanTipo;
        $tipoCuenta->save();

        $this->reset_nivel_5();
    }

    // nivel_3_cuenta


    public function reset_nivel_1(){
        $this->descripcion_nivel1 = null;
        $this->estado1 = 0;
    }

    public function reset_nivel_2(){
        $this->descripcion_nivel2 = null;
        $this->codigo2 = null;
        $this->estado2 = 0;
    }
    public function reset_nivel_3(){
        $this->descripcion_nivel3 = null;
        $this->codigo3 = null;
        $this->estado3 = 0;
    }

    public function reset_nivel_4(){
        $this->descripcion_nivel4 = null;
        $this->codigo4 = null;
        $this->estado4 = 0;
    }

    public function reset_nivel_5(){
        $this->descripcion_nivel5 = null;
        $this->codigo5 = null;
        $this->estado5 = 0;
    }


    public function delete_cuenta1($idCuentaPlanTipo){
        DB::table('cuenta_plan')->where('idCuentaPlanTipo','=',$idCuentaPlanTipo);
        $tipo = CuentaPlanTipo::findOrFail($idCuentaPlanTipo);
        $tipo->delete();
    }

    public function delete_cuenta2($idCuentaPlan){
        DB::table('cuenta_plan')->where('idPlanCuentaPadre','=',$idCuentaPlan)->delete();
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $cuenta->delete();
    }

    public function delete_cuenta3($idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $cuenta->delete();
    }

    public function loading_cuenta1($idCuentaPlanTipo){
        $cuenta = CuentaPlanTipo::findOrFail($idCuentaPlanTipo);
        $this->descripcion_nivel1 = $cuenta->descripcion ;
        $this->estado1 = $cuenta->estado ;
        $this->isEdit = true;
    }

    public function loading_cuenta2($idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $this->descripcion_nivel2 = $cuenta->descripcion ;
        $this->estado2 = $cuenta->estado ;
        $this->codigo2 = $cuenta->codigo ;
        $this->isEdit = true;
    }

    public function loading_cuenta3($idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $this->descripcion_nivel3 = $cuenta->descripcion ;
        $this->estado3 = $cuenta->estado ;
        $this->codigo3 = $cuenta->codigo ;
        $this->isEdit = true;
    }

    public function loading_cuenta4($idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $this->descripcion_nivel4 = $cuenta->descripcion ;
        $this->estado4 = $cuenta->estado ;
        $this->codigo4 = $cuenta->codigo ;
        $this->isEdit = true;
    }

    public function loading_cuenta5($idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $this->descripcion_nivel5 = $cuenta->descripcion ;
        $this->estado5 = $cuenta->estado ;
        $this->codigo5 = $cuenta->codigo ;
        $this->isEdit = true;
    }


    public function update_nuvel1($idCuentaPlanTipo){
        dd($idCuentaPlanTipo);
        $cuenta = CuentaPlanTipo::findOrFail($idCuentaPlanTipo);
        $cuenta->descripcion = $this->descripcion_nivel1;
        $cuenta->update();
    }

    public function update_nuvel2($codigo,$idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $cuenta->descripcion = $this->descripcion_nivel2;
        $cuenta->codigo = $codigo;
        $cuenta->update();
    }
    public function update_nuvel3($codigo,$idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $cuenta->descripcion = $this->descripcion_nivel3;
        $cuenta->codigo = $codigo;
        $cuenta->update();
    }

    public function update_nuvel4($codigo,$idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $cuenta->descripcion = $this->descripcion_nivel4;
        $cuenta->codigo = $codigo;
        $cuenta->update();
    }

    public function update_nuvel5($codigo,$idCuentaPlan){
        $cuenta = CuentaPlan::findOrFail($idCuentaPlan);
        $cuenta->descripcion = $this->descripcion_nivel5;
        $cuenta->codigo = $codigo;
        $cuenta->update();
    }

}
