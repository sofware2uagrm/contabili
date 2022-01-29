@extends('layouts.home')
@section('title')
    <title>Empresa</title>
@endsection
@section('content')

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif
<div class="card">
    <div class="card-header">    
            <div class="row">
                <div class="col-3">
                    <h2>Listado de Empresa</h2>
                </div>
            
                <div class=" col">
                        <a class="btn-lg btn-secondary ml-auto" href="{{url('/empresas/create')}}">Nuevo Registro</a>
                </div>    
            </div>
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
                <img src="{{Storage::url($empresa->logo)}}" width="94" alt="">    
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
                    <a class =" btn-primary btn-sm" href="{{ route('empresas.edit',$empresa) }}">Editar</a>   
                   <br>
                    <a class =" btn-secondary btn-sm" href="{{ route('empresas.show',$empresa) }}">Modificar</a>   
                    <br>
                    <a class =" btn-success btn-sm" href="{{ route('empresas.show',$empresa) }}">Desactivar</a>   
<br>
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


