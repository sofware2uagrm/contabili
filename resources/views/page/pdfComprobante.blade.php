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
    .contenedor{
        margin: 20px;
    }
    .comprobante{
        border:1px solid black;
        padding:10px;
        width: 100%;
        height: 100px;
    }



    .table, td, th {
    border: 1px solid black;
    }

    .table {
    width: 100%;
    border-collapse: collapse;
    }
</style>
</head>
<body>
</style>
<body>
    <div class="contenedor">
        <div style="height: 80px; width: 100%; margin: auto" >
            <h2>Libro Diario</h2>
        </div>
        @foreach ($comprobantes as $comprobante)
           
            <div class="comprobante">
                <p>Comprobante {{$comprobante->idComprobante}}</p>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripcion</th>
                                <th>Debe</th>
                                <th>Haber</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (detallecomprobantelibro($comprobante->idComprobante) as $item)
                                <tr>
                                    <td scope="row">{{$item->idComprobanteCuentaDetalle}}</td>
                                    <td>{{$item->glosa}}</td>
                                    <td>{{$item->debe}}</td>
                                    <td>{{$item->haber}}</td>
                                </tr>  
                                                                                
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>{{sumasDetallecomprobante($comprobante->idComprobante)['debe']}}</td>
                                <td>{{sumasDetallecomprobante($comprobante->idComprobante)['haber']}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        @endforeach
    </div>
</body>
</html>