<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title">Registro de factura</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                   </button>
           </div>
<div class="modal-body">

<Div class=“col-md-6” >
<label for="">Especificación</label> 
<input type="text" name="especificacion" wire:model='especificacion' aria-describedby="helpId"
value="{{ isset($venta->especificacion)?$venta->especificacion:''}}" id="">
</div> 




<Div class=“col-md-6” >
<label for="">Sucursal</label> 
<input type="text" name="sucursal" value="{{isset($venta->sucursal)?$venta->sucursal:''}}" id="">
</div> 



<Div class=“col-md-6” >
<label for="">Nro de factura</label> 
<input type="text" name="nroFactura" value="{{isset($venta->nroFactura)?$venta->nroFactura:''}}" id="">
</div> 
 


<Div class=“col-md-6” >
<label for="">Nit</label> 
<input type="text" name="nit" value="{{isset($venta->nit)?$venta->nit:''}}" id="">
</div>


<Div class=“col-md-6” >
<label for="">Razón social</label> 
<input type="text" name="razonSocial" value="{{isset($venta->razonSocial)?$venta->razonSocial:''}}" id="">

</div> 


<Div class=“col-md-6” >
<label for="">Nro de Autorización</label> 
<input type="text" name="nroAutorizacion" value="{{isset($venta->nroAutorizacion)?$venta->nroAutorizacion:''}}" id="">
</div>


<Div class=“col-md-6” >
<label for="">Estado de factura</label> 
<input type="text" name="estadoDeFactura" value="{{isset($venta->estadoDeFactura)?$venta->estadoDeFactura:''}}" id=""> 
</div> 


<Div class=“col-md-6” >
<label for="">Código de control</label> 
<input type="text" name="codigodeControl" value="{{isset($venta->codigodeControl)?$venta->codigodeControl:''}}" id="">
</div>


<Div class=“col-md-6” >
<label for="">Fecha</label> 
<input type="date" name="fecha" value="{{isset($venta->fecha)?$venta->fecha:''}}" id="">
</div>



<Div class=“col-md-6” >
<label for="">Importe total de la venta</label> 
<input type="text" name="importetotaldeVenta"  oninput="actualizarSubtotal(),actualizarImporteDebitoFiscal(), actualizarDebitoFiscal()"
value="{{isset($venta->importetotaldeVenta)?$venta->importetotaldeVenta:''}}" id="importetotaldeVenta">
</div>


<Div class=“col-md-6” >
<label for="">ICE</label> 
<input type="text" name="ice" oninput="actualizarSubtotal(),actualizarImporteDebitoFiscal() ,actualizarDebitoFiscal()" 
value="{{isset($venta->ice)?$venta->ice:''}}" id="ice">
</div>


<Div class=“col-md-6” >
<label for="">Exportaciones y Operaciones Exentas</label> 
<input type="text" name="exportacionesExentas"  oninput="actualizarSubtotal(), actualizarImporteDebitoFiscal(), actualizarDebitoFiscal()"
value="{{isset($venta->exportacionesExentas)?$venta->exportacionesExentas:''}}" id="exportacionesExentas">
</div>



<Div class=“col-md-6” >
<label for="">Ventas Grabadas a Tasa Cero</label> 
<input type="text" name="ventasGrabadasaTasaCero"  oninput="actualizarSubtotal(),actualizarImporteDebitoFiscal(), actualizarDebitoFiscal()"
value="{{isset($venta->ventasGrabadasaTasaCero)?$venta->ventasGrabadasaTasaCero:''}}" id="ventasGrabadasaTasaCero">
</div>


<Div class=“col-md-6” >
<label for="">Descuentos</label> 
<input type="text" name="descuento" oninput="actualizarDebitoFiscal(),actualizarImporteDebitoFiscal(), actualizarImporteDebitoFiscal()" 
value="{{isset($venta->descuento)?$venta->descuento:''}}" id="descuento">
</div> 


<Div class=“col-md-6” >
<label for="">Importe Base para Debito Fiscal</label> 
<input type="text" name="importeDebitoFiscal" value="{{isset($venta->importeDebitoFiscal)?$venta->importeDebitoFiscal:''}}" id="importeDebitoFiscal">
</div>


<Div class=“col-md-6” >
<label for="">Debito fiscal Iva</label>
<input type="text" name="debitoFiscalIva"  value="{{isset($venta->debitoFiscalIva)?$venta->debitoFiscalIva:''}}" id="debitoFiscalIva">
</div>


<Div class=“col-md-6” >
<label for="">Sub total</label> 
<input type="text" name="subtotal" value="{{isset($venta->subtotal)?$venta->subtotal:''}}" id="subtotal">
</div>



<br>
<input type="submit" value="Guardar">


<a href="{{url('/venta/')}}">REGRESAR</a>
</div>
</div>
</div>
</div>


<script>
        function actualizarSubtotal() {
			let importetotaldeVenta = document.getElementById("importetotaldeVenta").value;
            let ice = document.getElementById("ice").value;
            let exportacionesExentas = document.getElementById("exportacionesExentas").value;
            let ventasGrabadasaTasaCero = document.getElementById("ventasGrabadasaTasaCero").value;
			//Se actualiza en municipio inm
			document.getElementById("subtotal").value = (importetotaldeVenta - ice) - exportacionesExentas - ventasGrabadasaTasaCero;
            console.log(importetotaldeVenta, ice, exportacionesExentas,ventasGrabadasaTasaCero);

        }


        function actualizarImporteDebitoFiscal() {
			let importetotaldeVenta = document.getElementById("importetotaldeVenta").value;
            let ice = document.getElementById("ice").value;
            let exportacionesExentas = document.getElementById("exportacionesExentas").value;
            let ventasGrabadasaTasaCero = document.getElementById("ventasGrabadasaTasaCero").value;
            let descuento = document.getElementById("descuento").value;
			//Se actualiza en municipio inm
			document.getElementById("importeDebitoFiscal").value = (importetotaldeVenta - ice) - exportacionesExentas - ventasGrabadasaTasaCero - descuento;
            console.log(importetotaldeVenta, ice, exportacionesExentas,ventasGrabadasaTasaCero,descuento);

        }

        function actualizarDebitoFiscal() {
			let importetotaldeVenta = document.getElementById("importetotaldeVenta").value;
            let ice = document.getElementById("ice").value;
            let exportacionesExentas = document.getElementById("exportacionesExentas").value;
            let ventasGrabadasaTasaCero = document.getElementById("ventasGrabadasaTasaCero").value;
            let descuento = document.getElementById("descuento").value;
			//Se actualiza en municipio inm
			document.getElementById("debitoFiscalIva").value = ((importetotaldeVenta * 13)/100) - ((ice * 13)/100) - ((exportacionesExentas * 13)/100) - ((ventasGrabadasaTasaCero * 13)/100) - ((descuento * 13)/100);
            console.log(importetotaldeVenta, ice, exportacionesExentas,ventasGrabadasaTasaCero, descuento);

        }
        
</script>





<!-- 
<script src="http://code.jquery.com/jquery-1.0.4.js"></script>
<script>
      $(document).ready(function () {
          $("#importetotaldeVenta").keyup(function () {
              var value = $(this).val();
              $("#subtotal").val(value);
          });
      });
</script> -->

