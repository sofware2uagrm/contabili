@extends('layouts.home')
@section('title')
@section('content')
@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Venta",
        "page"=>"Dashboard",
        "subPage"=>"Venta",
    ])
@endsection

@section('content')
   
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   
  </head>
  <body>
   <div class="container">
       <div class="row">
           <div class="col">
           <h5 class="mt-3">LISTA DE REGISTROS DE VENTAS</h5>
           </div>
           <div class="col-md-6 text-right">
            <!-- <button class="btn btn-sm btn-primary" wire:click="close_create">Regresar</button> -->
            <button class="mt-3"><a href="{{url('venta/create')}}" class="btn btn-sm btm-primary float-right">REGISTRAR NUEVO</a></button>
        </div>
           <div class="col">
               <a href="{{url('venta/export-excel')}}" class="btn btn-sm btm-primary float-right mt-3">Exportar a Excel</a>
           </div>
       </div>
      <div class="row">
        <div class="col">
        <table class="table table-bordered table-hover mt-3">
        <thead class="thead-dark">
        <tr>
            <!-- <th>#</th> -->
            <th scope="col">ESPECIFICACION</th>
            <th scope="col">SUCURSAL</th>
            <th scope="col">NIT</th>
            <th scope="col">Nro FACTURA</th>
            <th scope="col">RAZÓN SOCIAL</th>
            <th scope="col">Nro AUTORIZACIÓN</th>
            <th scope="col">ESTADO DE FACTURA</th>
            <th scope="col">CODIGO DE CONTROL</th>
            <th scope="col">FECHA</th>
            <th scope="col">IMPORTE TOTAL</th>
            <th scope="col">ICE / IEHD / TASAS</th>
            <th scope="col">TASA CERO</th>
            <th scope="col">EXPORTACIONES EXENTAS</th>
            <th scope="col">SUBTOTAL</th>
            <th scope="col">DESCUENTOS</th>
            <th scope="col">IMPORTE BASE</th>
            <th scope="col">DEBITO FISCAL</th>
            
            <th>Acciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)
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

            <td>
            <button><a href="{{url('venta/'.$venta->id.'/edit')}}">Editar </a></button>
            <form action="{{url('venta/'.$venta->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
            </form>
            </td>
        </tr> 
        @endforeach
        </tbody>
     
        </table>
        </div>  
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
@endsection


