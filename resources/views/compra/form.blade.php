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
<input type="text" name="especificacion" value="{{ isset($compra->especificacion)?$compra->especificacion:''}}" id="especificacion">
</div> 


<Div class=“col-md-6” >
<label for="">Fecha de la Factura</label> 
<input type="date" name="fecha" value="{{isset($compra->fecha)?$compra->fecha:''}}" id="">
</div>

<Div class=“col-md-6” >
<label for="">Sucursal</label> 
<input type="text" name="sucursal" value="{{isset($compra->sucursal)?$compra->sucursal:''}}" id="">
</div> 

<Div class=“col-md-6” >
<label for="">Nit del proveedor</label> 
<input type="text" name="nit" value="{{isset($compra->nit)?$compra->nit:''}}" id="">
</div>

<Div class=“col-md-6” >
<label for="">Proveedor</label> 
<input type="text" name="proveedor" value="{{isset($compra->proveedor)?$compra->proveedor:''}}" id="">
</div>

<Div class=“col-md-6” >
<label for="">Razón social</label> 
<input type="text" name="razonSocial" value="{{isset($compra->razonSocial)?$compra->razonSocial:''}}" id="">
</div>

<Div class=“col-md-6” >
<label for="">Número de factura</label> 
<input type="text" name="nroFactura" value="{{isset($compra->nroFactura)?$compra->nroFactura:''}}" id="">
</div>  

<Div class=“col-md-6” >
<label for="">Número de DUI</label> 
<input type="text" name="NumeroDUI" value="{{isset($compra->NumeroDUI)?$compra->NumeroDUI:''}}" id="">
</div>

<Div class=“col-md-6” >
<label for="">Número de Autorización</label> 
<input type="text" name="nroAutorizacion" value="{{isset($compra->nroAutorizacion)?$compra->nroAutorizacion:''}}" id="">
</div> 

<Div class=“col-md-6” >
<label for="">Importe Total de la Compra </label> 
<input type="text" name="importeTotaldeLaCompra"  id="importeTotaldeLaCompra"
oninput="actualizarSubtotal(),actualizarImporteBaseCreditoFiscal(),actualizarCreditoFiscalIva()"
value="{{isset($compra->importeTotaldeLaCompra)?$compra->importeTotaldeLaCompra:''}}" >
</div>

<Div class=“col-md-6” >
<label for="">Sub Total </label> 
<input type="text" name="subTotal" value="{{isset($compra->subTotal)?$compra->subTotal:''}}" id="subTotal">
</div>

<Div class=“col-md-6” >
<label for="">Importe no sujeto a Crédito Fiscal</label> 
<input type="text" name="importeNoSujetoACreditoFiscal" oninput="actualizarSubtotal(),actualizarCreditoFiscalIva() "
value="{{isset($compra->importeNoSujetoACreditoFiscal)?$compra->importeNoSujetoACreditoFiscal:''}}" 
id="importeNoSujetoACreditoFiscal">
</div>

<Div class=“col-md-6” >
<label for="">Descuentos</label> 
<input type="text" name="descuento" oninput="actualizarSubtotal(),actualizarImporteBaseCreditoFiscal(),actualizarCreditoFiscalIva()"
value="{{isset($compra->descuento)?$compra->descuento:''}}" id="descuento">
</div>

<Div class=“col-md-6” >
<label for="">Importe Base para Credito Fiscal</label> 
<input type="text" name="importeBaseParaCreditoFiscal" 
value="{{isset($compra->importeBaseParaCreditoFiscal)?$compra->importeBaseParaCreditoFiscal:''}}" 
id="importeBaseParaCreditoFiscal">
</div>

<Div class=“col-md-6” >
<label for="">Credito fiscal Iva</label>
<input type="text" name="creditoFiscalIva"  value="{{isset($compra->creditoFiscalIva)?$compra->creditoFiscalIva:''}}" 
id="creditoFiscalIva">
</div>

<Div class=“col-md-6” >
<label for="">Código de control</label> 
<input type="text" name="codigodeControl" value="{{isset($compra->codigodeControl)?$compra->codigodeControl:''}}" id="">
</div>


<Div class=“col-md-6” >
<label for="">Tipo de compra</label> 
<input type="text" name="tipoCompra" value="{{isset($compra->tipoCompra)?$compra->tipoCompra:''}}" id=""> 
</div>


<br>
<input type="submit" value="Guardar">


<a href="{{url('compra/')}}">REGRESAR</a>
</div>
</div>
</div>

<script>
        function actualizarSubtotal() {
			let importeTotaldeLaCompra = document.getElementById("importeTotaldeLaCompra").value;
            let importeNoSujetoACreditoFiscal = document.getElementById("importeNoSujetoACreditoFiscal").value;
			document.getElementById("subTotal").value = importeTotaldeLaCompra - importeNoSujetoACreditoFiscal ;
            console.log(importeTotaldeLaCompra, importeNoSujetoACreditoFiscal);
        }

        function actualizarImporteBaseCreditoFiscal() {
			let importeTotaldeLaCompra = document.getElementById("importeTotaldeLaCompra").value;
            let importeNoSujetoACreditoFiscal = document.getElementById("importeNoSujetoACreditoFiscal").value;
            let descuento = document.getElementById("descuento").value;
			document.getElementById("importeBaseParaCreditoFiscal").value = importeTotaldeLaCompra - importeNoSujetoACreditoFiscal - descuento;
            console.log(importeTotaldeLaCompra, importeNoSujetoACreditoFiscal, descuento);
        }

        function actualizarCreditoFiscalIva() {
			let importeTotaldeLaCompra = document.getElementById("importeTotaldeLaCompra").value;
			let descuento = document.getElementById("descuento").value;
			let importeNoSujetoACreditoFiscal = document.getElementById("importeNoSujetoACreditoFiscal").value;
			document.getElementById("creditoFiscalIva").value = ((importeTotaldeLaCompra * 13)/100) - ((importeNoSujetoACreditoFiscal * 13)/100) - ((descuento * 13)/100);
            console.log(importeTotaldeLaCompra,importeNoSujetoACreditoFiscal,descuento);
        }

</script>
