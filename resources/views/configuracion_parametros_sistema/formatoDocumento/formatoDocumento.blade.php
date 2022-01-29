@extends('layouts.home')
@section('title')
    <title>Formato Documento</title>
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
                    <form method="POST" action="{{asset('formatoDocumento/update')}}/{{$dato['id']}}">
                        @csrf
                        <input id="id_formato" type="hidden" value="{{$dato['id']}}" >
                        <label class="text-primary " >Impresion en Comprobantes</label> 
                        <br>
                        <div class="mb-3">
                            <label >Habilitar la Referencia en cada Registro </label> 
                            <select  name="habilitar_ref" id="habilitar_ref" required>
                                <option @if ($dato->habilitar_ref == 1) {{ 'selected' }} @endif value="1">SI</option>
                                <option @if ($dato->habilitar_ref == 0) {{ 'selected' }} @endif value="0">NO</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label >Imprimir el Nombre de la Cuenta Mayor en Comprobantes</label> 
                            <select  name="imprimir_nombre_comprobante" id="imprimir_nombre_comprobante" required>
                                <option @if ($dato->imprimir_nombre_comprobante == 1) {{ 'selected' }} @endif value="1">SI</option>
                                <option @if ($dato->imprimir_nombre_comprobante == 0) {{ 'selected' }} @endif value="0">NO</option>
                            </select>
                        </div>
                        <label class="text-primary">Formato en Comprobante y Reportes</label> 
                        <br>
                        <div class="mb-3">
                            <label >Mostrar la fecha y hora de impresion del documento </label> 
                            <select  name="mostrar_fecha_hora" id="mostrar_fecha_hora" required>
                                <option @if ($dato->mostrar_fecha_hora == 1) {{ 'selected' }} @endif value="1">SI</option>
                                <option @if ($dato->mostrar_fecha_hora == 0) {{ 'selected' }} @endif value="0">NO</option>
                            </select>
                        </div>
                        <br>
                        <br>
                        <br>
                    </form>
                @endforeach

                <form id="forformato">
                <button type="submit" class=" btn btn-outline-primary">guardar</button>
                <a href="" class=" btn btn-outline-success">cancelar</a>
                </form>
            </div>
        </div>
    </div>

    

    
    @endsection
   