<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    .comprobante{
        /* border:1px solid black; */
        padding:0px;
        width: 100%;
        height: 100px;
    }



    /* .table, td, th {
    border: 1px solid black;
    max-width: 100px;
    min-width: 80px;
    } */

    /* .table {
    width: 100%;
    border-collapse: collapse;
    } */

    table {
   width: 100%;
   border: 1px solid #000;
}
th, td {
   width: 25%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}
th {
   background: #eee;
}

    .centrado{text-align:center; padding:8px;}
		div{width:80%;padding:8px;margin:auto;}
		center{margin:16px 0;}
</style>
</head>
<body>
<body>
    <div class="centrado">
        <h4>LIBRO MAYOR</h4>
        <div class="col-12 text-center">
            Desde {{$desde}} hasta {{$hasta}} <br>
            Expresado en Bs
        </div>
    </div>
    <div class="contenedor">
        <div class="comprobante">
            <p style="margin-left: 50px"> CUENTA  : {{cuenta_plan($idCuentaPlan)->descripcion}}</p>

            {{-- <p>Comprobante {{$comprobante->idComprobante}}</p> --}}
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Debe</th>
                            <th>Haber</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach (libro_mayor_detalle($desde,$hasta,$idCuentaPlan)['comprobantes'] as $item) 
                            <tr>
                                <td scope="row">{{$item->idComprobanteCuentaDetalle}}</td>
                                <td>{{$item->glosa}}</td>
                                <td>{{$item->fecha}}</td>
                                <td>{{$item->debe}}</td>
                                <td>{{$item->haber}}</td>
                            </tr>                        
                        @endforeach 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>TOTALES</td>
                            <td></td>
                            <td></td>
                            <td>{{libro_mayor_detalle($desde,$hasta,$idCuentaPlan)['debe']}}</td>
                            <td>{{libro_mayor_detalle($desde,$hasta,$idCuentaPlan)['haber']}}</td>
                        </tr>          
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>