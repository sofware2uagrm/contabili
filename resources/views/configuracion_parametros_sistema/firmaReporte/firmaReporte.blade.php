@extends('layouts.home')
@section('title')
    <title>Firma Reporte</title>
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

        <div class="card" >
            <div class="card-body" >
                <div class="row">
                    @php($contador=1)
                        
                    @foreach ($firmaReporte as $firma)
                        <div class="col-sm-auto">
                            @php($sw=$firma['activo_opcion'])
                            <div class="card text-dark bg-light mb-3  " style="max-width: 18rem;">
                                <div class="card-header">{{$firma['nombre_reporte']}}
                                </div>
                                <div class="card-body">
                                    <form  method="POST" action="{{asset('firmaReporte/update')}}/{{$firma['id']}}">
                                        @csrf
                                        <input id="form{{$contador}}id_firma" type="hidden" value="{{$firma['id']}}">
                                        <label >1ra Firma</label>
                                        <input type="text" class="form-control" id="form{{$firma['id']}}firma1" name="firma1" value="{{$firma['firma1']}}">
                                        <br>
                                        <label >2da Firma</label>
                                        <input type="text" class="form-control" id="form{{$firma['id']}}firma2" name="firma2"  value="{{$firma['firma2']}}">
                                        <br>
                                        <label >3ra Firma</label>
                                        <input type="text" class="form-control" id="form{{$firma['id']}}firma3" name="firma3" value="{{$firma['firma3']}}">    
                                        <br>
                                        @if ($sw==1) 
                                            <label > firma del interesado
                                                <select name="firma_interesado" id="form{{$firma['id']}}firma_interesado" value="" required>
                                                    <option @if ($firma->opcion_firma_enteresado == 1) {{ 'selected' }} @endif value="1">SI</option>
                                                    <option @if ($firma->opcion_firma_enteresado == 0) {{ 'selected' }} @endif value="0">NO</option>
                                                </select>
                                            </label>  
                                            <br>  
                                        @else 
                                            <br>   
                                        @endif 
                                    </form>  
                                </div>
                            </div> 
                        </div>
                        @php($contador++)
                    @endforeach
                    <input type="hidden" value="{{$contador}}" id="contador" name="contador">
                    <br>
                    <br>
                </div>
                <div class="mb-3">
                    <form id="guardaTodoFirma">
                        <button type="submit" class="btn btn-outline-primary" >guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection




  
   