@extends('layouts.home')
@section('title')
    <title>Asiento RCV</title>
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
                        <form method="POST" action="{{asset('asientoLCV/update')}}/{{$dato['id']}}">
                            @csrf 
                            <input id="id_asiento" type="hidden" value="{{$dato['id']}}">
                            <label class="text-primary " >Modalidad de Asientos Automaticos RCV</label> 
                            <br>
                            <div class="mb-3">
                                <label >Generar Asientos Contables Automaticos para RCV </label> 
                                <select id="generar_asientos"  name="generar_asientos" required>
                                    <option @if ($dato->generar_asientos == 0) {{ 'selected' }} @endif value="0">NINGUNO</option>
                                    <option @if ($dato->generar_asientos == 1) {{ 'selected' }} @endif value="1">ITERACTIVO</option>
                                    <option @if ($dato->generar_asientos == 2) {{ 'selected' }} @endif value="2">AUTOMATICO</option>
                                </select> 
                            </div>
                            <label class="text-primary " >Valor De Impuesto</label> 
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label >Credito Fiscal</label> 
                                        <input id="credito_fiscal" type="text" class="form-control" name="credito_fiscal" value="{{$dato->credito_Fiscal}}" placeholder="escriba su porcenta en numero" required>
                                    </div>
                                    <div class="mb-3">
                                        <label >IT</label> 
                                        <input id="it" type="text" class="form-control" name="it" value="{{$dato->IT}}" placeholder="escriba su porcenta en numero" required>
                                    </div>
                                </div>
                                <div class="col" >

                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                        </form>
                @endforeach
                <form id="forasiento">
                    <button type="submit" class=" btn btn-outline-primary">guardar</button>
                    <a href="#" class=" btn btn-outline-success">cancelar</a>
                </form>
            </div>
        </div>
    </div>





@endsection
   