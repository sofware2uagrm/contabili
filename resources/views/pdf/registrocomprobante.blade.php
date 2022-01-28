<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }
        #logoEmpresa{
        float: left;
        margin-top: 1%;
        margin-left: 2%;
        margin-right: 2%;
        }
        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }
        #encabezado{
        text-align: left;
        margin-left: 10%;
        margin-right: 35%;
        font-size: 15px;
        }
        .title {
            text-align: center;
        }
        #comprobanteder{
        text-align: right;
        }
        #comprobanteizq{
        text-align: left;
        }
        #facomprobante{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;

        }
        .body{
            padding:5px;
            margin: 5px;
        }
        .container{
            width: 100%;
            border: solid 1px #000
        }
        .row{
            margin:5px;
            width: 100%;

            /* Example */
            /* border-top: solid 1px #0ff; */
        }

    </style>
</head>
<body>
    <p id="comprobanteizq">      
        <br>  
        <strong>Empresa : </strong> 
        {{empresaid($comprobante->idEmpresa)->razonsocial}}
        <br>
        <strong>Direccion : </strong> 
        {{empresaid($comprobante->idEmpresa)->direccion}}

    </p>
    <p id="comprobanteder">
       
            <strong>Fecha : </strong> 
                {{ $comprobante->fecha  }}
            <br>
            <strong>T. C. :     </strong>
                {{$comprobante->tc}}
            <br>
            <strong>NIT : </strong>
           {{empresaid($comprobante->idEmpresa)->nit}}
            <br>
            <strong>Usuario</strong>
            @foreach (users() as $usuario)
            {{$usuario->name}}
            @endforeach
        
    </p>
    <div class="title">
  
                    <h2>COMPROBANTE DE {{comprobanteTipo($comprobante->idComprobanteTipo)->descripcion}}</h2>
                    <p class="font-weight-light">NRO COMPROBANTE : {{$comprobante->numeroDocumento}}</p>
                    
          
    </div>
            <section>
                <div>
                    <table id="facomprobante">
                        <thead>
                            <tr>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <br>
                            <br>
                            <br>
                                <th><p  id="comprobante"><strong>CANCELADO A : </strong> 
                                    <br>
                                    {{ $comprobante->canceladoa }}
                                    <br>
                               <strong>POR CONCEPTO DE: </strong> 
                                <br>
                                {{ $comprobante->glosa }}
                                <br>
                                </p></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
   
</body>
</html>