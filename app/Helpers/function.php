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
use App\Models\asiento_LCV;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

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
    function moned($id){
        return CuentaPlan::findOrFail($id);
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


    function listadoFlujoEfectivo(){
        $sql = "select *
        FROM flujo_efectivo";
        $comments = DB::select($sql);
        return $comments;
    }

    function listadoMonedax(){
        $sql = "select *
        FROM monedas";
        $comments = DB::select($sql);
        return $comments;
    }

    function listadoRubrox(){
        $sql = "select *
        FROM rubro_ajuste";
        $comments = DB::select($sql);
        return $comments;
    }













    function listadoEfectivo(){
        $sql = "SELECT c.idCuentaPlan as id,c.descripcion as nombre ,f.id_flujo_efectivo,
        f.nombre as descripcion
        FROM cuenta_plan c
        LEFT JOIN flujo_efectivo f
        ON f.id_flujo_efectivo = c.id_flujo_efectivo
        ORDER by c.idCuentaPlan ASC";
        $comments = DB::select($sql);
        return $comments;
    }
    function listadoMoneda(){
        $sql = "SELECT c.idCuentaPlan id , c.descripcion as name , m.descripcion description, m.idMoneda as id_moneda
        FROM cuenta_plan c 
        LEFT JOIN monedas m
ON m.idMoneda = c.idMoneda
ORDER BY idCuentaPlan ASC";
        $comments = DB::select($sql);
        return $comments;
    }
    function listadoRubro(){
        $sql = "SELECT c.idCuentaPlan id , c.descripcion as name , r.nombre description,r.id_rubro_ajuste
        FROM cuenta_plan c
LEFT JOIN rubro_ajuste r   
     ON r.id_rubro_ajuste = c.id_rubro_ajuste
     ORDER BY c.idCuentaPlan ASC";
        $comments = DB::select($sql);
        return $comments;
    }
    function listadoAll(){
        $sql = "SELECT  c.idCuentaPlan,c.descripcion, f.nombre as fluName,  r.nombre as rubName , m.descripcion as monName
        FROM cuenta_plan c 
        LEFT JOIN flujo_efectivo f
        ON f.id_flujo_efectivo = c.id_flujo_efectivo
        LEFT JOIN rubro_ajuste r
        ON r.id_rubro_ajuste = c.id_rubro_ajuste
        LEFT JOIN monedas m 
        ON m.idMoneda = c.idMoneda
        ORDER BY idCuentaPlan ASC";
        $comments = DB::select($sql);
        return $comments;
    }


    


    function tipoCuentas($idTipoCuenta){
        return CuentaPlan::where('idCuentaPlanTipo','=',$idTipoCuenta)->get();
    }
    function detallecomprobante($id){
        $asiento= ComprobanteCuentaDetalle::where('idComprobante','=',$id)->get();
        $total_debes=0;
        $total_habers=0;
       
        foreach ($asiento as $key => $value) {
            $total_debes=$total_debes + $value->debe;
            $total_habers=$total_habers + $value->haber;
           
 
        }
         return ['asiento'=>$asiento,'total_debes'=>$total_debes,'total_habers'=>$total_habers];
    }
    
    function detallecomprobantelibro($id){
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
       //agreado por lucas
        $n=asiento_LCV::all();
        $n=$n->where('id',1)->first();
        $n=$n->credito_Fiscal;
      //asta aqui

        if($totalfactura!=0){
            $valor=(float)$totalfactura*($n/100);
            return redondear_dos_decimal($valor);
        }
        
    }
    
    function montoSus($tc,$valor){
   
        if($tc!=0){
            
        $valor=(float)$valor/(float)$tc;
        return redondear_dos_decimal($valor);
        }
      
    }
    
    function redondear_dos_decimal($valor) {
        $float_redondeado=round($valor * 100) / 100;
        return $float_redondeado;
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
        $detalle= ComprobanteCuentaDetalle::where('idComprobante','=',$idComprobante)->get();
        $total_debe=0;
        $total_haber=0;
       
        foreach ($detalle as $key => $value) {
            $total_debe=$total_debe + $value->debe;
            $total_haber=$total_haber + $value->haber;
            
 
        }
         return ['detalle'=>$detalle,'total_debe'=>$total_debe,'total_haber'=>$total_haber];
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
    
    function año(){
        $Year = strftime("%Y"); 
        return $Year;
     }
     function mes(){
         $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIENMBRE","DICIEMBRE");
          
         echo $meses[date('n')-1];
     }
    
     function basico($numero) {
        $valor = array ('UNO','DOS','TRES','CUATRO','CINCO','SEIS','SIETE','OCHO',
        'NUEVE','DIEZ','ONCE','DOCE','TRECE','CATORCE','QUINCE','DIECISEIS','DIECISIETE','DIECIOCHO','DIECINUEVE','VEINTE','VEINTIUNO ','VEINTIDOS ','VEINTITRES ', 'VEINTICUATRO','VEINTICINCO',
        'VEINTISEIS','VEINTISIETE','VEINTIOCHO','VEINTINUEVE');
        return $valor[$numero - 1];
        }
        
        function decenas($n) {
        $decenas = array (30=>'TREINTA',40=>'CUARENTA',50=>'CINCUENTA',60=>'SESENTA',
        70=>'SETENTA',80=>'OCHENTA',90=>'NOVENTA');
        if( $n <= 29) return basico($n);
        $x = $n % 10;
        if ( $x == 0 ) {
        return $decenas[$n];
        } else 
        return $decenas[$n - $x].' y '. basico($x);
        }
        
        function centenas($n) {
        $cientos = array (100 =>'CIEN',200 =>'DOSCIENTOS',300=>'TRESCIENTOS',
        400=>'CUATROCIENTOS', 500=>'QUINIENTOS',600=>'SEISCIENTOS',
        700=>'SETECIENTOS',800=>'OCHOCIENTOS', 900 =>'NOVECIENTOS');
        if( $n >= 100) {
        if ( $n % 100 == 0 ) {
        return $cientos[$n];
        } else {
        $u = (int) substr($n,0,1);
        $d = (int) substr($n,1,2);
        return (($u == 1)?'CIENTO':$cientos[$u*100]).' '.decenas($d);
        }
        } else 
        return decenas($n);
        }
        
        function miles($n) {
        if($n > 999) {
        if( $n == 1000) {
        return 'MIL';}
        else {
        $l = strlen($n);
        $c = (int)substr($n,0,$l-3);
        $x = (int)substr($n,-3);
        if($c == 1) {$cadena = 'MIL '.centenas($x);}
        else if($x != 0) {$cadena = centenas($c).' MIL '.centenas($x);}
        else $cadena = centenas($c). ' MIL';
        return $cadena;
        }
        } else return centenas($n);
        }
        
        function millones($n) {
        if($n == 1000000) {return 'UN MILLON';}
        else {
        $l = strlen($n);
        $c = (int)substr($n,0,$l-6);
        $x = (int)substr($n,-6);
        if($c == 1) {
        $cadena = ' MILLON ';
        } else {
        $cadena = ' MILLONES ';
        }
        return miles($c).$cadena.(($x > 0)?miles($x):'');
        }
        }
        function convertir($n) {
        switch (true) {
        case ( $n >= 1 && $n <= 29) : return basico($n); break;
        case ( $n >= 30 && $n < 100) : return decenas($n); break;
        case ( $n >= 100 && $n < 1000) : return centenas($n); break;
        case ($n >= 1000 && $n <= 999999): return miles($n); break;
        case ($n >= 1000000): return millones($n);
        }
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



    function empresa__actual($empresa_id)
{
    return Empresa::findOrFail($empresa_id);
    }

    function empresas_user($user_id)
    {
        return Empresa::where('idUser','=',$user_id)->get();
        }