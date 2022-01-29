@extends('layouts.home')
@section('title')
    <title>Page Compra</title>
@endsection

@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Compra",
        "page"=>"Dashboard",
        "subPage"=>"Compra",
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

    <title>LISTA DE REGISTROS DE COMPRAS</title>
  </head>
  <body>
   <div class="container">
       <div class="row">
           <div class="col">
           <h5 class="mt-3">LISTA DE REGISTROS DE COMPRAS</h5>
           </div>
           <div class="col-md-6 text-right">
            <!-- <button class="btn btn-sm btn-primary" wire:click="close_create">Regresar</button> -->
            <button class="mt-3"><a href="{{url('compra/create')}}" class="btn btn-sm btm-primary float-right">REGISTRAR NUEVO</a></button>
        </div>
           <div class="col">
               <a href="{{url('compra/export-excel')}}" class="btn btn-sm btm-primary float-right mt-3">Exportar a Excel</a>
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
            <th scope="col">FECHA</th>
            <th scope="col">NIT</th>
            <th scope="col">PROVEEDOR</th>
            <th scope="col">RAZÓN SOCIAL</th>
            <th scope="col">Nro FACTURA</th>
            <th scope="col">Nro DE DUI</th>
            <th scope="col">Nro AUTORIZACIÓN</th>
            <th scope="col">IMPORTE TOTAL</th>
            <th scope="col">SUB TOTAL</th>
            <th scope="col">IMPORTE EXENTO</th>
            <th scope="col">DESCUENTOS</th>
            <th scope="col">IMPORTE BASE CF-IVA</th>
            <th scope="col">CREDITO FISCAL IVA</th>
            <th scope="col">CODIGO DE CONTROL</th>
            <th scope="col">TIPO DE COMPRA</th>
            <!-- <th>Ice</th> -->
            <th>Acciones</th>

        </tr>

        
        <tbody>
        @foreach($compras as $compra)
        <tr>
            <td>{{$compra->especificacion}}</td>
            <td>{{$compra->sucursal}}</td>
            <td>{{$compra->fecha}}</td>
            <td>{{$compra->nit}}</td>
            <td>{{$compra->proveedor}}</td>
            <td>{{$compra->razonSocial}}</td>
            <td>{{$compra->nroFactura}}</td>
            <td>{{$compra->NumeroDUI}}</td>
            <td>{{$compra->nroAutorizacion}}</td>
            <td>{{number_format($compra->importeTotaldeLaCompra , 2)}}</td>
            <td>{{number_format($compra->subTotal , 2)}}</td>
            <td>{{number_format($compra->importeNoSujetoACreditoFiscal , 2)}}</td>
            <td>{{number_format($compra->descuento , 2)}}</td>
            <td>{{number_format($compra->importeBaseParaCreditoFiscal , 2)}}</td>
            <td>{{number_format($compra->creditoFiscalIva , 2)}}</td>
            <td>{{$compra->codigodeControl}}</td>
            <td>{{$compra->tipoCompra}}</td>
            <!-- <td>{{$compra->ice}}</td> -->
            <td>
            <button><a href="{{url('compra/'.$compra->id.'/edit')}}">Editar </a></button>
            <form action="{{url('compra/'.$compra->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
            </form>
            </td>
        </tr> 
        @endforeach
        </tbody>
        </thead>
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