@extends('layouts.home')
@section('title')
    <title>Moneda</title>
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
                  
                    <form  method="POST" action="">
                        @csrf
                        <input id="id_aux" type="hidden" value="{{$idaux}}">
                            <label >Moneda </label> 
                            <select  id="id_moneda"  name="id_moneda"  required>
                                @foreach ($datos as $dato)
                                <option @if ($dato->estado == 1) {{ 'selected' }} @endif value="{{$dato->idMoneda}}">{{$dato->descripcion}}({{$dato->breve}})</option>
                                @endforeach
                            </select>   
                        <br>
                        <br>
                        <br>
                        <br>
                    </form>
            
                    <form id="formoneda">
                        <button type="submit" class=" btn btn-outline-primary">guardar</button>
                        <a href="" class=" btn btn-outline-success">cancelar</a>
                    </form>
                </div>
            </div>
        
    </div>

    
@endsection
   

