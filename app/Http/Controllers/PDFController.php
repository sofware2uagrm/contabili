<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  Barryvdh\DomPDF\Facade as PDF;
use App\Models\Comprobante;
use App\Models\User;

use App\Models\ComprobanteCuentaDetalle;

class PDFController extends Controller
{
    public function mostrar(){
        $pdf = PDF::loadView('pdf.index');
        return $pdf->download('cuentas.pdf');
    }
    public function mostrar_comprobante($id){
       
        $comprobante=Comprobante::findOrFail($id);
        $detalle=ComprobanteCuentaDetalle::where('idComprobante','=',$comprobante->idComprobante)->get();




        $data = [
            "comprobante"     => $comprobante,
            "detalle"   => $detalle,
       ];
        $pdf = PDF::loadView('pdf.registrocomprobante',$data);
        return $pdf->download('comprobante.pdf',$comprobante);
    }

    public function comprobantesPDF($desde,$hasta,$idComprobanteTipo){
        
        $comprobantes = Comprobante::where('fecha','>=',$desde)
        ->where('fecha','<=',$hasta)
        ->where('idComprobanteTipo','=',$idComprobanteTipo)
        ->get();

     
        $pdf = PDF::loadView('page.pdfComprobante', [
            'comprobantes'=>$comprobantes
        ]);
        return $pdf->download('comprobantes.pdf');
    }

    public function libroMayor($desde,$hasta,$idCuentaPlan){

        $detalle = libro_mayor_detalle_pdf($desde,$hasta,$idCuentaPlan);
        
        $pdf = PDF::loadView('page.pdfLibroMayor', [
            'comprobantes'=>$detalle,
            'desde' =>  $desde,
            'hasta' =>  $hasta,
            'idCuentaPlan' => $idCuentaPlan
        ]);


        return $pdf->download('libroMayor.pdf');
    }
}
