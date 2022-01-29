<div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button wire:click='reset_nivel_1' type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#agregar">
                                Agregar Cuenta
                            </button>
                            <button wire:click='reset_nivel_1' type="button" tabindex="-1" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#listar">
                                Configuracion
                            </button>
                            <div wire:ignore.self class="modal fade" id="agregar" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Agregar Cuenta</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Descripcion</label>
                                                <input type="text" wire:model='descripcion_nivel1' class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" wire:click='nivel_1_cuenta'>Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('pdf') }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-file-pdf" aria-hidden="true"></i>
                            </a>

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cuenta-especifica">
                              Cuentas Especificas
                            </button>
                            
                            <!-- Modal -->
                            <div wire:ignore.self class="modal fade" id="cuenta-especifica" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">CUENTAS ESPECIFICAS</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card text-left">
                                              <div class="card-header">
                                                @if ($table_plan_cuenta)
                                                    PLAN DE CUENTAS                                                    
                                                @else
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                        <button wire:click='show_cuenta_nivel1()' class='btn btn-success btn-sm btn-block'>CUENTA DE RESULTADO</button>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <button wire:click='show_cuenta_nivel2()' class='btn btn-danger btn-sm btn-block' >DESCUENTO Y BONIFICACION</button>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <button wire:click='show_cuenta_nivel3()' class='btn btn-primary btn-sm btn-block'> DEBITO Y CREDITO</button>
                                                      </div>
                                                  </div>
                                                @endif
                                              </div>  
                                              <div class="card-body">
                                                @if ($table_plan_cuenta)
                                                    @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
                                                        <div class="container">
                                                            <div class="row border">
                                                                <div class="col-md-2">{{ $key1+1 }}</div>
                                                                <div class="col-md-6">{{ $cuenta1->descripcion }}</div>

                                                            </div>
                                                            @foreach (nivel_2_cuentas($cuenta1->idCuentaPlanTipo) as $key2 => $cuenta2)
                                                                <div class="container">
                                                                    <div class="row border">
                                                                        <div class="col-md-2">{{$key1+1}}0{{$key2+1}}</div>
                                                                        <div class="col-md-6">{{ $cuenta2->descripcion }}</div>
        
                                                                    </div>
                                                                    @foreach (nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan) as $key3 => $cuenta3)
                                                                        <div class="container">
                                                                            <div class="row border">
                                                                                <div class="col-md-2">{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}</div>
                                                                                <div class="col-md-6">{{ $cuenta3->descripcion }}</div>
                                                                            </div>
                                                                            @foreach (nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan) as $key4 => $cuenta4)
                                                                                <div class="container">
                                                                                    <div class="row border">
                                                                                        <div class="col-md-2">{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}</div>
                                                                                        <div class="col-md-6">{{ $cuenta4->descripcion }}</div>
                                                                                    </div>
                                                                                    @foreach (nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan) as $key5 => $cuenta5)
                                                                                        <div class="container">
                                                                                            <div class="row border">
                                                                                                <div class="col-md-2">{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}0{{$key5+1}}</div>
                                                                                                <div class="col-md-6">{{ $cuenta5->descripcion }}</div>
                                                                                                <div class="col-md-4">
                                                                                                    <button wire:click="seleccionar_cuenta_especifica({{$cuenta5->idCuentaPlan}},{{$key1+1}},{{$key2+1}},{{$key3+1}},{{$key4+1}},{{$key5+1}})" class='btn btn-sm btn-secondary'> <i class="fa fa-check" aria-hidden="true"></i> </button>    
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @if ($interfaz_cuenta_especifica==1)
                                                        @foreach (get_cuentas_especificas_nivel_1() as $key => $cuenta1)
                                                            <div class="form-group">
                                                                <label for="">{{$cuenta1->tipo_cuenta}}</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <button wire:click='mostrar_plan_cuenta({{$cuenta1->id}})' class='btn btn-primary btn-sm'>Seleccionar</button>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        @if (!is_null($cuenta1->idCuentaPlan))
                                                                            <div class="alert alert-sm alert-primary" role="alert">
                                                                                <strong> {{ $cuenta1->codigo_cuenta }} .- {{cuenta_plan($cuenta1->idCuentaPlan)->descripcion}}</strong>
                                                                            </div>
                                                                        @else
                                                                            <div class="alert alert-danger" role="alert">
                                                                                Ninguna Cuenta Seleccionada
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @if ($interfaz_cuenta_especifica==2)
                                                        @foreach (get_cuentas_especificas_nivel_2() as $key => $cuenta2)
                                                            <div class="form-group">
                                                                <label for="">{{$cuenta2->tipo_cuenta}}</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <button wire:click='mostrar_plan_cuenta({{$cuenta2->id}})' class='btn btn-primary btn-sm'>Seleccionar</button>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        @if (!is_null($cuenta2->idCuentaPlan))
                                                                            <div class="alert alert-sm alert-primary" role="alert">
                                                                                <strong> {{ $cuenta2->codigo_cuenta }} .- {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}}</strong>
                                                                            </div>
                                                                        @else
                                                                            <div class="alert alert-danger" role="alert">
                                                                                Ninguna Cuenta Seleccionada
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    @if ($interfaz_cuenta_especifica==3)
                                                        @foreach (get_cuentas_especificas_nivel_3() as $key => $cuenta3)
                                                            <div class="form-group">
                                                                <label for="">{{$cuenta3->tipo_cuenta}}</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <button wire:click='mostrar_plan_cuenta({{$cuenta3->id}})' class='btn btn-primary btn-sm'>Seleccionar</button>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        @if (!is_null($cuenta3->idCuentaPlan))
                                                                            <div class="alert alert-sm alert-primary" role="alert">
                                                                                <strong>{{ $cuenta3->codigo_cuenta }} .- {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}}</strong>
                                                                            </div>
                                                                        @else
                                                                            <div class="alert alert-danger" role="alert">
                                                                                Ninguna Cuenta Seleccionada
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach 
                                                    @endif
                                                @endif
                                                <div wire:ignore.self class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Seleccionar Cuenta</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                LISTA DE CUENTAS
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            @if ($table_plan_cuenta)
                                                {{cuenta_especifica($cuenta_especifica_id)->cuenta_especifica}} - 
                                                {{cuenta_especifica($cuenta_especifica_id)->tipo_cuenta}}  
                                            @else
                                                SELECIONE UNA CUENTA ESPECIFICA
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>



                            
<!------------------------------------- INICIO MODAL LISTADO------------------------------------------------->
                    <div wire:ignore.self class="modal fade" id="listar" tabindex="-1" role="dialog"
                    aria-labelledby="modelTitleId" aria-hidden="true">
                    <div style="width: 700px !important" class="modal-dialog" role="document">
                        <div style="width: 700px !important;" class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Configuracion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="bd-example bd-example-tabs">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                          <li class="nav-item">
                                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Flujo de Efectivo</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Moneda</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Rubo Ajuste</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="contact" aria-selected="false">Plan de cuentas en detalle</a>
                                          </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                          <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <table class="table text-center">
                                                <thead>
                                                  <tr>
                                                        <th scope="col">CUENTA</th>
                                                    <th scope="col">NOMBRE DE CUENTA</th>
                                                    <th scope="col">CLASIFICACION</th>
                                                    <th scope="col">ACCION</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                            @foreach (listadoEfectivo() as  $cuenta12)
                                                <tr class="container">
                                                       <td>{{ $cuenta12->id }}</td>
                                                       <td>{{ $cuenta12->nombre }}</td>
                                                       <td>{{ $cuenta12->descripcion }}</td>
                                                       
                                                       <td>
                                                            <button  onclick="mandar(<?php echo $cuenta12->id  ?>, <?php echo $cuenta12->id_flujo_efectivo ?>,'Efectivo')" type="button" tabindex="-1" class="btn btn-primary btn-sm modal-open" data-toggle="modal" data-target="#config">
                                                                Configuracion
                                                            </button>
                                                        </td>
                                                    </tr>
                                             @endforeach
                                             
                                            </tbody>
                                        </table>
                                              
                                        </div>
                                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <table class="table text-center">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">CUENTA</th>
                                                    <th scope="col">NOMBRE DE CUENTA</th>
                                                    <th scope="col">MONEDA</th>
                                                    <th scope="col">ACCION</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (listadoMoneda() as  $cuenta12)
                                                    <tr class="container">
                                                           <td> {{ $cuenta12->id }}</td>
                                                           <td>  {{ $cuenta12->name }}</td>
                                                           <td>  {{ $cuenta12->description }}</td>
                                                           <td>
                                                            <button  onclick="mandar(<?php echo $cuenta12->id  ?>, <?php echo $cuenta12->id_moneda ?>,'Moneda')" type="button" tabindex="-2" class="btn btn-primary btn-sm modal-open" data-toggle="modal" data-target="#config">
                                                                Configuracion
                                                            </button>
                                                            </td>
                                                    </tr>
                                                    @endforeach
                                                
                                                </tbody>
                                              </table>
                                        </div>
                                          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <table class="table text-center">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">CUENTA</th>
                                                    <th scope="col">NOMBRE DE CUENTA</th>
                                                    <th scope="col">RUBRO AJUSTE</th>
                                                    <th scope="col">ACCION</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                            @foreach (listadoRubro() as  $cuenta12)
                                            <tr class="container">
                                                    <th>{{ $cuenta12->id }}</th>
                                                    <th>{{ $cuenta12->name }}</th>
                                                    <th>{{ $cuenta12->description }}</th>
                                                    <td>
                                                        <button  onclick="mandar(<?php echo $cuenta12->id  ?>, <?php echo $cuenta12->id_rubro_ajuste ?>,'Rubro')" type="button" tabindex="-2" class="btn btn-primary btn-sm modal-open" data-toggle="modal" data-target="#config">
                                                            Configuracion
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach 
                                                 </tbody>
                                             </table>
                                        </div>
                                          <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                            <table class="table text-center">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">CUENTA</th>
                                                    <th scope="col">NOMBRE DE CUENTA</th>
                                                    <th scope="col">FLUJO EFECTIVO</th>
                                                    <th scope="col">MONEDA</th>
                                                    <th scope="col">RUBRO AJUSTE</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                            @foreach (listadoAll() as  $cuenta12)
                                            <tr class="container">
                                                    <th>{{ $cuenta12->idCuentaPlan }} </th>
                                                    <th>{{ $cuenta12->descripcion }} </th>
                                                    <th>{{ $cuenta12->fluName }} </th>
                                                    <th>{{ $cuenta12->rubName  }} </th>
                                                    <th>{{ $cuenta12->monName  }}</th>
                                                </tr>
                                            @endforeach 
                                                  </tbody>
                                              </table>
                                        </div>
                                        </div>
                                      </div>
                                </div>
                            </div>                             
                        </div>
                    </div>
                </div>
