<?php

use App\Models\CentroCosto;
use App\Models\ComprobanteCuentaDetalle;
use App\Models\ComprobanteTipo;
use App\Models\Comprobante;
use App\Models\CuentaPlan;
use App\Models\CuentaPlanTipo;
use App\Models\Empresa;
use App\Models\Especifica;
use App\Models\Moneda;
use App\Models\Factura;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;

function cuantas_plan_padre(){
        $cuenta_plan = CuentaPlan::whereNull('idPlanCuentaPadre')->get();
        return $cuenta_plan;
    }

    function cuentas_plan_tipo(){
        return CuentaPlanTipo::all();
    }

    function cuenta_plan($idCuentaPlan){
        return CuentaPlan::findOrFail($idCuentaPlan);
    }
   
    
    function comprobante($idComprobante){
        return Comprobante::findOrFail($idComprobante);
    }
    function empresaid($idEmpresa){
        return Empresa::findOrFail($idEmpresa);
    }

    function cuenta_plan_tipo($idCuentaPlanTipo){
        return CuentaPlanTipo::findOrFail($idCuentaPlanTipo);
    }

    function sub_cuentas($idCuentaPlan){
        return CuentaPlan::where('idPlanCuentaPadre','=',$idCuentaPlan)->get();
    }

    function sub_cuentas_disponibles($idCuentaPlan){
        return CuentaPlan::whereNull('idPlanCuentaPadre')
        ->where('idCuentaPlan','!=',$idCuentaPlan)->get();
    }

    function tipo_cuentas(){
        $response = CuentaPlanTipo::all();
        return $response;
    }


    
    function tipo_cuentas_hijas($idCuentaPlanTipo){
        
        return CuentaPlan::where('idCuentaPlanTipo','=',$idCuentaPlanTipo)
        ->whereNull('idPlanCuentaPadre')
        ->get();
    }

    function tipo_cuentas_nietas($idCuentaPlan){
        
        return CuentaPlan::where('idPlanCuentaPadre','=',$idCuentaPlan)
        // ->whereNotNull('idPlanCuentaPadre')
        ->get();
    }




    // ALL TABLAS
    function empresas(){
        $response= Empresa::all();
        return $response;
    }

    function monedas(){
        $response = Moneda::all();
        return $response;
    }
    function comprobantes(){
        $response= Comprobante::all();
        return $response;
    }
    function users(){
        $response= User::all();
        return $response;
    }
   

    function comprobanteTipos(){
        $response = ComprobanteTipo::all();
        return $response;
    }
    


    function CuentaPlanes(){
        $response = CuentaPlan::all();
        return $response;
    }

    function Facturas(){
        $response=Factura::all();
        return $response;
    }
    function detallecomprobantes(){
        $response = ComprobanteCuentaDetalle::all();
        return $response;
    }
    
    // ALL


    // TABLA FIND 

   

    function moneda($id){
        $response = Moneda::findOrFail($id);
        return $response;
    }
    function empresa($id){
        $response = Empresa::findOrFail($id);
        return $response;
    }
    function factura($id){
        $response= Factura::findOrFail($id);
        return $response;
    }
    function especifica($id){
        $response= Especifica::findOrFail($id);
        return $response;
    }
    function comprobanteid($id){
        $response= Comprobante::findOrFail($id);
        return $response;
    }
    

    function comprobanteTipo($id){
        $response = ComprobanteTipo::findOrFail($id);
        return $response;
    }
    


    function CuentaPlane($id){
        $response = CuentaPlan::findOrFail($id);
        return $response;
    }

    


    function tipoCuentas($idTipoCuenta){
        return CuentaPlan::where('idCuentaPlanTipo','=',$idTipoCuenta)->get();
    }
    function detallecomprobante($id){
        return ComprobanteCuentaDetalle::where('idComprobante','=',$id)->get();
    }
    
    
    function subcuentaasiento($id){
        return CuentaPlan::where('idCuentaPlan','=',$id)->get();
    
    }
    
    function IdComprobante($id){
        return Comprobante::where('idComprobanteTipo','=',$id)->get();
    }


    //////////////////////
    function nivel_1_cuentas(){
        return CuentaPlanTipo::get();
    }
    function nivel_2_cuentas($idCuentaPlanTipo){
        return CuentaPlan::whereNull('idPlanCuentaPadre')
        ->where('idCuentaPlanTipo','=',$idCuentaPlanTipo)
        ->get();
    }
    function nivel_3_cuentas($idCuentaPlanTipo,$idPlanCuentaPadre){
        return CuentaPlan::where('idPlanCuentaPadre','=',$idPlanCuentaPadre)
        ->where('idCuentaPlanTipo','=',$idCuentaPlanTipo)
        ->get();
    }
    function nivel_4_cuentas($idCuentaPlanTipo,$idPlanCuentaPadre){
        return CuentaPlan::where('idPlanCuentaPadre','=',$idPlanCuentaPadre)
        ->where('idCuentaPlanTipo','=',$idCuentaPlanTipo)
        ->get();
    }
    function nivel_5_cuentas($idCuentaPlanTipo,$idPlanCuentaPadre){
        return CuentaPlan::where('idPlanCuentaPadre','=',$idPlanCuentaPadre)
        ->where('idCuentaPlanTipo','=',$idCuentaPlanTipo)
        ->get();
    }
    function nrocomprobante($tipo,$fecha){
        $fechaEntera = strtotime($fecha);
        
        $month = date("m", $fechaEntera); //07
        
        $year = date("Y", $fechaEntera); //07
        
        //             0-1-2-3-4-5-6-7-8--9-10- 11-12
        $array_day = [31,28,31,30,31,30,31,31,30,31,30,31];
        // 1,2,3,4,5,6,7,8,9,10,11,12
    
        /*$fecha_inicio = new DateTime();      
        $fecha_final = new DateTime();
        $fecha_inicio->setDate($year,$month,1);
        return $fecha_inicio;
         $fecha_final->setDate($year,$month,$array_day[$month-1]);
      */ 
      if ($month > 0 && $month < 10) {
          $month = '0'.$month;
      }
      
      $fecha_inicio=$year.'-'.$month.'-01';
      $fecha_final=$year.'-'.$month.'-'.$array_day[$month-1];

        $comprobante = Comprobante::where('idComprobanteTipo','=',$tipo)
        ->where('fecha','>=',$fecha_inicio)
        ->where('fecha','<=',$fecha_final)->get();
    
        $nro = count($comprobante); 
    
        return $nro;
    }

