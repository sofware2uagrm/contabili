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
                                                                        <input type="text" name="" id=""  value="{{$key1+1}}0{{$key2+1}}" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div>

                                                                    
                
                
                                                                    <div class="form-group">
                                                                        <label for="">Descripcion</label>
                                                                        <input type="text" name="" id="" wire:model='descripcion_nivel2' class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button wire:click='update_nuvel2({{$cuenta2->idCuentaPlan}})' type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
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
                                                                                    <button wire:click='update_nuvel3({{$cuenta3->idCuentaPlan}})' type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
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
                                                                                                <button wire:click='update_nuvel4({{$cuenta4->idCuentaPlan}})' type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
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
                                                                                                                <button wire:click='update_nuvel5({{$cuenta5->idCuentaPlan}})' type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
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