<!------------------------------------- FIN MODAL LISTADO------------------------------------------------->
<script>
// $(document).on("click", ".modal-open", function () {
//     var foroId= $(this).attr('data-item-foro-id');
//     $("#foro_id").val(foroId);

// });


function mandar(value1,value2,tipo){
$("#id_plan_new").val(value1);

if(tipo == 'Efectivo') 
{
    $("#id_plan_flujo").val(value2);
    $("#id_moneda").val(null);
    $("#id_rubro").val(null);

    document.getElementById('numero_1').style.display = 'inline';
    document.getElementById('numero_2').style.display = 'none';
    document.getElementById('numero_3').style.display = 'none';
}
// }
if(tipo == 'Moneda') 
{

    $("#id_moneda").val(value2);
    $("#id_plan_flujo").val(null);
    $("#id_rubro").val(null);
    document.getElementById('numero_1').style.display = 'none';
    document.getElementById('numero_2').style.display = 'inline';
    document.getElementById('numero_3').style.display = 'none';
}
if(tipo == 'Rubro') 
{
    $("#id_rubro").val(value2);
    $("#id_moneda").val(null);
    $("#id_plan_flujo").val(null);
    document.getElementById('numero_1').style.display = 'none';
    document.getElementById('numero_2').style.display = 'none';
    document.getElementById('numero_3').style.display = 'inline';
}
}



