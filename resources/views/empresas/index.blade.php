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
                {{--     <form action="{{ route('empresas.destroy',$empresa) }}" method="post">
                    @csrf   
                    {{method_field('DELETE')}} 
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn-danger">   
                    </form>--}}

                    <button type="button" onclick="cargar( {{ $empresa->idEmpresa}})"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#agregar">
                        Eliminar
                    </button>
              
                </td> 
               
            </tr>
            @endforeach
        </tbody>
</table>
</div>

</div>


        

</div>





@endsection


                      <div wire:ignore.self class="modal fade" id="agregar" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Deseas Eliminar??</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="empresasDelete" method="post" id="miFormulario">
                                               @csrf
                                               <input type="hidden" id="id_empresa" name="id_empresa" class="form-control">
                                               <div class="form-group">
                                                       <label for="">Introducir contraseña por favor</label>
                                                       <input type="number" id="clave" name="clave" class="form-control">
                                                   </div>
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-danger"  onclick="Eliminar()">Eliminar</button>
                                                   <input type="submit" class="btn btn-danger" value="Eliminar">
                                                </div>
                                           </form>
                                    </div>
                                </div>
                            </div>
<script>

function cargar(valor)
{
//   alert(valor);
  document.getElementById("id_empresa").value = valor; 
}
    function Eliminar()
    {
        let inputValue = document.getElementById("clave").value; 

        let pass =  parseInt(inputValue);
        if(pass == 1234)
        {
        alert('CORRECTO');
        $.ajax({

            type:'DELETE',
            url:'empresas.destroy' + 1 ,
            data: {
            },
            success:function(data){
               
            },
            error:function (data) {
                
            }
            });
        }
        else
        {
        alert('IN CORRECTO');
        }
    }
</script>