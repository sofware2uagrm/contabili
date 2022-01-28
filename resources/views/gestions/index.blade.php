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

<div class="card">
    <strong> Razon Social:{{session('nombre')}}</strong> 

<div><a class="btn btn-secondary" href="{{url('/gestions/create')}}">NUEVO  REGISTRO</a> </div>
<table id="gestiontable" class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>DESCRIPCION</th>
                <th>FECHA DE INICIO</th>
                <th>FECHA DE FINAL</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $gestions as $gestion)
            <tr>
                <td> {{ $gestion->id}}</td>
              

                <td> {{ $gestion->descripcion}}</td>
                <td> {{ $gestion->fecha_ini}}</td>
                <td> {{ $gestion->fecha_fin}}</td>

                  <td>
                    <a class ="btn btn-primary btn-sm" href="{{ route('gestions.edit',$gestion) }}">
                    Editar 
                   <br> 
                </a>     
              
               <td> 
                        <form action="{{ route('gestions.destroy',$gestion) }}" method="post">
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

@stop