</script>
<!------------------------------------- INICIO MODAL CONFIGURAR------------------------------------------------->
<div   class="modal fade" id="config"  tabindex="-1"  role="dialog"  
aria-labelledby="modelTitleId" aria-hidden="true" >
<div  class="modal-dialog" role="document">
<div   class="modal-content" style="width: 676px !important; margin-top: 47px !important">
    <div class="modal-header">
        <h5 class="modal-title">CONFIGURACION DE CUENTA </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="POST" action="planUpdate">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
    <div class="modal-body text-left">
        <div class="form-group">
            <label for="">Nueva configuracion</label>
            <input type="hidden" name="id_plan_new" id="id_plan_new" value="">
            <input type="hidden" name="id_plan_flujo" id="id_plan_flujo" value="">
            <input type="hidden" name="id_moneda" id="id_moneda" value="">
            <input type="hidden" name="id_rubro" id="id_rubro" value="">
        </div>

       <div class="numero_1 row"  id="numero_1" >
           <div class="col-md-12">
            <label> listado Flujo</label>
            <div class="form-group">
                <select name="id_plan_flujo_new" id="id_plan_flujo_new" class="form-control" >
                    @foreach(listadoFlujoEfectivo() as $item)
                        <option value="{{ $item->id_flujo_efectivo }}" >
                            {{ $item->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
           </div>
       </div>




       <div class="numero_2" id="numero_2">
        Listado Moneda
        <div class="form-group">

            <select name="id_moneda_new" id="id_moneda_new" class="form-control">
                @foreach(listadoMonedax() as $item)
                    <option value="{{ $item->idMoneda }}" >
                        {{ $item->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
       </div>

       <div class="numero_3" id="numero_3">
        <label>Listado Rubro</label>
        <div class="form-group">

            <select name="id_rubro_ajuste_new" id="id_rubro_ajuste_new" class="form-control" >
                @foreach(listadoRubrox() as $item)
                    <option value="{{ $item->id_rubro_ajuste }}" >
                        {{ $item->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
       </div>

       

    </div>
    <div class="modal-footer">
        {{-- <button type="button" class="btn btn-primary" >Actualizar</button> --}}
        <input type="submit" class="btn btn-primary" value="Actualizar"
    </div>
</form>
</div>
</div>
</div>
<!------------------------------------- FIN MODAL CONFIGURAR------------------------------------------------->
<!------------------------------------- INICIO MODAL CONFIGURAR------------------------------------------------->
<div class="modal fade" id="config2"  tabindex="-2"  role="dialog"  
aria-labelledby="modelTitleId" aria-hidden="true" >
<div  class="modal-dialog" role="document">
<div   class="modal-content" style="width: 676px !important; margin-top: 47px !important">
    <div class="modal-header">
        <h5 class="modal-title">CONFIGURACION DE CUENTA - MONEDA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="POST" action="planUpdate">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
    <div class="modal-body">
        {{-- <div class="form-group">
            <label for="">Descripcion</label>
            <input type="text" name="id_plan2" id="id_plan2" value="">
            <input type="text" name="id_moneda" id="id_moneda" value="">
        </div>

        listadoFlujoEfectivo
        <div class="form-group">

            <select name="id_moneda_new" id="id_moneda_new" >
                @foreach(listadoFlujoEfectivo() as $item)
                    <option value="{{ $item->id_flujo_efectivo }}" >
                        {{ $item->nombre }}
                    </option>
                @endforeach
            </select>
        </div> --}}


    </div>
    <div class="modal-footer">
        {{-- <button type="button" class="btn btn-primary" >Actualizar</button> --}}
        <input type="submit" class="btn btn-primary" value="Actualizar"
    </div>
</form>
</div>
</div>
</div>
<!------------------------------------- FIN MODAL CONFIGURAR------------------------------------------------->

                        </div>
                    </div>
                </div>

              

                <div class="card-body">
                    @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
                        <div class="border p-1">
                            {{-- FINALIZADO --}}
                            <div class="row">
                                {{-- <div class="col-md-5">{{ $cuenta1->idCuentaPlanTipo }}</div> --}}
                                <div class="col-md-5"> <strong><span style="text-transform: uppercase;  "> {{ $key1+1 }}. </span></strong></div>
                                <div class="col-md-4"><strong> <span style="text-transform: uppercase; "> {{ $cuenta1->descripcion }} </span></strong></div>
                                <div class="col-md-3 text-right">


                               

                                    <!-- Button trigger modal update-->
                                    <button wire:click='loading_cuenta1({{$cuenta1->idCuentaPlanTipo}})' type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#update-tipo{{$cuenta1->idCuentaPlanTipo}}">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </button>
                                    
                                    <!-- Modal update-->
                                    <div wire:ignore.self class="modal fade" id="update-tipo{{$cuenta1->idCuentaPlanTipo}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modificar {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    {{-- <div class="form-group">
                                                        <label for="">Nivel</label>
                                                        <input type="text" name="" id=""  value="Nivel 1" class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div> --}}

                                                    <div class="form-group">
                                                        <label for="">Codigo</label>
                                                        <input type="text" name="" id=""  value="{{$key1+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Descripcion</label>
                                                        <input type="text" wire:model='descripcion_nivel1' class="form-control"
                                                            value="{{ $descripcion_nivel1 }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" wire:click='update_nuvel1({{$cuenta1->idCuentaPlanTipo}})' class="btn btn-primary"  data-dismiss="modal">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button trigger modal add-->
                                    <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#cuenta2{{ $cuenta1->idCuentaPlanTipo}}">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                    <!-- Modal add-->
                                    <div wire:ignore.self class="modal fade" id="cuenta2{{ $cuenta1->idCuentaPlanTipo}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Agregar Cuenta</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    {{-- <div class="form-group">
                                                        <label for="">Nivel</label>
                                                        <input type="text" name="" id=""  value="Nivel 2" class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label for="">Tipo</label>
                                                        <input type="text" name="" id=""  value="{{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="">Cuenta Mayor</label>
                                                        <input type="text" name="" id=""  value=" {{$key1+1}} " class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div> --}}

                                                    <div class="form-group">
                                                        <label for="">Descripcion</label>
                                                        <input type="text" name="" id="" wire:model='descripcion_nivel2' class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" wire:click='nivel_2_cuenta({{$cuenta1->idCuentaPlanTipo}})' class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#cuenta1-delete-{{$cuenta1->idCuentaPlanTipo}}">
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="cuenta1-delete-{{$cuenta1->idCuentaPlanTipo}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Eliminar - {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <div class="alert alert-danger" role="alert">
                                                    Esta seguro de eliminar {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}?
                                                    <p>Se eliminaran todas las sub cuentas!!</p>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" wire:click='delete_cuenta1({{$cuenta1->idCuentaPlanTipo}})' data-dismiss="modal">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#key_1{{$key1}}" aria-expanded="false" aria-controls="key_1{{$key1}}">
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </button>
                                  
    

                                </div>
                            </div>
                            {{-- FINALIZADO --}}
                            <div wire:ignore.self class="collapse" id="key_1{{$key1}}">
                                <div class="card card-body">
                                    @if (count(nivel_2_cuentas($cuenta1->idCuentaPlanTipo))>0)
                                        

                                    @foreach (nivel_2_cuentas($cuenta1->idCuentaPlanTipo) as $key2 => $cuenta2)
                                        <div class="border p-1">
                                            {{-- FINALIZADO --}}
                                            <div class="row">
                                                <div class="col-md-5"><strong> {{$key1+1}}0{{$key2+1}} </strong></div>
                                                <div class="col-md-4"><strong>{{$cuenta2->descripcion}}</strong></div>
                                                <div class="col-md-3 text-center">
                                                    
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#modelId{{$cuenta2->idCuentaPlan}}">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div wire:ignore.self class="modal fade" id="modelId{{$cuenta2->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Agregar Cuenta</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    {{-- <div class="form-group">
                                                                        <label for="">Nivel </label>
                                                                        <input type="text" name="" id=""  value="Nivel 3" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div> --}}

                                                                    {{-- - {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}} - {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} --}}
                                                                    <div class="form-group">
                                                                        <label for="">Tipo</label>
                                                                        <input type="text" name="" id=""  value="{{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div>

                                                                    {{-- <div class="form-group">
                                                                        <label for="">Cuenta Mayor</label>
                                                                        <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div> --}}
                
                                                                    {{-- <div class="form-group">
                                                                        <label for="">Nombre Cuenta Mayor</label>
                                                                        <input type="text" name="" id=""  value=" {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div> --}}
                                                                    <div class="form-group">
                                                                        <label for="">Descripcion</label>
                                                                        <input type="text" name="" id="" wire:model='descripcion_nivel3' class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" wire:click='nivel_3_cuenta({{$cuenta1->idCuentaPlanTipo}},{{$cuenta2->idCuentaPlan}})' class="btn btn-primary">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#delete{{$cuenta2->idCuentaPlan}}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="delete{{$cuenta2->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Eliminar - {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}} - {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="alert alert-danger" role="alert">
                                                                    Esta seguro de eliminar {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}}?
                                                                    <p>Se eliminaran todas las sub cuentas!!</p>ññs
                                                                </div>
                                                            </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" wire:click='delete_cuenta2({{$cuenta2->idCuentaPlan}})' class="btn btn-sm btn-danger" data-dismiss="modal">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Button trigger modal -->
                                                    <button wire:click='loading_cuenta2({{$cuenta2->idCuentaPlan}})' type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#update_nivel2{{$cuenta2->idCuentaPlan}}">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div wire:ignore.self class="modal fade" id="update_nivel2{{$cuenta2->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Modificar {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}} </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    {{-- <div class="form-group">
                                                                        <label for="">Nivel </label>
                                                                        <input type="text" name="" id=""  value="Nivel 2" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div> --}}
                                                                    {{-- {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} --}}

                                                                    
                                                                    <div class="form-group">
                                                                        <label for="">Tipo</label>
                                                                        <input type="text" name="" id=""  value="{{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div>
                                                                    {{-- <div class="form-group">
                                                                        <label for="">Cuenta Mayor</label>
                                                                        <input type="text" name="" id=""  value="{{$key1+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div> --}}

                                                                    <div class="form-group">
                                                                        <label for="">Codigo Cuenta</label>
                                                                        <input type="text" name="codigo2" id="codigo2"  value="{{$key1+1}}0{{$key2+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div>

                                                                    
                
                
                                                                    <div class="form-group">
                                                                        <label for="">Descripcion</label>
                                                                        <input type="text" name="" id="" wire:model='descripcion_nivel2' class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button wire:click='update_nuvel2(({{$key1+1}}0{{$key2+1}}), {{$cuenta2->idCuentaPlan}})' type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_2{{$key1+1}}0{{$key2+1}}" aria-expanded="false" aria-controls="key_2{{$key1+1}}0{{$key2+1}}">
                                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            {{-- FINALIZADO --}}
                                            <div wire:ignore.self class="collapse" id="key_2{{$key1+1}}0{{$key2+1}}">
                                                @if (count(nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan))>0)
                                                    @foreach (nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan) as $key3 => $cuenta3)
                                                        <div class="border p-1">

                                                            <div class="row">
                                                                {{-- {{$cuenta1->idCuentaPlanTipo}}.&nbsp; {{$cuenta3->idCuentaPlan}}. --}}
                                                                <div class="col-md-5">{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}</div>
                                                                <div class="col-md-4">{{$cuenta3->descripcion}}</div>
                                                                <div class="col-md-3 text-center">

                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#add_nivel3{{$cuenta3->idCuentaPlan}}">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div wire:ignore.self class="modal fade" id="add_nivel3{{$cuenta3->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Agregar - Cuenta
                                                                                        {{-- {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}} - {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} - {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}} --}}
                                                                                    </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                </div>
                                                                                <div class="modal-body text-left">
                                                                                    {{-- <div class="form-group">
                                                                                        <label for="">Nivel </label>
                                                                                        <input type="text" name="" id=""  value="Nivel 4" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div> --}}
                                                                                    {{-- {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} --}}
                    
                                                                                    
                                                                                    <div class="form-group">
                                                                                        <label for="">Tipo</label>
                                                                                        <input type="text" name="" id=""  value="{{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div>
                                                                                    {{-- <div class="form-group">
                                                                                        <label for="">Cuenta Mayor</label>
                                                                                        <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div> --}}
                    
                                                                                    <div class="form-group">
                                                                                        <label for="">Codigo Cuenta</label>
                                                                                        <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="">Descripcion</label>
                                                                                        <input type="text" name="" id="" wire:model='descripcion_nivel4' class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" wire:click='nivel_4_cuenta({{$cuenta1->idCuentaPlanTipo}},{{$cuenta3->idCuentaPlan}})' class="btn btn-primary">Guardar</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#delete{{$cuenta3->idCuentaPlan}}">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </button>
                                                                    
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="delete{{$cuenta3->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Eliminar - {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}}</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="alert alert-danger" role="alert">
                                                                                    Seguro que desea eliminar {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}}?
                                                                                </div>
                                                                                
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" wire:click='delete_cuenta3({{$cuenta3->idCuentaPlan}})' class="btn btn-danger btn-sm" data-dismiss="modal">
                                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Button trigger modal -->
                                                                    <button wire:click='loading_cuenta3({{$cuenta3->idCuentaPlan}})' type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#update-nivel3-{{$cuenta3->idCuentaPlan}}">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                                    </button>
                                                                    
                                                                    <!-- Modal -->
                                                                    <div wire:ignore.self class="modal fade" id="update-nivel3-{{$cuenta3->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Modificar - Cuenta
                                                                                        {{-- {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}} --}}
                                                                                    </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                </div>
                                                                                <div class="modal-body text-left">
                                                                                    <div class="form-group">
                                                                                        <label for="">Nivel </label>
                                                                                        <input type="text" name="" id=""  value="Nivel 3" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div>
                                                                                    {{-- {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} --}}
                    
                                                                                    
                                                                                    <div class="form-group">
                                                                                        <label for="">Tipo</label>
                                                                                        <input type="text" name="" id=""  value="{{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Cuenta Mayor</label>
                                                                                        <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div>
                    
                                                                                    <div class="form-group">
                                                                                        <label for="">Codigo Cuenta</label>
                                                                                        <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div>

                                
                                                                                    <div class="form-group">
                                                                                        <label for="">Descripcion</label>
                                                                                        <input type="text" name="" id="" wire:model='descripcion_nivel3' class="form-control" placeholder="" aria-describedby="helpId">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button wire:click='update_nuvel3(({{$key1+1}}0{{$key2+1}}0{{$key3+1 }}),{{$cuenta3->idCuentaPlan}})' type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}" aria-expanded="false" aria-controls="{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                    </a>


                                                                </div>


                                                            </div>
                                                            <div wire:ignore.self class="collapse" id="{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                            @if (count(nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan))>0)
                                                                @foreach (nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan) as $key4 => $cuenta4)
                                                                    <div class="border p-1">

                                                                        <div class="row">
                                                                            <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}</div>
                                                                            <div class="col-md-4">{{$cuenta4->descripcion}}</div>
                                                                            <div class="col-md-3 text-center">
                                                                                
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#final-nivel{{$cuenta4->idCuentaPlan}}">
                                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                                </button>
                                                                                
                                                                                <!-- Modal -->
                                                                                <div wire:ignore.self class="modal fade" id="final-nivel{{$cuenta4->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title">Agregar - Cuenta    
                                                                                                    {{-- {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}} - {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} - {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}} --}}
                                                                                                    </h5>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                            </div>
                                                                                            <div class="modal-body text-left">
                                                                                                {{-- <div class="form-group">
                                                                                                    <label for="">Nivel </label>
                                                                                                    <input type="text" name="" id=""  value="Nivel 5" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div> --}}
                                                                                                {{-- {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} --}}
                                
                                                                                                
                                                                                                <div class="form-group">
                                                                                                    <label for="">Tipo</label>
                                                                                                    <input type="text" name="" id=""  value="{{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div>
                                                                                                {{-- <div class="form-group">
                                                                                                    <label for="">Cuenta Mayor</label>
                                                                                                    <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div> --}}

                                                                                                {{-- <div class="form-group">
                                                                                                    <label for="">Nombre Cuenta Mayor</label>
                                                                                                    <input type="text" name="" id=""  value="{{cuenta_plan($cuenta4->idCuentaPlan)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div> --}}
                                            
                                                                                                {{-- {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}}  --}}
                                                                                                <div class="form-group">
                                                                                                    <label for="">Descripcion  {{$descripcion_nivel5}}</label>
                                                                                                    <input type="text" name="" id="" wire:model='descripcion_nivel5' class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" wire:click='nivel_5_cuenta({{$cuenta1->idCuentaPlanTipo}},{{$cuenta4->idCuentaPlan}})' class="btn btn-primary">Guardar</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#delete{{$cuenta4->idCuentaPlan}}">
                                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                                </button>
                                                                                
                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="delete{{$cuenta4->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title">Eliminar - {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}} - {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} - {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}}</h5>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="alert alert-danger" role="alert">
                                                                                                Esta seguro de eliminar {{cuenta_plan($cuenta4->idCuentaPlan)->descripcion}}?
                                                                                                <p>Se eliminaran todas las sub cuentas!!</p>
                                                                                            </div>

                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" wire:click='delete_cuenta3({{$cuenta4->idCuentaPlan}})' class="btn btn-sm btn-danger" data-dismiss="modal">
                                                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                
                                                                                <!-- Button trigger modal -->
                                                                                <button wire:click='loading_cuenta4({{$cuenta4->idCuentaPlan}})' type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#update_nivel4{{$cuenta4->idCuentaPlan}}">
                                                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                                                </button>
                                                                                
                                                                                <!-- Modal -->
                                                                                <div wire:ignore.self class="modal fade" id="update_nivel4{{$cuenta4->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title">Modificar Cuenta
                                                                                                    {{-- {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}} - {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} - {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}} --}}
                                                                                                </h5>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                {{-- <div class="form-group">
                                                                                                    <label for="">Nivel </label>
                                                                                                    <input type="text" name="" id=""  value="Nivel 4" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div> --}}
                                                                                                {{-- {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} --}}
                                
                                                                                                
                                                                                                <div class="form-group">
                                                                                                    <label for="">Tipo</label>
                                                                                                    <input type="text" name="" id=""  value="{{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div>
                                                                                                {{-- <div class="form-group">
                                                                                                    <label for="">Cuenta Mayor</label>
                                                                                                    <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}0{{$key3+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div>
                                 --}}
                                                                                                <div class="form-group">
                                                                                                    <label for="">Codigo Cuenta</label>
                                                                                                    <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div>
                                            
                                                                                                <div class="form-group">
                                                                                                    <label for="">Descripcion</label>
                                                                                                    <input type="text" name="" id="" wire:model='descripcion_nivel4' class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button wire:click='update_nuvel4(({{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}),{{$cuenta4->idCuentaPlan}})' type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}" aria-expanded="false" aria-controls="{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                        <div wire:ignore.self class="collapse" id="{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                            @if (count(nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan))>0)
                                                                                @foreach (nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan) as $key5 => $cuenta5)
                                                                                    <div class="border p-1">
                                                                                    
                                                                                        <div class="row">
                                                                                            <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}0{{$key5+1}}</div>
                                                                                            <div class="col-md-5">{{$cuenta5->descripcion}}</div>
                                                                                            <div class="col-md-2 text-center">
                                                                                                

                                                                                    
                                                                                                <!-- Button delete modal -->
                                                                                                <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletenvel-final{{$cuenta5->idCuentaPlan}}">
                                                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                                                </button>
                                                                                                
                                                                                                <!-- Modal -->
                                                                                                <div class="modal fade" id="deletenvel-final{{$cuenta5->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                                    <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title">Eliminar Cuenta
                                                                                                                    {{-- - {{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}} - {{cuenta_plan($cuenta2->idCuentaPlan)->descripcion}} - {{cuenta_plan($cuenta3->idCuentaPlan)->descripcion}} - {{cuenta_plan($cuenta4->idCuentaPlan)->descripcion}} --}}
                                                                                                                </h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <div class="alert alert-danger" role="alert">
                                                                                                                Esta seguro de eliminar {{cuenta_plan($cuenta5->idCuentaPlan)->descripcion}}?
                                                                                                                <p>Se eliminaran todas las sub cuentas!!</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" wire:click='delete_cuenta3({{$cuenta5->idCuentaPlan}})' class="btn btn-sm btn-danger" data-dismiss="modal">
                                                                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                    
                                                                                                <!-- Button trigger modal -->
                                                                                                <button  wire:click='loading_cuenta5({{$cuenta5->idCuentaPlan}})' type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update{{$cuenta5->idCuentaPlan}}">
                                                                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                                                                </button>
                                                                                                
                                                                                                <!-- Modal -->
                                                                                                <div wire:ignore.self class="modal fade" id="update{{$cuenta5->idCuentaPlan}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                                    <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title">Modal title</h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <div class="form-group">
                                                                                                                    <label for="">Tipo</label>
                                                                                                                    <input type="text" name="" id=""  value="{{cuenta_plan_tipo($cuenta1->idCuentaPlanTipo)->descripcion}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                                </div>
                                                                                    
                                                                                                                <div class="form-group">
                                                                                                                    <label for="">Codigo Cuenta</label>
                                                                                                                    <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}0{{$key5+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                                </div>
                                                                                    
                                                                                                                <div class="form-group">
                                                                                                                    <label for="">Descripcion</label>
                                                                                                                    <input type="text" name="" id="" wire:model='descripcion_nivel5' class="form-control" placeholder="" aria-describedby="helpId">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button wire:click='update_nuvel5(({{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}0{{$key5+1}}),{{$cuenta5->idCuentaPlan}})' type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                    
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                    <div class="alert alert-primary text-center" role="alert">
                                                                                        <strong>No existen cuentas agregadas</strong>
                                                                                    </div>
                                                                            @endif
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    
                                                                @endforeach
                                                            @else
                                                                <div class="alert alert-primary text-center" role="alert">
                                                                    <strong>No existen cuentas agregadas</strong>
                                                                </div>
                                                            @endif
                                                        </div>


                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="alert alert-primary text-center" role="alert">
                                                                <strong>No existen cuentas agregadas</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    @endforeach
                                    @else
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="alert alert-primary text-center" role="alert">
                                                    <strong>No existen cuentas agregadas</strong>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                          
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
