@extends('layouts.home')
@section('title')
    <title>Niveles</title>
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
                <div class="mb-4">
                    <label class="text-primary" >Nivel</label> 
                </div>
                @php($sw=1)
                @php($codigo="")
                @php($cad="")
                @php($c=1)

                @foreach( $datos as $dato ) 
                    @php($c=1)
                    @while ($c <= $dato->tipoNivel ) 
                        @php($cad=$cad ."x" )
                        @php($c=$c+1)
                    @endwhile
                    @php($codigo=$codigo .".". $cad ) 
                    @if($sw==1)
                        @php($sw=0)
                        @php($codigo=$cad)
                    @endif
                    @php($cad="")
                @endforeach
                
                <div  class="mb-3">
                    <input  class="form-control-lg form-control form-control-border text-uppercase"  type="text" value="{{$codigo}}">
                </div>

                @php($contador=1)
                @foreach ($datos as $dato)
                    <form  method="POST" action="{{asset('tipoNivel/update')}}/{{$dato['id']}}">
                        @csrf 
                        <input id="form{{$contador}}id_nivel" type="hidden" value="{{$dato['id']}}">
                        <label >nivel {{ $dato->nivel }} </label> 
                        <select id="form{{$dato['id']}}Tipo_nivel"  name="form{{$dato['id']}}Tipo_nivel" required>
                            @php($cantidad=1)
                            @php($n=$dato->nivel)
                            @if ($n==1)
                                @php($n++)
                            @endif
                            @while ($cantidad <= $n)
                               
                               <option @if ($dato->tipoNivel == $cantidad) {{ 'selected' }} @endif value="{{$cantidad}}">{{$cantidad}}</option>
                           
                               @php($cantidad++)
                            @endwhile
                            {{--<option @if ($dato->tipoNivel == 1) {{ 'selected' }} @endif value="1">1</option>
                            <option @if ($dato->tipoNivel == 2) {{ 'selected' }} @endif value="2">2</option>
                            <option @if ($dato->tipoNivel == 3) {{ 'selected' }} @endif value="3">3</option>
                            <option @if ($dato->tipoNivel == 4) {{ 'selected' }} @endif value="4">4</option>
                            <option @if ($dato->tipoNivel == 5) {{ 'selected' }} @endif value="5">5</option>
                            <option @if ($dato->tipoNivel == 6) {{ 'selected' }} @endif value="6">6</option>--}}
                        </select>   
                    </form>
                    @php($contador++)
                    <br>
                @endforeach

                <input type="hidden" value="{{$contador}}" id="contador" name="contador">
    
                <form id="prueba">
                    <button class="btn btn-outline-primary" type="submit"> guardar </button>
                </form>
            </div>
        </div>
    </div>

    
   @endsection

   
    
 


