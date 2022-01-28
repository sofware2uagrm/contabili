<?php

namespace App\Http\Livewire\Comprobante;

use App\Models\Comprobante;
use App\Models\ComprobanteCuentaDetalle;
use App\Models\Especifica;
use App\Models\Factura;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    public $user;
    public $form =  false;
    public $isDetail =  false;
    public $isEdit =  false;

    // COMPROBANTE
    public $idComprobante;
    public $codigo;
    public $referidoa;
    public $numeroDocumento;
    public $glosa;
    public $razonSocial;
    public $tc=6.96;
    public $canceladoa;
    public $fecha;
    public $estado;
    public $idBanco;
    public $idTipoTransaccion;
    public $idMoneda;
    public $idPeriodo;
    public $idComprobanteTipo;
    public $idTipoPago;
    public $idUser;
    public $idEmpresa;

    public $monto;

    public $idCuentaPlanTipo;
    public $idCuentaPlanHija;


    // DETALLLE
    public $idComprobanteCuentaDetalle;
    public $glosaDetalle;
    public $debe;
    public $haber;
    public $idCentroCosto;
    public $idCuentaPlan;

    public $array_asiento = [];


    public $total_debe = 0;
    public $total_haber = 0;
    public $montodebeSus = 0;
    public $montohaberSus = 0;
    public $valor2 = 0;
    public $debe_factura = 0;
    public $haber_facturas = 0;
    public $montodebeSus_factura = 0;
    public $montohaberSus_factura = 0;
    public $validate_total = true;

    public $example;
    public $searchText;
    //para el plan de cuentas factura
    public $idCuentaPlanSeleccionadaFactura;
    public $codigoSeleccionadoFactura;
    //para el plan de cuentas factura-comprobante 
    public $idCuentaPlanSeleccionadaComprobanteFactura;
    public $codigoSeleccionadoComprobanteFactura;
    //para el plan de cuentas comprobante
    public $idCuentaPlanSeleccionadaComprobante;
    public $codigoSeleccionadoComprobante;
    public $idCuentaPlan_edit;

    use WithPagination;
    ///Factura
    public $array_facturar = [];
    public $idFactura;
    public $nro_factura;
    public $nit_factura;
    public $proveedor;
    public $nroautorizacion;
    public $codcontrol;
    public $total_factura;
    public $sucursal;
    public $ice;
    public $importes_excentos;
    public $descuentos;
    public $credito_fiscal;

    public $haber_iva = 0;
    public $haber_factura = 0;

    public $pregunta = true;
    public $factura = true;

    public $facturar = true;

    public $fecha_inicio;
    public $fecha_final;
    public $searchempresa;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $comprobantes = Comprobante::paginate(5);

        if(!is_null($this->fecha_inicio)  && !is_null($this->fecha_final)){
            $comprobantes = Comprobante::where('fecha','>=',$this->fecha_inicio)->where('fecha','<=',$this->fecha_final)->
            paginate(5);
        }

        return view('livewire.comprobante.index', [
            'comprobantes' => $comprobantes
        ]);

    }

   /* public function buscarempresa(){
        $searchempresa = '%'.$this->searchempresa.'%';
        return view('livewire.comprobante.index',[
            'empresas' =>  Empresa::where('
            razonsocial','LIKE','%'.$searchempresa.'%')->paginate(5)
        ]);
    }*/
    public function atras()
    {
        $this->pregunta = true;
    }
    public function regresar_emitir_factura()
    {
        $this->factura = true;
    }

    public function facturado($condicion)
    {
        $this->pregunta = false;
        if ($condicion == 1) {
            $this->facturar = true;
            $this->factura = true;
        } else {
            $this->facturar = false;
            $this->factura = false;
        }
    }

    public function mount($user)
    {
        $this->user = $user;
    }


    public function show_create()
    {
        $this->interfaces(true, false,false);
        $this->reset_comprobante();
       
        $this->reset_total();
    }

    public function close_create()
    {
        $this->interfaces(false, false,false);

    }
    public function show_form_comprobante()
    {
        $this->factura = false;
      
        
    }
    public function iniciar_nuevo(){
        if($this->idComprobanteTipo == 3){
            $this->pregunta=false;
            $this->factura=false;
            $this->facturar=false;
        }
        else{
            $this->pregunta=true;
        }
      
        $this->reset_factura();
        $this->reset_comprobante_detalle();
    }

    public function show_update(Comprobante $comprobante)
    {
         $this->idComprobante = $comprobante->idComprobante;
         $this->numeroDocumento=$comprobante->numeroDocumento;
         $this->glosa=$comprobante->glosa; 
         $this->tc=$comprobante->tc;
         $this->canceladoa=$comprobante->canceladoa;
         $this->fecha=$comprobante->fecha;
         $this->estado=$comprobante->estado;      
         $this->idMoneda=$comprobante->idMoneda;     
         $this->idComprobanteTipo=$comprobante->idComprobanteTipo;   
         $this->idUser=$comprobante->idUser;
         $this->idEmpresa=$comprobante->idEmpresa;
         $this->interfaces(true,false,true);
    }
    public function actualizar_comprobante(){

        $comprobante = Comprobante::findOrFail($this->idComprobante);
        $comprobante->numeroDocumento=$this->numeroDocumento;
        $comprobante->glosa=$this->glosa;
        $comprobante->tc=$this->tc;
        $comprobante->canceladoa=$this->canceladoa;
        $comprobante->fecha=$this->fecha;
        $comprobante->estado=$this->estado;  
        $comprobante->idMoneda=$this->idMoneda;
        $comprobante->idComprobanteTipo=$this->idComprobanteTipo;
        $comprobante->idUser=$this->idUser;
        $comprobante->idEmpresa=$this->idEmpresa;
        $comprobante->update();
        $this->interfaces(false,false,false);

        /* $this->idComprobante = null;
         $this->codigo = null;
         $this->referidoa = null;
         $this->numeroDocumento = null;
         $this->glosa = null;
         $this->razonSocial = null;
         $this->tc = null;
         $this->canceladoa = null;
         $this->fecha = null;
         $this->estado = null;
         $this->idBanco = null;
         $this->idTipoTransaccion = null;
         $this->idMoneda = null;
         $this->idPeriodo = null;
         $this->idComprobanteTipo = null;
         $this->idTipoPago = null;
         $this->idUser = null;
         $this->idEmpresa = null;*/
    }


    public function interfaces($form, $isDetail,$isEdit=false)
    {
        $this->form = $form;
        $this->isDetail = $isDetail;
        $this->isEdit = $isEdit;
    }


    public function update_add_asiento(){
        
        // PRIMER metodo
       
        if ($this->total_haber == $this->total_debe) {
        if ($this->facturar) {
            array_push($this->array_asiento, [
                //asiento
                'glosaDetalle' => $this->glosaDetalle,
                'debe' => $this->debe,
                'haber' => $this->haber,
                'codigo' => $this->codigoSeleccionadoComprobanteFactura,
                'idCuentaPlan' => $this->idCuentaPlanSeleccionadaComprobanteFactura,
                //Condicion factura,
                'condicion_factura' => $this->facturar,




                //FACTURA
                
                //codigo
                'codigoSeleccionadoFactura' => $this->codigoSeleccionadoFactura,
                'codigo_credito_iva' => especifica(obtener_credito_iva()->id)->codigo_cuenta,
                //cuenta nombre
                'cuenta_factura' => $this->idCuentaPlanSeleccionadaFactura,
                'cuenta_iva' => obtener_credito_iva()->idCuentaPlan,
                //DEBE
                'cuenta_factura_debe' => (floatval($this->total_factura)) - floatval(get_iva($this->total_factura)),
                'credito_fiscal_debe' => get_iva($this->total_factura),
                //HABER
                'haber_factura' => $this->haber_factura,
                'haber_iva' => $this->haber_iva,
                //GLOSA
                'glosaindividual' => obtenerglosaindividual($this->nro_factura, $this->proveedor),

                'nro_factura' => $this->nro_factura,
                'nit_factura' => $this->nit_factura,
                'sucursal' => $this->sucursal,
                'proveedor' => $this->proveedor,
                'nroautorizacion' => $this->nroautorizacion,
                'codcontrol' => $this->codcontrol,
                'total_factura' => $this->total_factura,
                'ice' => $this->ice,
                'importes_excentos' => $this->importes_excentos,
                'descuentos' => $this->descuentos,
                'credito_fiscal' => get_iva($this->total_factura)
            ]);
        } else {
            array_push($this->array_asiento, [
                //asiento
                'glosaDetalle' => $this->glosaDetalle,
                'debe' => $this->debe,
                'haber' => $this->haber,
                'codigo' => $this->codigoSeleccionadoComprobante,
                'idCuentaPlan' => $this->idCuentaPlanSeleccionadaComprobante,
                //Condicion factura,
                'condicion_factura' => $this->facturar,

                //factura
                'nro_factura' => null,
                'nit_factura' => null,
                'sucursal' => null,
                'proveedor' => null,
                'nroautorizacion' => null,
                'codcontrol' => null,
                'total_factura' => null,
                'ice' => null,
                'importes_excentos' => null,
                'descuentos' => null,
                'credito_fiscal' => null,

                'idCuentaPlanSeleccionadaFactura' => null,
                'idIvaFactura' => null,
                'codigoSeleccionadoFactura' => null,
                'codigo_credito_iva' => null,
                'cuenta_factura' => null,
                'cuenta_iva' => null,
                'cuenta_factura_debe' => null,
                'credito_fiscal_debe' => null,
                'haber_factura' => null,
                'haber_iva' => null,
                'glosaindividual' => null
            ]);
        }


        if ($this->facturar) {
          


            //Detalle  -------  Factura
            for ($i = 0; $i < count($this->array_asiento); $i++) {
                $detalle = new ComprobanteCuentaDetalle();
                $detalle->codigo = $this->array_asiento[$i]['codigo']; //primero
                $detalle->glosa = $this->array_asiento[$i]['glosaDetalle'];
                $detalle->debe = floatval($this->array_asiento[$i]['debe']);
                $detalle->haber = $this->array_asiento[$i]['haber'];
                $detalle->idCuentaPlan = $this->array_asiento[$i]['idCuentaPlan'];
                $detalle->idComprobante = $this->idComprobante;
                $detalle->save();


                $factura = new Factura();
                $factura->nro_factura = $this->array_asiento[$i]['nro_factura'];
                $factura->nit_factura = $this->array_asiento[$i]['nit_factura'];
                $factura->proveedor = $this->array_asiento[$i]['proveedor'];
                $factura->nroautorizacion = $this->array_asiento[$i]['nroautorizacion'];
                $factura->codcontrol = $this->array_asiento[$i]['codcontrol'];
                $factura->total_factura = $this->array_asiento[$i]['total_factura'];
                $factura->ice = $this->array_asiento[$i]['ice'];
                $factura->importes_excentos = $this->array_asiento[$i]['importes_excentos'];
                $factura->descuentos = $this->array_asiento[$i]['descuentos'];
                $factura->credito_fiscal = $this->array_asiento[$i]['credito_fiscal'];
                $factura->idComprobanteCuentaDetalle = $detalle->idComprobanteCuentaDetalle;
                $factura->save();


                    $detalle2 = new ComprobanteCuentaDetalle();
                    $detalle2->codigo = $this->array_asiento[$i]['codigoSeleccionadoFactura'];  //segundo
                    $detalle2->glosa = $this->array_asiento[$i]['glosaindividual'];
                    $detalle2->debe = floatval($this->array_asiento[$i]['cuenta_factura_debe']);
                    $detalle2->haber = $this->array_asiento[$i]['haber_factura'];
                    $detalle2->idCuentaPlan = $this->array_asiento[$i]['cuenta_factura'];
                    $detalle2->idComprobante = $this->idComprobante;
                    $detalle2->save();

                    $detalle3 = new ComprobanteCuentaDetalle();
                    $detalle3->codigo = $this->array_asiento[$i]['codigo_credito_iva'];;  //segundo
                    $detalle3->glosa = $this->array_asiento[$i]['glosaindividual'];
                    $detalle3->debe = floatval($this->array_asiento[$i]['credito_fiscal_debe']);
                    $detalle3->haber = $this->array_asiento[$i]['haber_iva'];
                    $detalle3->idCuentaPlan = $this->array_asiento[$i]['cuenta_iva'];
                    $detalle3->idComprobante = $this->idComprobante;
                    $detalle3->save();
            }
        
          
        } else {
           

            for ($i = 0; $i < count($this->array_asiento); $i++) {
                $detalle = new ComprobanteCuentaDetalle();
                $detalle->codigo = $this->array_asiento[$i]['codigo'];
                $detalle->glosa = $this->array_asiento[$i]['glosaDetalle'];
                $detalle->debe = $this->array_asiento[$i]['debe'];
                $detalle->haber = $this->array_asiento[$i]['haber'];
                $detalle->idCuentaPlan = $this->array_asiento[$i]['idCuentaPlan'];
                $detalle->idComprobante = $this->idComprobante;
                $detalle->save();
            }
        }
 }
        //$this->interfaces(false, false);
        $this->array_asiento = [];
       
   
}
    

    public function add_asiento()
    {
        $validatedData = $this->validate([
            
            'debe' => 'required',
            'haber' => 'required',

        ], [
            
            'debe.required' => 'El campo Debe es obligatorio',
            'haber.required' => 'El campo Haber es obligatorio',

        ]);


        if ($this->facturar) {
            array_push($this->array_asiento, [
                //asiento
                'glosaDetalle' => $this->glosaDetalle,
                'debe' => $this->debe,
                'haber' => $this->haber,
                'codigo' => $this->codigoSeleccionadoComprobanteFactura,
                'idCuentaPlan' => $this->idCuentaPlanSeleccionadaComprobanteFactura,
                //Condicion factura,
                'condicion_factura' => $this->facturar,




                //FACTURA
               
                //codigo
                'codigoSeleccionadoFactura' => $this->codigoSeleccionadoFactura,
                'codigo_credito_iva' => especifica(obtener_credito_iva()->id)->codigo_cuenta,
                //cuenta nombre
                'cuenta_factura' => $this->idCuentaPlanSeleccionadaFactura,
                'cuenta_iva' => obtener_credito_iva()->idCuentaPlan,
                //DEBE
                'cuenta_factura_debe' => (floatval($this->total_factura)) - floatval(get_iva($this->total_factura)),
                'credito_fiscal_debe' => get_iva($this->total_factura),
                //HABER
                'haber_factura' => $this->haber_factura,
                'haber_iva' => $this->haber_iva,
                //GLOSA
                'glosaindividual' => obtenerglosaindividual($this->nro_factura, $this->proveedor),

                'nro_factura' => $this->nro_factura,
                'nit_factura' => $this->nit_factura,
                'sucursal' => $this->sucursal,
                'proveedor' => $this->proveedor,
                'nroautorizacion' => $this->nroautorizacion,
                'codcontrol' => $this->codcontrol,
                'total_factura' => $this->total_factura,
                'ice' => $this->ice,
                'importes_excentos' => $this->importes_excentos,
                'descuentos' => $this->descuentos,
                'credito_fiscal' => get_iva($this->total_factura)
            ]);
        } else {
            array_push($this->array_asiento, [
                //asiento
                'glosaDetalle' => $this->glosaDetalle,
                'debe' => $this->debe,
                'haber' => $this->haber,
                'codigo' => $this->codigoSeleccionadoComprobante,
                'idCuentaPlan' => $this->idCuentaPlanSeleccionadaComprobante,
                //Condicion factura,
                'condicion_factura' => $this->facturar,

                //factura
                'nro_factura' => null,
                'nit_factura' => null,
                'sucursal' => null,
                'proveedor' => null,
                'nroautorizacion' => null,
                'codcontrol' => null,
                'total_factura' => null,
                'ice' => null,
                'importes_excentos' => null,
                'descuentos' => null,
                'credito_fiscal' => null,

                'idCuentaPlanSeleccionadaFactura' => null,
                'idIvaFactura' => null,
                'codigoSeleccionadoFactura' => null,
                'codigo_credito_iva' => null,
                'cuenta_factura' => null,
                'cuenta_iva' => null,
                'cuenta_factura_debe' => null,
                'credito_fiscal_debe' => null,
                'haber_factura' => null,
                'haber_iva' => null,
                'glosaindividual' => null
            ]);
        }
        if ($this->facturar) {
            $this->debe_factura = (floatval($this->total_factura)) - floatval(get_iva($this->total_factura)) + floatval(get_iva($this->total_factura)) + $this->debe_factura;
            $this->haber_facturas = $this->haber_facturas + $this->haber_factura + $this->haber_iva + $this->haber;
            $this->montodebeSus_factura =  montoSus($this->tc, (floatval($this->total_factura)) - floatval(get_iva($this->total_factura))) + montoSus($this->tc, get_iva($this->total_factura)) + $this->montodebeSus_factura ;
            $this->montohaberSus_factura = $this->montohaberSus_factura + montoSus($this->tc, $this->haber_factura) + montoSus($this->tc, $this->haber_iva) + montoSus($this->tc, $this->haber);
        } else {
            $this->total_debe =  $this->total_debe + $this->debe;
            $this->total_haber =  $this->total_haber + $this->haber;
            $this->montodebeSus   = $this->montodebeSus + montoSus($this->tc, $this->debe);
            $this->montohaberSus = $this->montohaberSus + montoSus($this->tc, $this->haber);
        }
        $this->reset_comprobante_detalle();
    }

    public function reset_comprobante_detalle()
    {
        $this->glosaDetalle = null;
        $this->codigoSeleccionadoComprobante=null;
        $this->debe = null;
        $this->haber = null;
        
        $this->idCuentaPlan = null;
    }
    public function reset_comprobante(){
 
        $this->numeroDocumento=null;
        $this->glosa=null;  
        $this->canceladoa=null;
        $this->fecha=null;
        $this->tc=null;
        $this->idMoneda=null;     
        $this->idComprobanteTipo=null;   
        $this->idEmpresa=null;
       
    }
    public function reset_total(){
        $this->debe_factura=null;
        $this->haber_facturas =null;
        $this->montodebeSus_factura =null;
        $this->montohaberSus_factura = null;
        $this->total_debe=null;
        $this->total_haber = null;
        $this->montodebeSus = null;
        $this->montohaberSus = null;
    }
    public function reset_factura(){
        $this->nro_factura=null;
        $this->nit_factura=null;
        $this->sucursal=null;
        $this->proveedor=null;
        $this->nroautorizacion=null;
        $this->codcontrol=null;
        $this->total_factura=null;
        $this->ice=null;
        $this->importes_excentos=null;
        $this->descuentos=null;
        $this->credito_fiscal=null;
        $this->codigoSeleccionadoFactura=null;
        $this->codigoSeleccionadoComprobanteFactura=null;
        $this->debe = null;
        $this->haber = null;
        
    }

    public function add_comprobante()
    {
        if ($this->total_haber == $this->total_debe) {

            $validatedData = $this->validate([


                'tc' => 'required',
                'fecha' => 'required',
                'glosa'=>'required',      
                'idMoneda' => 'required',
                'idComprobanteTipo' => 'required',         
                'canceladoa'=>'required',
                
            ], [


                'tc.required' => 'El campo Tipo Cambio es obligatorio', 
                'fecha.required' => 'El campo Fecha es obligatorio',
                'glosa.required' => 'El campo Glosa es obligatorio',
                'idMoneda.required' => 'El campo Moneda es obligatorio',
                'idComprobanteTipo.required' => 'El campo Tipo Comprobante es obligatorio',
                'canceladoa.required'=>'El campo Cancelado A es obligatorio'
                



            ]);
            if ($this->facturar) {
                $comprobante = new Comprobante();
                $comprobante->numeroDocumento = nrocomprobante($this->idComprobanteTipo, $this->fecha) + 1;
                $comprobante->glosa = $this->glosa;     
                $comprobante->tc = $this->tc;
                $comprobante->canceladoa = $this->canceladoa;
                $comprobante->fecha = $this->fecha;
                $comprobante->estado = 0;
                $comprobante->idMoneda = $this->idMoneda;
                $comprobante->idComprobanteTipo = $this->idComprobanteTipo;
                $comprobante->idEmpresa = $this->idEmpresa;
                $comprobante->idUser=$this->idUser;
                $comprobante->save();


                //Detalle  -------  Factura
                for ($i = 0; $i < count($this->array_asiento); $i++) {
                    $detalle = new ComprobanteCuentaDetalle();
                    $detalle->codigo = $this->array_asiento[$i]['codigo']; //primero
                    $detalle->glosa = $this->array_asiento[$i]['glosaDetalle'];
                    $detalle->debe = floatval($this->array_asiento[$i]['debe']);
                    $detalle->haber = $this->array_asiento[$i]['haber'];
                    $detalle->idCuentaPlan = $this->array_asiento[$i]['idCuentaPlan'];
                    $detalle->idComprobante = $comprobante->idComprobante;
                    $detalle->save();


                    $factura = new Factura();
                    $factura->nro_factura = $this->array_asiento[$i]['nro_factura'];
                    $factura->nit_factura = $this->array_asiento[$i]['nit_factura'];
                    $factura->proveedor = $this->array_asiento[$i]['proveedor'];
                    $factura->nroautorizacion = $this->array_asiento[$i]['nroautorizacion'];
                    $factura->codcontrol = $this->array_asiento[$i]['codcontrol'];
                    $factura->total_factura = $this->array_asiento[$i]['total_factura'];
                    $factura->ice = $this->array_asiento[$i]['ice'];
                    $factura->importes_excentos = $this->array_asiento[$i]['importes_excentos'];
                    $factura->descuentos = $this->array_asiento[$i]['descuentos'];
                    $factura->credito_fiscal = $this->array_asiento[$i]['credito_fiscal'];
                    $factura->idComprobanteCuentaDetalle = $detalle->idComprobanteCuentaDetalle;
                    $factura->save();


                        $detalle2 = new ComprobanteCuentaDetalle();
                        $detalle2->codigo = $this->array_asiento[$i]['codigoSeleccionadoFactura'];  //segundo
                        $detalle2->glosa = $this->array_asiento[$i]['glosaindividual'];
                        $detalle2->debe = floatval($this->array_asiento[$i]['cuenta_factura_debe']);
                        $detalle2->haber = $this->array_asiento[$i]['haber_factura'];
                        $detalle2->idCuentaPlan = $this->array_asiento[$i]['cuenta_factura'];
                        $detalle2->idComprobante = $comprobante->idComprobante;
                        $detalle2->save();

                        $detalle3 = new ComprobanteCuentaDetalle();
                        $detalle3->codigo = $this->array_asiento[$i]['codigo_credito_iva'];;  //segundo
                        $detalle3->glosa = $this->array_asiento[$i]['glosaindividual'];
                        $detalle3->debe = floatval($this->array_asiento[$i]['credito_fiscal_debe']);
                        $detalle3->haber = $this->array_asiento[$i]['haber_iva'];
                        $detalle3->idCuentaPlan = $this->array_asiento[$i]['cuenta_iva'];
                        $detalle3->idComprobante = $comprobante->idComprobante;
                        $detalle3->save();
                }
            
               
            } else {
                $comprobante = new Comprobante();
                $comprobante->numeroDocumento = nrocomprobante($this->idComprobanteTipo, $this->fecha) + 1;
                $comprobante->glosa = $this->glosa;
                $comprobante->tc = $this->tc;
                $comprobante->canceladoa = $this->canceladoa;
                $comprobante->fecha = $this->fecha;
                $comprobante->estado = 0;
                $comprobante->idMoneda = $this->idMoneda;
                $comprobante->idComprobanteTipo = $this->idComprobanteTipo;
                $comprobante->idEmpresa = $this->idEmpresa;
                $comprobante->save();

                for ($i = 0; $i < count($this->array_asiento); $i++) {
                    $detalle = new ComprobanteCuentaDetalle();
                    $detalle->codigo = $this->array_asiento[$i]['codigo'];;
                    $detalle->glosa = $this->array_asiento[$i]['glosaDetalle'];
                    $detalle->debe = $this->array_asiento[$i]['debe'];
                    $detalle->haber = $this->array_asiento[$i]['haber'];
                    $detalle->idCuentaPlan = $this->array_asiento[$i]['idCuentaPlan'];
                    $detalle->idComprobante = $comprobante->idComprobante;
                    $detalle->save();
                }
            }

            $this->interfaces(false, false);
            $this->array_asiento = [];
            $this->glosa = null;
        } else {
            $this->validate_total = false;
        }
    }

    public function delete_comprobante($idComprobante)
    {
        $comprobante = Comprobante::findOrFail($idComprobante);
        $comprobante->delete();
    }


    public function update_estado($idComprobante)
    {
        $comprobante = Comprobante::findOrFail($idComprobante);
        $comprobante->estado =  !$comprobante->estado;
        $comprobante->update();
    }

    public function seleccionarsubcuenta($id)
    {
        $this->idCuentaPlan = $id;
    }

    public function seleccionar_cuenta_plan($key1, $key2, $key3, $key4, $key5, $idCuentaPlan, $condicion)
    {
        if ($condicion == 0) {

            $this->idCuentaPlanSeleccionadaFactura = $idCuentaPlan;
            $this->codigoSeleccionadoFactura = $key1 . "0" . $key2 . "0" . $key3 . "0" . $key4 . "0" . $key5;
        }
        if ($condicion == 1) {

            $this->idCuentaPlanSeleccionadaComprobanteFactura = $idCuentaPlan;
            $this->codigoSeleccionadoComprobanteFactura = $key1 . "0" . $key2 . "0" . $key3 . "0" . $key4 . "0" . $key5;
        } else {
            $this->idCuentaPlanSeleccionadaComprobante = $idCuentaPlan;
            $this->codigoSeleccionadoComprobante = $key1 . "0" . $key2 . "0" . $key3 . "0" . $key4 . "0" . $key5;
        }
    }
    public function seleccionar_empresa($id)
    {
        $this->idEmpresa = $id;
    }
    public function show_asiento(ComprobanteCuentaDetalle $detalle){
        $this->idComprobanteCuentaDetalle =$detalle->idComprobanteCuentaDetalle;
        $this->codigo=$detalle->codigo;
        $this->idCuentaPlan_edit= $detalle->idCuentaPlan ;
        $this->glosa=$detalle->glosa;
        $this->debe=$detalle->debe;
        $this->haber=$detalle->haber;
    }
    public function seleccionar_asiento($key1, $key2, $key3, $key4, $key5, $idCuentaPlan)
    {
            $this->idCuentaPlan_edit = $idCuentaPlan;
            $this->codigo = $key1 . "0" . $key2 . "0" . $key3 . "0" . $key4 . "0" . $key5;
    }
    public function modificar_asiento()
    {
        $detalle = ComprobanteCuentaDetalle::findOrFail($this->idComprobanteCuentaDetalle);
        $detalle->codigo=$this->codigo;
        $detalle->idCuentaPlan=$this->idCuentaPlan_edit;
        $detalle->glosa=$this->glosa;
        $detalle->debe=$this->debe;
        $detalle->haber=$this->haber;
        $detalle->update();

    }
}