function get_iva($totalfactura){
    $iva=(float)$totalfactura*(13/100);
    return number_format($iva,2);
}
    
function montoSus($tc,$valor){
    $monto=(float)$valor/(float)$tc;
    return number_format($monto,2);
}

    function get_cuentas_especificas_nivel_1(){
        return Especifica::where('codigo_nivel','=',Especifica::NIVEL_1)->get();
    }
    function get_cuentas_especificas_nivel_2(){
        return Especifica::where('codigo_nivel','=',Especifica::NIVEL_2)->get();
    }
    function get_cuentas_especificas_nivel_3(){
        return Especifica::where('codigo_nivel','=',Especifica::NIVEL_3)->get();
    }

    function cuenta_especifica($id){
        return Especifica::findOrFail($id);
    }

    function cuenta_especifica_title($nivel){
        return Especifica::where('codigo_nivel','=',$nivel)->first();
    } 
    function obtener_credito_iva(){
        return Especifica::where('tipo_cuenta','=','Crédito Fiscal IVA')->first();
    }
    function obtenerglosaindividual($nrofactura,$Proveedor){
        $glosa= "Factura Nro : ".$nrofactura." Proveedor : ".$Proveedor;
        return $glosa;
    }
    function selecionadaempresa($id){
        return Empresa::where('idEmpresa','=',$id)->get();
    }


    

    function get_detalle($idComprobante){
        return ComprobanteCuentaDetalle::where('idComprobante','=',$idComprobante)->get();
    }


    function existe_factura($idComprobanteCuentaDetalle){
        $sw = false;
        $facturas = Factura::where('idComprobanteCuentaDetalle','=',$idComprobanteCuentaDetalle)->get();
        if(count($facturas)>0){
            $sw = true;
        }
        return $sw;
    }


    function detalle_factura($idComprobanteCuentaDetalle){
        return Factura::where('idComprobanteCuentaDetalle','=',$idComprobanteCuentaDetalle)->get();
    }
    

    
    function centroCosto($id){
        $response = CentroCosto::findOrFail($id);
        return $response;
    }


    // function tipoCuentas($idTipoCuenta){
    //     return CuentaPlan::where('idCuentaPlanTipo','=',$idTipoCuenta)->get();
    // }
    // function detallecomprobante($id){
    //     return ComprobanteCuentaDetalle::where('idComprobante','=',$id)->get();
    // }
    // function subcuentaasiento($id){
    //     return CuentaPlan::where('idCuentaPlan','=',$id)->get();
    // }

    function sumasDetallecomprobante($id){
        $comprobante = ComprobanteCuentaDetalle::where('idComprobante','=',$id)->get();
        $haber = 0;
        $debe = 0;

        foreach ($comprobante as $key => $data) {
            $haber = $data->haber + $haber;  
            $debe = $data->debe + $debe;  
        }

        return [
            'debe' => $debe,
            'haber' => $haber
        ];
    }

    function libro_mayor_detalle($desde,$hasta,$idCuentaPlan){
        $debe = 0;
        $haber = 0;
        
        $comprobante = Comprobante::
            join('comprobante_cuenta_detalle','comprobante_cuenta_detalle.idComprobante','=','comprobante.idComprobante')
            ->join('cuenta_plan','cuenta_plan.idCuentaPlan','=','comprobante_cuenta_detalle.idCuentaPlan')
            ->where('comprobante.fecha','>=',$desde)
            ->where('comprobante.fecha','<=',$hasta)
            ->where('comprobante_cuenta_detalle.idCuentaPlan','=',$idCuentaPlan)
            ->paginate();


        foreach ($comprobante as $key => $value) {
            $debe = $debe + $value->debe;
            $haber = $haber + $value->haber;
        }
        return [
            'comprobantes' => $comprobante,
            'haber' => $haber,
            'debe' => $debe,
        ];
    }

    function libro_mayor_detalle_pdf($desde,$hasta,$idCuentaPlan){
       
        $comprobante = Comprobante::
            join('comprobante_cuenta_detalle','comprobante_cuenta_detalle.idComprobante','=','comprobante.idComprobante')
            ->join('cuenta_plan','cuenta_plan.idCuentaPlan','=','comprobante_cuenta_detalle.idCuentaPlan')
            ->where('comprobante.fecha','>=',$desde)
            ->where('comprobante.fecha','<=',$hasta)
            ->where('comprobante_cuenta_detalle.idCuentaPlan','=',$idCuentaPlan)->get();


       return $comprobante;
    }