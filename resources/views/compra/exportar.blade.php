<table>
    <thead>
        <tr>
            <th colspan="16" style="text-align: center; font-size: 20px;"><strong>COMPRA</strong></th>
        </tr>
        <tr>
            <th style="border: 1px solid black; font-weight: bold">ESPECIFICACION</th>
            <th style="border: 1px solid black; font-weight: bold">SUCURRSAL</th>
            <th style="border: 1px solid black; font-weight: bold">FECHA</th>
            <th style="border: 1px solid black; font-weight: bold">NIT</th>
            <th style="border: 1px solid black; font-weight: bold">PROVEEDOR</th>
            <th style="border: 1px solid black; font-weight: bold">RAZÓN SOCIAL</th>
            <th style="border: 1px solid black; font-weight: bold">Nro FACTURA</th>
            <th style="border: 1px solid black; font-weight: bold">Nro DE DUI</th>
            <th style="border: 1px solid black; font-weight: bold">Nro AUTORIZACIÓN</th>
            <th style="border: 1px solid black; font-weight: bold">IMPORTE TOTAL</th>
            <th style="border: 1px solid black; font-weight: bold">SUB TOTAL</th>
            <th style="border: 1px solid black; font-weight: bold">IMPORTE EXENTO</th>
            <th style="border: 1px solid black; font-weight: bold">DESCUENTOS</th>
            <th style="border: 1px solid black; font-weight: bold">IMPORTE BASE CF-IVA</th>
            <th style="border: 1px solid black; font-weight: bold">CREDITO FISCAL IVA</th>
            <th style="border: 1px solid black; font-weight: bold">CODIGO DE CONTROL</th>
            <th style="border: 1px solid black; font-weight: bold">TIPO DE COMPRA</th>
        </tr>
    </thead>
    <tbody>
    @foreach($compra as $comp)
        <tr>
            <td>{{$comp->especificacion}}</td>
            <td>{{$comp->sucursal}}</td>
            <td>{{$comp->fecha}}</td>
            <td>{{$comp->nit}}</td>
            <td>{{$comp->proveedor}}</td>
            <td>{{$comp->razonSocial}}</td>
            <td>{{$comp->nroFactura}}</td>
            <td>{{$comp->NumeroDUI}}</td>
            <td>{{$comp->nroAutorizacion}}</td>
            <td>{{number_format($comp->importeTotaldeLaCompra , 2)}}</td>
            <td>{{number_format($comp->subTotal , 2)}}</td>
            <td>{{number_format($comp->importeNoSujetoACreditoFiscal , 2)}}</td>
            <td>{{number_format($comp->descuento , 2)}}</td>
            <td>{{number_format($comp->importeBaseParaCreditoFiscal , 2)}}</td>
            <td>{{number_format($comp->creditoFiscalIva , 2)}}</td>
            <td>{{$comp->codigodeControl}}</td>
            <td>{{$comp->tipoCompra}}</td>
        </tr> 
        @endforeach
    </tbody>
</table>