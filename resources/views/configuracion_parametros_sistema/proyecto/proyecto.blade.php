
@extends('layouts.home')
@section('title')
    <title>Proyecto</title>
@endsection


@section('content')

    <div class="container-fluid">
        <h1 class="text-center" >Control De Parametros Del Sistema</h1>   
        <br>
        <div class="mb-4">
            <a class="btn btn-dark" href="{{asset('moneda')}}"> <i class="bi bi-coin"></i> Moneda</a>
            <a class="btn btn-dark" href="{{asset('formatoDocumento')}}"><i class="bi bi-file-earmark-bar-graph"></i> Formato De Documento</a>
            <a class="btn btn-dark" href="{{asset('firmaReporte')}}"><i class="bi bi-brush"></i> Firma De Reportes</a>
            <a class="btn btn-dark" href="{{asset('proyecto')}}"><i class="bi bi-filter-square"></i> Proyectos</a>
            <a class="btn btn-dark" href="{{asset('asientoLCV')}}"><i class="bi bi-filter-circle"></i> Asientos RCV</a>
            <a class="btn btn-dark" href="{{asset('tipoNivel')}}"> <i class="bi bi-sort-up"></i> Nivel</a>   
        </div>
    
        <div class="card">
            <div class="card-body">
                
                @foreach ($datos as $dato)
                <form method="POST" action="{{asset('proyecto/update')}}/{{$dato['id']}}">
                    @csrf 
                    <input id="id_proyecto" type="hidden" value="{{$dato['id']}}">
                    <div class="mb-3">
                    <label class="text-primary" >Contabilidad Por Proyectos </label> 
                    <br>
                    <label >habilitar Contabilidad Por Proyectos </label> 
                    <select id="habilitar_contabilidad"  name="habilitar_contabilidad" required>
                        <option @if ($dato->habilitar_contabilidad == 0) {{ 'selected' }} @endif value="0">SI</option>
                        <option @if ($dato->habilitar_contabilidad == 1) {{ 'selected' }} @endif value="1">NO</option>
                    </select>   
                    <br>
                    <br>
                    <br>
                    <br>
                    </form>
                    @endforeach
                <form id="forproyecto">
                    <button type="submit" class=" btn btn-outline-primary">guardar</button>
                    <a href="" class=" btn btn-outline-success">cancelar</a>
                </form>
            </div>
        </div>
    </div>
 
   

@endsection
    