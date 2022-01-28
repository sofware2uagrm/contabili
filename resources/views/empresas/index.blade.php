@extends('layouts.home')
@section('title')
    <title>Comprobante</title>
@endsection


@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Comprobante",
        "page"=>"Dashboard",
        "subPage"=>"Comprobante",
    ])
@endsection

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">





<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#empresatable').DataTable(
        {

            responsive:true,
            autoWhidh:false,
        
    
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por paginas",
            "zeroRecords": "nada encontrado - disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ registros totales)",
            'search':'buscar:',
            'paginate':{
            'next':'siguiente',
            'previous':'anterior'
        }
        }
            }    );
} );




</script>


      
 @if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif
<div class="card">
    <div class="card-header">
        <strong> Razon Social:{{session('nombre')}}</strong> 
        <strong> Razon Social:{{session('empresa_id')}}</strong> 
        
        <br>
    <a class="btn btn-secondary" href="{{url('/empresas/create')}}">NUEVO  REGISTRO</a>
    </div>
    <div class="card-body">

 
<div class="container-fluid" id="contenidoTabla">
<table id="empresatable" class="table table-light table-sm">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>LOGO</th>
                <th>RAZON SOCIAL</th>
                <th>NIT</th>
                <th>LICENCIA</th>
                <th>TELÉFONO</th>
                <th>CIUDAD </th>
                <th>ACTIVIDAD</th>
                
                <th>SUCURSAL</th>
                <th>ESTADO</th>             
              {{--   <th>RESPONSABLE</th> --}}
                {{-- <th></th> --}}
               {{--  <th>CI RESPONSABLE</th> --}}
                <th></th>
               
               
            </tr>
        </thead>
        <tbody>
            @foreach( $empresas as $empresa)
            <tr>
                <td> <p class="font-italic "> {{ $empresa->idEmpresa}}</p></td>
                <td> 
                <img src="{{Storage::url($empresa->logo)}}" width="100" alt="">    
                </td>

                <td class="font-italic  "> {{ $empresa->razonsocial}}</td>
                <td class="font-italic "> {{ $empresa->nit}}</td>
                <td class="font-italic "> {{ $empresa->licencia}}</td>
                <td class="font-italic "> {{ $empresa->telefono}}</td>
                <td class="font-italic "> {{ $empresa->ciudad}}</td>
              
              <td class="font-italic ">{{ $empresa->actividad}}</td>
              
              <td class="font-italic ">{{ $empresa->sucursal}}</td>
              <td class="font-italic ">{{ $empresa->estado}}</td>
                
                


{{-- 
              <td class="font-italic ">{{ $empresa->responsable}}</td> --}}

        {{--       <td class="font-italic ">{{ $empresa->ci_responsable}}</td> --}}
                <td>
                    <a class ="btn btn-primary btn-sm" href="{{ route('empresas.edit',$empresa) }}">Editar</a>   
                    <a class ="btn btn-primary btn-sm" href="{{ route('empresas.show',$empresa) }}">Modifcar</a>   

                {{-- </td>
                <td>  --}}
                    <form action="{{ route('empresas.destroy',$empresa) }}" method="post">
                    @csrf
                    {{method_field('DELETE')}} 
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">   
                    </form>
              
                </td> 
               
            </tr>
            @endforeach
        </tbody>
</table>
</div>

</div>


        

</div>





@endsection


