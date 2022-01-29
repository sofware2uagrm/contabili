<table>
    <thead>
        <tr>
            <th colspan="16" style="text-align: center; font-size: 20px;"><strong>VENTA</strong></th>
        </tr>
        <tr>
            <th style="border: 1px solid black; font-weight: bold">ESPECIFICACION</th>
            <th style="border: 1px solid black; font-weight: bold">SUCURSAL</th>
            <th style="border: 1px solid black; font-weight: bold">NIT</th>
            <th style="border: 1px solid black; font-weight: bold">Nro FACTURA</th>
            <th style="border: 1px solid black; font-weight: bold">RAZÓN SOCIAL</th>
            <th style="border: 1px solid black; font-weight: bold">CODIGO DE CONTROL</th>
            <th style="border: 1px solid black; font-weight: bold">Nro AUTORIZACIÓN</th>
            <th style="border: 1px solid black; font-weight: bold">ESTADO DE FACTURA</th>
            <th style="border: 1px solid black; font-weight: bold">CODIGO DE CONTROL</th>
            <th style="border: 1px solid black; font-weight: bold">FECHA</th>
            <th style="border: 1px solid black; font-weight: bold">IMPORTE TOTAL</th>
            <th style="border: 1px solid black; font-weight: bold">ICE / IEHD / TASAS</th>
            <th style="border: 1px solid black; font-weight: bold">TASA CERO</th>
            <th style="border: 1px solid black; font-weight: bold">EXPORTACIONES EXENTAS</th>
            <th style="border: 1px solid black; font-weight: bold">SUBTOTAL</th>
            <th style="border: 1px solid black; font-weight: bold">DESCUENTOS</th>
            <th style="border: 1px solid black; font-weight: bold">IMPORTE BASE </th>
            <th style="border: 1px solid black; font-weight: bold">DEBITO FISCAL</th>

        </tr>
    </thead>
    <tbody>
    @foreach($venta as $venta)
        <tr>
            <td>{{$venta->especificacion}}</td>
            <td>{{$venta->sucursal}}</td>
            <td>{{$venta->nroFactura}}</td>
            <td>{{$venta->nit}}</td>
            <td>{{$venta->razonSocial}}</td>
            <td>{{$venta->nroAutorizacion}}</td>
            <td>{{$venta->estadoDeFactura}}</td>
            <td>{{$venta->codigodeControl}}</td>
            <td>{{$venta->fecha}}</td>
            <td>{{number_format($venta->importetotaldeVenta, 2)}}</td>
            <td>{{number_format($venta->ice, 2)}}</td>
            <td>{{$venta->ventasGrabadasaTasaCero}}</td>
            <td>{{number_format($venta->exportacionesExentas, 2)}}</td>
            <td>{{number_format($venta->subtotal, 2)}}</td>
            <td>{{number_format($venta->descuento, 2)}}</td>
            <td>{{number_format($venta->importeDebitoFiscal, 2)}}</td>
            <td>{{number_format($venta->debitoFiscalIva, 2)}}</td>

            
        </tr> 
        @endforeach
    </tbody>
</table>