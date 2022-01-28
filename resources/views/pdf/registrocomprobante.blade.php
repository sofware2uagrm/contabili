<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <style>
        body {
       
        font-family: Arial, sans-serif;
        font-size: 14px;
        
        }
        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        
        }
        #encabezado{
        text-align: left;
        margin-left: 0%;
        margin-right: 0%;
        font-size: 13px;
        }
        #encabezado1{
        text-align: right;
        margin-left: 0%;
        margin-right: 0%;
        font-size: 13px;
        }
        
        section{
        clear: left;
        }
        #cliente{
        text-align: left;
        }
        #facliente{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;

        }
        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }
        #facliente thead{
        padding: 20px;
        /* background: #2183E3; */
        text-align: left;
        border-bottom: 10px solid #FFFFFF;
        }
       
        #facarticulo{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        border:left;
        text-align: center;
        }
        #facarticulo thead{
        padding: 20px;
        background: #000000;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }
        #centro{
        text-align: center;
        margin-left: 12%;
        }
        .Titulo{
          text-align: center;
        }
        #total{
          color :black ;
          text-emphasis: solid;
        }
        #firmaizq{
            text-align: left;
            margin-left: 10%;
        }
        #firmcont{
            text-align: left;
            margin-left: 18%;
        }
        #firmadm{
        text-align: center;
        margin-left: 14%;
        }
        #subrayado{
            text-decoration: underline;
        }
    </style>
    <body>
        <header>
           
            <div id="datos">
                <p id="encabezado">
                    <b></b>
                    <br>EMPRESA : {{empresaid($comprobante->idEmpresa)->razonsocial}} </b>
                    <br>DIRECCION : {{empresaid($comprobante->idEmpresa)->direccion}} </b>
                    <br>GESTION : {{año()}} </b>
                    <br>MES : {{mes()}} </b>
                </p>
            </div>
            
            <p id="encabezado1">
            <br>FECHA :  {{ $comprobante->fecha  }}</b>
            <br>TC :  {{$comprobante->tc}}</b>
            <br>NIT :  {{empresaid($comprobante->idEmpresa)->nit}}</b>
            <br>USUARIO :  
            @foreach (users() as $usuario)
            {{$usuario->name}}
            @endforeach</b>
            </p>

            <h2 class="Titulo">COMPROBANTE DE {{comprobanteTipo($comprobante->idComprobanteTipo)->descripcion}}</h2>
            <h4 class="Titulo">NRO DE COMPROBANTE : {{$comprobante->numeroDocumento}}</h4>
        </header>
        <br>
        <section>
            <div>
                <table id="facliente">
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
                        <br>
                        
                            <th><p id="cliente">CANCELADO A : <br>
                              {{ $comprobante->canceladoa }}<br>
                              POR CONCEPTO DE :<br>
                              {{ $comprobante->glosa }}
                            </p></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>


        <section>
            <div>
                <table id="facarticulo" style="border: solid 1px rgb(0, 0, 0)">
                    <thead >
                        <tr id="fa">
                            <th>CODIGOS</th>
                            <th>DESCRIPCION</th>
                            <th>DEBE Bs</th>
                            <th>HABER Bs</th>
                            <th>DEBE Sus</th>
                            <th>HABER Sus</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(detallecomprobante($comprobante->idComprobante)['asiento'] as $detalle)
                        <tr>
                            <td>{{$detalle->codigo}}</td>
                            <td><b id="subrayado">{{CuentaPlane($detalle->idCuentaPlan)->descripcion}}</b><br><b>{{$detalle->glosa}}</b></td>
                            <td>{{$detalle->debe}}</td>
                            <td>{{$detalle->haber}}</td>
                            <td>{{montoSus($comprobante->tc,$detalle->debe)}}</td>
                            <td>{{montoSus($comprobante->tc,$detalle->haber)}}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            
                            <td class="total">TOTALES : </td>
                            <td>{{detallecomprobante($comprobante->idComprobante)['total_debes']}}</td>
                            <td>{{detallecomprobante($comprobante->idComprobante)['total_habers']}}</td>
                            <td>{{montoSus($comprobante->tc,detallecomprobante($comprobante->idComprobante)['total_debes'])}}</td>
                            <td>{{montoSus($comprobante->tc,detallecomprobante($comprobante->idComprobante)['total_habers'])}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
            <div id="cliente">
                <p><b>SON :  {{convertir(detallecomprobante($comprobante->idComprobante)['total_debes'])}} 00/100 BOLIVIANOS</b></p>
            </div>
        </footer>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
       
        <footer>
            <div id="cliente">
                <p><br>_____________________</b><b id="centro">_____________________</b><b id="firmaizq">_____________________</b>
                    <br><h4 id="datos">GERENTE GENERAL</h4></b><b id="firmadm">ADMINISTRACION<b></b><b id="firmcont">CONTABILIDAD</b>
                </p>
            </div>
        </footer>
       
            
            
    </body>
</html>