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


