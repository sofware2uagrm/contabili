<div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @if ($form)
                @if ($isEdit)
                <div class="card border">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <span>Actualizar Comprobante # {{ $idComprobante }}</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <button  type="button"class="btn btn-sm btn-primary" wire:click="close_create">Regresar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card border-primary">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fecha</label>
                                            <input type="date" class="form-control" name="fecha" id="fecha"
                                                wire:model='fecha' aria-describedby="helpId" placeholder="">
                                        </div>
                                        @error('fecha')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Glosa</label>
                                            <input type="text" class="form-control" name="glosa" id="glosa"
                                                wire:model='glosa' aria-describedby="helpId" placeholder="">
                                                
                                        </div>
                                        @error('glosa')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cancelado a</label>
                                            <input type="text" name="canceladoa" wire:model='canceladoa'
                                                id="canceladoa" class="form-control" placeholder=""
                                                aria-describedby="helpId">
                                        </div>
                                        @error('canceladoa')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Moneda</label>
                                            <select wire:ignore class="form-control" name="moneda" id="moneda" wire:model='idMoneda'>
                                                @if (is_null($idMoneda))
                                                <option value="">Seleccione una opcion</option> 
                                            @endif
                                        @foreach (monedas() as $moneda)
                                        <!-- lucas modifico por su configuracion -->
                                                <option value="{{$moneda->idMoneda}}">{{$moneda->descripcion}}</option>                                              
                                        @endforeach
                                            </select>
                                        </div>
                                        @error('idMoneda')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label for="">Tipo Comprobante</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">   
                                                </div>
                                                <select  wire:ignore class="form-control" name="idComprobanteTipo" id="idComprobanteTipo" wire:model=idComprobanteTipo>
                                                    @if (is_null($idComprobanteTipo))
                                                        <option value="">Seleccione una opcion</option>
                                                    @endif
                                                @foreach (comprobanteTipos() as $tipoComprobante)
                                                        <option value="{{$tipoComprobante->idComprobanteTipo}}">{{$tipoComprobante->descripcion}}</option>                                              
                                                @endforeach
                                                </select>  
                                            </div>
                                        </div>


                                    </div>
                                    <!-- Button trigger modal -->
                                  
                                </div>


                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="modelIdEmpresa" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Empresa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    
                                                    <table class="table">
                                                      {{-- <input type="text" wire:model='searchempresa' class="form-control" style="border-radius : 50px" placeholder='Buscar'>--}} 
                                                        <thead class="thead-dark">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                            <th>NIT</th>
                                                            <th>DIRECCION</th>
                                                            <th>TELEFONO</th>
                                                            <th>SUCURSAL</th>
                                                            <th>ACCIONES</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (empresas() as $empresa)
                                                        <tr>
                                                            
                                                            <td>{{$empresa->idEmpresa}}</td>
                                                            <td>{{$empresa->razonsocial}}</td>
                                                            <td>{{$empresa->nit}}</td>
                                                            <td>{{$empresa->direccion}}</td>
                                                            <td>{{$empresa->telefono}}</td>
                                                            <td>{{$empresa->sucursal}}</td>
                                                            <td><button   wire:click='seleccionar_empresa({{$empresa->idEmpresa}})' class="btn btn-sm btn-success">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </button></td>

            

                                                        </tr>
                                                        @endforeach
                                                        </tbody>
    
        
                                                    </table>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="input-group">
                                            <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelIdEmpresa">
                                                Empresa
                                            </button>
                                        </span>
                                            @foreach (selecionadaempresa($idEmpresa) as $empresa )
                                                <input type="text" readonly class="form-control" name="name" id="name" placeholder=" {{$empresa->razonsocial}} " aria-label="">
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" wire:click='actualizar_comprobante' type="button">Actualizar</button>
                            </div>
                        </div>
                    </div>
 
                    @if ($total_debe!=$total_haber)
                        <div class="alert alert-danger" role="alert">
                            <strong>Los datos totales en el debe y haber deben ser iguales</strong>
                        </div>   
                    @endif
                
                    <div class="card-body">
                        <div class="card border-primary">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span>Asientos</span>
                                    </div>
                                    
                                    <div class="col-md-6 text-right">
                                        <!-- Button trigger modal -->

                                        <button type="button" wire:click="iniciar_nuevo" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelIdfacturarComprobante">
                                            Agregar Nuevo <i class="fa fa-file" aria-hidden="true"></i>
                                        </button>
                                    
                                            
                                    
                                        <!-- Modal -->
                                        <div wire:ignore.self class="modal fade" id="modelIdfacturarComprobante" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        @if ($factura)
                                                            <h5 class="modal-title">
                                                                FACTURA
                                                            </h5>
                                                        @endif

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body text-center">  
                                                    
                                                    @if ($pregunta)
                                                            <div class="text-center">
                                                                <p class="font-weight-bold"> DESEAS EMITIR FACTURA ?</p> 
                                                                <button type="button" class="btn btn-success" wire:click='facturado(1)'>SI</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">NO</button>
                                                                
                                                            </div>
                                                    @else
                                                            @if ($facturar)
                                                                @if ($factura)
                                                                    {{--FACTURA--}}
                                                                    <div class="modal-body">
                                                                        <div class='row'>
                                                                        {{-- {{get_transaccion()}}--}}
                                                                        
                
                                                                        
                                                                            <div class="col-md-4"> 
                                                                                <div  class="form-group">
                                                                            <label for="">Sucursal  </label>
                                                                                <select class="form-control" name="sucursal" id="sucursal" wire:model=sucursal>  
                                                                            @if (is_null($sucursal))
                                                                            <option value="">Seleccione una opcion</option>
                                                                            @endif
                                                                        @foreach (empresas() as $empresa)
                                                                            <option value="{{$empresa->idEmpresa}}">{{$empresa->sucursal}}</option>                                              
                                                                        @endforeach

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label form="">Nro Factura </label>
                                                                        <input type="number" class="form-control" name="nro_factura" id="nro_factura"  wire:model='nro_factura' aria-describedby="helpId" placeholder="">
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label form="">NIT</label>
                                                                                <input type="number" class="form-control" name="nit_factura" id="nit_factura" wire:model='nit_factura' aria-describedby="helpId" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label form="">Nro Autorizacion </label>
                                                                                <input type="number" class="form-control" name="nroautorizacion" 
                                                                                id="nroautorizacion" wire:model='nroautorizacion' aria-describedby="helpId" placeholder="">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label form="">Cod. Control </label>
                                                                                <input type="number" class="form-control" name="codcontrol" id="codcontrol" wire:model='codcontrol' aria-describedby="helpId" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label form="">Proveedor</label>
                                                                                <input type="text" class="form-control" name="proveedor" id="proveedor" wire:model='proveedor' aria-describedby="helpId" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label form="">Total Factura</label>
                                                                                <input type="number" class="form-control" name="total_factura" id="total_factura"wire:model='total_factura' aria-describedby="helpId" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label form="">ICE </label>
                                                                                <input type="number" class="form-control" name="ice" id="ice"wire:model='ice' aria-describedby="helpId" placeholder="">
                                                                            </div>  
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label form="">Importes Excentos </label>
                                                                                <input type="number" class="form-control" name="importes_excentos" id="importes_excentos"wire:model='importes_excentos' aria-describedby="helpId" placeholder="">
                                                                            </div>  
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="col-md-4 alert alert-warning text-dark" role="alert">
                                                                        CUENTA ELEGIDA : 
                                                                    {{$codigoSeleccionadoFactura}}
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label form="">Descuentos </label>
                                                                        <input type="number" class="form-control" name="descuentos" id="descuentos"wire:model='descuentos' aria-describedby="helpId" placeholder="">
                                                                    </div>  
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label form="">Credito Fiscal</label>
                                                                    {{get_iva($total_factura)}}
                                                                </div>  
                                                        </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modelIdPlanusea" >
                                                                    Plan de cuentas
                                                                    </button>
                                                                </div>
                                                                </div>
                                                                
                                                                    
                                                                    <!-- Modal -->
                                                                    <div wire:ignore.self class="modal fade" id="modelIdPlanusea" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Plan Cuentas</h5>
                                                                                    
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="card-body">
                                                                                        @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
                                                                                            <div class="border p-1">
                                                                                                {{-- FINALIZADO --}}
                                                                                                <div class="row">
                                                                                                    {{-- <div class="col-md-5">{{ $cuenta1->idCuentaPlanTipo }}</div> --}}
                                                                                                    <div class="col-md-5"> <strong><span style="text-transform: uppercase;  "> {{ $key1+1 }}. </span></strong></div>
                                                                                                    <div class="col-md-4"><strong> <span style="text-transform: uppercase; "> {{ $cuenta1->descripcion }} </span></strong></div>
                                                                                                    <div class="col-md-3 text-right">
                                                                    
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
                                                                                                                                                        
                                                                                                                                                                <button wire:click='seleccionar_cuenta_plan({{$key1+1}},{{$key2+1}},{{$key3+1}},{{$key4+1}},{{$key5+1}},{{$cuenta5->idCuentaPlan}},0)' class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                                                                                                                                
                                                    
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
                                                                                
                                                                                <div class="modal-footer">
                                                                                    
                                                                                
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <button type="button" wire:click="atras"class="btn btn-link">REGRESAR AL INICIO</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-link" wire:click='show_form_comprobante'>SIGUIENTE</button>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                                
                                                                @else
                                                                {{-- FORMULARIO DE COMPROBANTE --}}
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modelIdPlans" >
                                                                            Plan de cuentas
                                                                        </button>
                                                                        
                                                                        
                                                                        <!-- Modal -->
                                                                        <div wire:ignore.self class="modal fade" id="modelIdPlans" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Plan Cuentas</h5>
                                                                                            
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="card-body">
                                                                                            @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
                                                                                                <div class="border p-1">
                                                                                                    {{-- FINALIZADO --}}
                                                                                                    <div class="row">
                                                                                                        {{-- <div class="col-md-5">{{ $cuenta1->idCuentaPlanTipo }}</div> --}}
                                                                                                        <div class="col-md-5"> <strong><span style="text-transform: uppercase;  "> {{ $key1+1 }}. </span></strong></div>
                                                                                                        <div class="col-md-4"><strong> <span style="text-transform: uppercase; "> {{ $cuenta1->descripcion }} </span></strong></div>
                                                                                                        <div class="col-md-3 text-right">
                                                                        
                                                                                                            <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#key_11{{$key1}}" aria-expanded="false" aria-controls="key_11{{$key1}}">
                                                                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                            </button>
                                                                                                        
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    {{-- FINALIZADO --}}
                                                                                                    <div wire:ignore.self class="collapse" id="key_11{{$key1}}">
                                                                                                        <div class="card card-body">
                                                                                                            @if (count(nivel_2_cuentas($cuenta1->idCuentaPlanTipo))>0)
                                                                                                                
                                                                        
                                                                                                            @foreach (nivel_2_cuentas($cuenta1->idCuentaPlanTipo) as $key2 => $cuenta2)
                                                                                                                <div class="border p-1">
                                                                                                                    {{-- FINALIZADO --}}
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-5"><strong> {{$key1+1}}0{{$key2+1}} </strong></div>
                                                                                                                        <div class="col-md-4"><strong>{{$cuenta2->descripcion}}</strong></div>
                                                                                                                        <div class="col-md-3 text-center">
                                                                                                                    
                                                                                                                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_22{{$key1+1}}0{{$key2+1}}" aria-expanded="false" aria-controls="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    {{-- FINALIZADO --}}
                                                                                                                    <div wire:ignore.self class="collapse" id="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                        @if (count(nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan))>0)
                                                                                                                            @foreach (nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan) as $key3 => $cuenta3)
                                                                                                                                <div class="border p-1">
                                                                        
                                                                                                                                    <div class="row">
                                                                                                                                        {{-- {{$cuenta1->idCuentaPlanTipo}}.&nbsp; {{$cuenta3->idCuentaPlan}}. --}}
                                                                                                                                        <div class="col-md-5">{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}</div>
                                                                                                                                        <div class="col-md-4">{{$cuenta3->descripcion}}</div>
                                                                                                                                        <div class="col-md-3 text-center">
                                                                        
                                                                                                                                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}" aria-expanded="false" aria-controls="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                            </a>
                                                                        
                                                                                                                                        </div>
                                                                        
                                                                                                                                    </div>
                                                                                                                                    <div wire:ignore.self class="collapse" id="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                    @if (count(nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan))>0)
                                                                                                                                        @foreach (nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan) as $key4 => $cuenta4)
                                                                                                                                            <div class="border p-1">
                                                                        
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}</div>
                                                                                                                                                    <div class="col-md-4">{{$cuenta4->descripcion}}</div>
                                                                                                                                                    <div class="col-md-3 text-center">
                                                                                                                            
                                                                                                                                                        <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}" aria-expanded="false" aria-controls="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                                        </a>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                        
                                                                                                                                                <div wire:ignore.self class="collapse" id="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                    @if (count(nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan))>0)
                                                                                                                                                        @foreach (nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan) as $key5 => $cuenta5)
                                                                                                                                                            <div class="border p-1">
                                                                                                                                                            
                                                                                                                                                                <div class="row">
                                                                                                                                                                    <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}0{{$key5+1}}</div>
                                                                                                                                                                    <div class="col-md-5">{{$cuenta5->descripcion}}</div>
                                                                                                                                                                    <div class="col-md-2 text-center">
                                                                                                                                                            
                                                                                                                                                                        <button wire:click='seleccionar_cuenta_plan({{$key1+1}},{{$key2+1}},{{$key3+1}},{{$key4+1}},{{$key5+1}},{{$cuenta5->idCuentaPlan}},1)' class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                                                                                                                                        
                                                                    
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
                                                                                    
                                                                                    <div class="modal-footer">
                                                                                        
                                                                                        
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <div class="row">
                                                                    
                                                                        
                                                                        <div class="col-md-6 alert alert-warning text-dark" role="alert">
                                                                                CUENTA ELEGIDA : 
                                                                            {{$codigoSeleccionadoComprobanteFactura}}
                                                                        </div>
                                                                    
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Glosa individual </label>
                                                                                <input type="text" name="glosaDetalle" id="glosaDetalle" wire:model='glosaDetalle'
                                                                                    class="form-control" placeholder="" aria-describedby="helpId">
                                                                            </div>
                                                                            @error('glosaDetalle')
                                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Debe</label>
                                                                                <input type="number" class="form-control" name="debe" id="debe"
                                                                                    wire:model='debe' aria-describedby="helpId" placeholder="">
                                                                            </div>
                                                                            @error('debe')
                                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Haber</label>
                                                                                <input type="number" class="form-control" name="haber" id="haber"
                                                                                    wire:model='haber' aria-describedby="helpId" placeholder="">
                                                                            </div>
                                                                            @error('haber')
                                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                    </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        
                                                                    <button type="button" wire:click="regresar_emitir_factura"class="btn btn-sm btn-link">ATRAS</button>
                                                                    
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        
                                                                        <button type="button" wire:click="update_add_asiento" class="btn btn-sm btn-success">AÑADIR</button>
                                                                        
                                                                        </div>
                                                                </div>
                                                                
                                                                @endif
                                                            {{--[id,tipo,[,id,nit]]--}} 
                                                            @else
                                                            {{-- FORMULARIO DE COMPROBANTE--}} 
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modelIdPlans" >
                                                                        Plan de cuentas
                                                                    </button>
                                                                    
                                                                    
                                                                    <!-- Modal -->
                                                                    <div wire:ignore.self class="modal fade" id="modelIdPlans" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Plan Cuentas</h5>
                                                                                        
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="card-body">
                                                                                        @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
                                                                                            <div class="border p-1">
                                                                                                {{-- FINALIZADO --}}
                                                                                                <div class="row">
                                                                                                    {{-- <div class="col-md-5">{{ $cuenta1->idCuentaPlanTipo }}</div> --}}
                                                                                                    <div class="col-md-5"> <strong><span style="text-transform: uppercase;  "> {{ $key1+1 }}. </span></strong></div>
                                                                                                    <div class="col-md-4"><strong> <span style="text-transform: uppercase; "> {{ $cuenta1->descripcion }} </span></strong></div>
                                                                                                    <div class="col-md-3 text-right">
                                                                    
                                                                                                        <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#key_11{{$key1}}" aria-expanded="false" aria-controls="key_11{{$key1}}">
                                                                                                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                        </button>
                                                                                                    
                                                                                                    </div>
                                                                                                </div>
                                                                                                {{-- FINALIZADO --}}
                                                                                                <div wire:ignore.self class="collapse" id="key_11{{$key1}}">
                                                                                                    <div class="card card-body">
                                                                                                        @if (count(nivel_2_cuentas($cuenta1->idCuentaPlanTipo))>0)
                                                                                                            
                                                                    
                                                                                                        @foreach (nivel_2_cuentas($cuenta1->idCuentaPlanTipo) as $key2 => $cuenta2)
                                                                                                            <div class="border p-1">
                                                                                                                {{-- FINALIZADO --}}
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-5"><strong> {{$key1+1}}0{{$key2+1}} </strong></div>
                                                                                                                    <div class="col-md-4"><strong>{{$cuenta2->descripcion}}</strong></div>
                                                                                                                    <div class="col-md-3 text-center">
                                                                                                                
                                                                                                                        <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_22{{$key1+1}}0{{$key2+1}}" aria-expanded="false" aria-controls="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                {{-- FINALIZADO --}}
                                                                                                                <div wire:ignore.self class="collapse" id="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                    @if (count(nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan))>0)
                                                                                                                        @foreach (nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan) as $key3 => $cuenta3)
                                                                                                                            <div class="border p-1">
                                                                    
                                                                                                                                <div class="row">
                                                                                                                                    {{-- {{$cuenta1->idCuentaPlanTipo}}.&nbsp; {{$cuenta3->idCuentaPlan}}. --}}
                                                                                                                                    <div class="col-md-5">{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}</div>
                                                                                                                                    <div class="col-md-4">{{$cuenta3->descripcion}}</div>
                                                                                                                                    <div class="col-md-3 text-center">
                                                                    
                                                                                                                                        <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}" aria-expanded="false" aria-controls="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                        </a>
                                                                    
                                                                                                                                    </div>
                                                                    
                                                                                                                                </div>
                                                                                                                                <div wire:ignore.self class="collapse" id="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                @if (count(nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan))>0)
                                                                                                                                    @foreach (nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan) as $key4 => $cuenta4)
                                                                                                                                        <div class="border p-1">
                                                                    
                                                                                                                                            <div class="row">
                                                                                                                                                <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}</div>
                                                                                                                                                <div class="col-md-4">{{$cuenta4->descripcion}}</div>
                                                                                                                                                <div class="col-md-3 text-center">
                                                                                                                        
                                                                                                                                                    <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}" aria-expanded="false" aria-controls="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                                    </a>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                    
                                                                                                                                            <div wire:ignore.self class="collapse" id="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                @if (count(nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan))>0)
                                                                                                                                                    @foreach (nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan) as $key5 => $cuenta5)
                                                                                                                                                        <div class="border p-1">
                                                                                                                                                        
                                                                                                                                                            <div class="row">
                                                                                                                                                                <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}0{{$key5+1}}</div>
                                                                                                                                                                <div class="col-md-5">{{$cuenta5->descripcion}}</div>
                                                                                                                                                                <div class="col-md-2 text-center">
                                                                                                                                                        
                                                                                                                                                                    <button wire:click='seleccionar_cuenta_plan({{$key1+1}},{{$key2+1}},{{$key3+1}},{{$key4+1}},{{$key5+1}},{{$cuenta5->idCuentaPlan}},2)' class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                                                                                                                                    
                                                                
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
                                                                                
                                                                                <div class="modal-footer">
                                                                                    
                                                                                    
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="row">
                                                                
                                                                    
                                                                    <div class="col-md-6 alert alert-warning text-dark" role="alert">
                                                                            CUENTA ELEGIDA : 
                                                                        {{$codigoSeleccionadoComprobante}}
                                                                    </div>
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Glosa individual </label>
                                                                            <input type="text" name="glosaDetalle" id="glosaDetalle" wire:model='glosaDetalle'
                                                                                class="form-control" placeholder="" aria-describedby="helpId">
                                                                        </div>
                                                                        @error('glosaDetalle')
                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Debe</label>
                                                                            <input type="number" class="form-control" name="debe" id="debe"
                                                                                wire:model='debe' aria-describedby="helpId" placeholder="">
                                                                        </div>
                                                                        @error('debe')
                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Haber</label>
                                                                            <input type="number" class="form-control" name="haber" id="haber"
                                                                                wire:model='haber' aria-describedby="helpId" placeholder="">
                                                                        </div>
                                                                        @error('haber')
                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <button type="button" wire:click="atras"class="btn btn-sm btn-link">REGRESAR AL INICIO</button>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <button wire:click="update_add_asiento"class="btn btn-sm btn-success"> Añadir Nuevo</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            {{--[id,tipo,[factura,id=null,nit=null]]--}} 
                                                            @endif
                                                            
                                                    @endif
                                                        
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>       
                        
                            <div class="card-body">
                                <div class="responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th> 
                                                <th>Cuenta</th>
                                                <th>Glosa Individual</th>  
                                                <th>Debe Bs</th>  
                                                <th>Haber Bs</th>  
                                                <th>Debe $us</th>  
                                                <th>Haber $us</th> 
                                                <th>Acciones</th>  

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach (get_detalle($idComprobante)['detalle'] as $key =>  $asiento)
                                                <tr>
                                                    <td>{{$asiento->codigo}}</td>
                                                    <td> {{CuentaPlane($asiento->idCuentaPlan)->descripcion }}</td>     
                                                    <td>{{$asiento->glosa}}</td>  
                                                    <td>{{$asiento->debe}}</td>  
                                                    <td>{{$asiento->haber}}</td>  
                                                    <td>{{montoSus($tc,$asiento->debe)}}</td>  
                                                    <td>{{montoSus($tc,$asiento->haber)}}</td> 
                                                    <td><!-- Button trigger modal -->
                                                        <button type="button" wire:click='show_asiento({{$asiento->idComprobanteCuentaDetalle}})'class="btn btn-success btn-sm" data-toggle="modal" data-target="#modelIdEditarasiento" >
                                                            <i class="fas fa-edit"> </i>
                                                            </button>
                                                            
                                                            <!-- Modal -->
                                                            <div wire:ignore.self class="modal fade" id="modelIdEditarasiento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg " role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Modificar Asiento</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modelIdPC">
                                                                              Plan de Cuentas
                                                                            </button>
                                                                            
                                                                            <!-- Modal -->
                                                                            <div wire:ignore.self class="modal fade" id="modelIdPC" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title">Plan de Cuentas</h5>
                                                                                               
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="card-body">
                                                                                                @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
                                                                                                    <div class="border p-1">
                                                                                                        {{-- FINALIZADO --}}
                                                                                                        <div class="row">
                                                                                                            {{-- <div class="col-md-5">{{ $cuenta1->idCuentaPlanTipo }}</div> --}}
                                                                                                            <div class="col-md-5"> <strong><span style="text-transform: uppercase;  "> {{ $key1+1 }}. </span></strong></div>
                                                                                                            <div class="col-md-4"><strong> <span style="text-transform: uppercase; "> {{ $cuenta1->descripcion }} </span></strong></div>
                                                                                                            <div class="col-md-3 text-right">
                                                                            
                                                                                                                <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#key_11{{$key1}}" aria-expanded="false" aria-controls="key_11{{$key1}}">
                                                                                                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                </button>
                                                                                                            
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        {{-- FINALIZADO --}}
                                                                                                        <div wire:ignore.self class="collapse" id="key_11{{$key1}}">
                                                                                                            <div class="card card-body">
                                                                                                                @if (count(nivel_2_cuentas($cuenta1->idCuentaPlanTipo))>0)
                                                                                                                    
                                                                            
                                                                                                                @foreach (nivel_2_cuentas($cuenta1->idCuentaPlanTipo) as $key2 => $cuenta2)
                                                                                                                    <div class="border p-1">
                                                                                                                        {{-- FINALIZADO --}}
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-5"><strong> {{$key1+1}}0{{$key2+1}} </strong></div>
                                                                                                                            <div class="col-md-4"><strong>{{$cuenta2->descripcion}}</strong></div>
                                                                                                                            <div class="col-md-3 text-center">
                                                                                                                        
                                                                                                                                <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_22{{$key1+1}}0{{$key2+1}}" aria-expanded="false" aria-controls="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                </a>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        {{-- FINALIZADO --}}
                                                                                                                        <div wire:ignore.self class="collapse" id="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                            @if (count(nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan))>0)
                                                                                                                                @foreach (nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan) as $key3 => $cuenta3)
                                                                                                                                    <div class="border p-1">
                                                                            
                                                                                                                                        <div class="row">
                                                                                                                                            {{-- {{$cuenta1->idCuentaPlanTipo}}.&nbsp; {{$cuenta3->idCuentaPlan}}. --}}
                                                                                                                                            <div class="col-md-5">{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}</div>
                                                                                                                                            <div class="col-md-4">{{$cuenta3->descripcion}}</div>
                                                                                                                                            <div class="col-md-3 text-center">
                                                                            
                                                                                                                                                <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}" aria-expanded="false" aria-controls="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                                </a>
                                                                            
                                                                                                                                            </div>
                                                                            
                                                                                                                                        </div>
                                                                                                                                        <div wire:ignore.self class="collapse" id="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                        @if (count(nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan))>0)
                                                                                                                                            @foreach (nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan) as $key4 => $cuenta4)
                                                                                                                                                <div class="border p-1">
                                                                            
                                                                                                                                                    <div class="row">
                                                                                                                                                        <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}</div>
                                                                                                                                                        <div class="col-md-4">{{$cuenta4->descripcion}}</div>
                                                                                                                                                        <div class="col-md-3 text-center">
                                                                                                                                
                                                                                                                                                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}" aria-expanded="false" aria-controls="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                                            </a>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                            
                                                                                                                                                    <div wire:ignore.self class="collapse" id="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                        @if (count(nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan))>0)
                                                                                                                                                            @foreach (nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan) as $key5 => $cuenta5)
                                                                                                                                                                <div class="border p-1">
                                                                                                                                                                
                                                                                                                                                                    <div class="row">
                                                                                                                                                                        <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}0{{$key5+1}}</div>
                                                                                                                                                                        <div class="col-md-5">{{$cuenta5->descripcion}}</div>
                                                                                                                                                                        <div class="col-md-2 text-center">
                                                                                                                                                                
                                                                                                                                                                            <button wire:click='seleccionar_asiento({{$key1+1}},{{$key2+1}},{{$key3+1}},{{$key4+1}},{{$key5+1}},{{$cuenta5->idCuentaPlan}})' class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                                                                                                                                            
                                                                        
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
                                                                                        
                                                                                        <div class="modal-footer">
                                                                                            
                                                                                            
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                           
                                                                        
                                                                        
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                    <label for="">Codigo</label>
                                                                                    <input type="text" class="form-control" name="codigo" id="codigo"
                                                                                    wire:model='codigo' aria-describedby="helpId" placeholder="">{{$codigo}}
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                    @if (!is_null($idCuentaPlan_edit))
                                                                                    <label for="">Cuenta {{CuentaPlane($idCuentaPlan_edit)->descripcion}}</label>
                                                                                    <input type="text" class="form-control" name="idCuentaPlan" id="idCuentaPlan"
                                                                                     wire:model='idCuentaPlan' aria-describedby="helpId" placeholder="{{ CuentaPlane($idCuentaPlan_edit)->descripcion}}">  
                                                                                    @endif
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                    <label for="">Glosa Individual</label>
                                                                                    <input type="text" class="form-control" name="glosa" id="glosa"
                                                                                    wire:model='glosa' aria-describedby="helpId" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                    <label for="">Debe Bs</label>
                                                                                    <input type="number" class="form-control" name="debe" id="debe"
                                                                                    wire:model='debe' aria-describedby="helpId" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                    <label for="">Haber Bs</label>
                                                                                    <input type="number" class="form-control" name="haber" id="haber"
                                                                                    wire:model='haber' aria-describedby="helpId" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                            <button type="button" wire:click="modificar_asiento" class="btn btn-primary">Modificar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div></td>
                                                            
                                                        </tr>
                                        
                                                    @endforeach
                                                
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="font-weight-bold">TOTALES : </td>
                                                    
                                                   <td>{{get_detalle($idComprobante)['total_debe']}}</td>
                                                   <td>{{get_detalle($idComprobante)['total_haber']}}</td>
                                                   <td>{{montoSus($tc,get_detalle($idComprobante)['total_debe'])}}</td>
                                                   <td>{{montoSus($tc,get_detalle($idComprobante)['total_haber'])}}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
        

                    <div class="card-body">
                        @if (count($array_asiento) > 0)
                            <div class="card-header">
                                <button class="btn btn-sm btn-primary" wire:click="add_comprobante">Guardar</button>
                            </div>
                        @endif

                    </div>
                </div>
                @else
                    <div class="card border">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Agregar Comprobante</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button  type="button"class="btn btn-sm btn-primary" wire:click="close_create">Regresar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <div class="row">
                                    
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Numero Comprobante</label>
                                                #@if(!is_null($fecha) && !is_null($idComprobanteTipo))
                                                {{ nrocomprobante($idComprobanteTipo,$fecha) + 1 }}
                                            
                                                @endif
                                                
                                            </div>
                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Tipo Cambio</label>
                                                <input type="number"  name="tc" id="tc" wire:model='tc'
                                                    class="form-control" placeholder="" aria-describedby="helpId">
                                            
                                            </div>
                                            @error('tc')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Fecha</label>
                                                <input type="date" class="form-control" name="fecha" id="fecha"
                                                    wire:model='fecha' aria-describedby="helpId" placeholder="">
                                            </div>
                                            @error('fecha')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Glosa</label>
                                                <input type="text" class="form-control" name="glosa" id="glosa"
                                                    wire:model='glosa' aria-describedby="helpId" placeholder="">
                                                    
                                            </div>
                                            @error('glosa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Cancelado a</label>
                                                <input type="text" name="canceladoa" wire:model='canceladoa'
                                                    id="canceladoa" class="form-control" placeholder=""
                                                    aria-describedby="helpId">
                                            </div>
                                            @error('canceladoa')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Moneda</label>
                                                <select wire:ignore class="form-control" name="moneda" id="moneda" wire:model='idMoneda'>
                                                    @if (is_null($idMoneda))
                                                   <option value="">Seleccione una opcion</option>
                                                    @endif 
                                            @foreach (monedas() as $moneda)
                                                    <option class="@if ($moneda->estado == 1) {{ "text-primary" }} @endif"  value="{{$moneda->idMoneda}}">{{$moneda->descripcion}}</option>                                              
                                            @endforeach
                                                </select>
                                            </div>
                                            @error('idMoneda')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>

                                        <div class="col-md-6">
                                            
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="form-group">
                                                        <label for="">Tipo Comprobante</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">   
                                                            </div>
                                                            <select  wire:ignore class="form-control" name="idComprobanteTipo" id="idComprobanteTipo" wire:model=idComprobanteTipo>
                                                                @if (is_null($idComprobanteTipo))
                                                                    <option value="">Seleccione una opcion</option>
                                                                @endif
                                                            @foreach (comprobanteTipos() as $tipoComprobante)
                                                                    <option value="{{$tipoComprobante->idComprobanteTipo}}">{{$tipoComprobante->descripcion}}</option>                                              
                                                            @endforeach
                                                            </select>  
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                                @error('idComprobanteTipo')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror



                                            </div>
                                            <div class="col-md-12">

                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelIdEmpresa">
                                                        Empresa
                                                    </button>
                                                </span>
                                                    @foreach (selecionadaempresa($idEmpresa) as $empresa )
                                                        <input type="text" readonly class="form-control" name="name" id="name" placeholder=" {{$empresa->razonsocial}} " aria-label="">
                                                    @endforeach
                                                </div>
                                            </div>
    
                                        <!-- Modal -->
                                        <div wire:ignore.self class="modal fade" id="modelIdEmpresa" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Empresa</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead class="thead-dark">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nombre</th>
                                                                <th>NIT</th>
                                                                <th>DIRECCION</th>
                                                                <th>TELEFONO</th>
                                                                <th>SUCURSAL</th>
                                                                <th>ACCIONES</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach (empresas() as $empresa)
                                                            <tr>
                                                                
                                                                <td>{{$empresa->idEmpresa}}</td>
                                                                <td>{{$empresa->razonsocial}}</td>
                                                                <td>{{$empresa->nit}}</td>
                                                                <td>{{$empresa->direccion}}</td>
                                                                <td>{{$empresa->telefono}}</td>
                                                                <td>{{$empresa->sucursal}}</td>
                                                                <td><button   wire:click='seleccionar_empresa({{$empresa->idEmpresa}})' class="btn btn-sm btn-success">
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                </button></td>

                

                                                            </tr>
                                                            @endforeach
                                                            </tbody>
        
            
                                                        </table>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($total_debe!=$total_haber)
                        <div class="alert alert-danger" role="alert">
                            <strong>Los datos totales en el debe y haber deben ser iguales</strong>
                        </div>   
                    
                            
                        @endif
                    
                        <div class="card-body">
                            <div class="card border-primary">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span>Asientos</span>
                                        </div>
                                        
                                        <div class="col-md-6 text-right">
                                            <!-- Button trigger modal -->
                                            <button type="button" wire:click="iniciar_nuevo" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelIdfacturarComprobante">
                                            Facturar <i class="fa fa-file" aria-hidden="true"></i>
                                            </button>
                                        
                                                
                                        
                                            <!-- Modal -->
                                            <div wire:ignore.self class="modal fade" id="modelIdfacturarComprobante" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            @if ($factura)
                                                                <h5 class="modal-title">
                                                                    FACTURA
                                                                </h5>
                                                            @endif

                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body text-center">  
                                                        
                                                        @if ($pregunta)
                                                                <div class="text-center">
                                                                    <p class="font-weight-bold"> DESEAS EMITIR FACTURA ?</p> 
                                                                    <button type="button" class="btn btn-success" wire:click='facturado(1)'>SI</button>
                                                                    <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close">NO</button>
                                                                    
                                                                </div>
                                                        @else
                                                                @if ($facturar)
                                                                    @if ($factura)
                                                                        {{--FACTURA--}}
                                                                        <div class="modal-body">
                                                                            <div class='row'>
                                                                            {{-- {{get_transaccion()}}--}}
                                                                            
                    
                                                                            
                                                                                <div class="col-md-4"> 
                                                                                    <div  class="form-group">
                                                                                <label for="">Sucursal  </label>
                                                                                    <select class="form-control" name="sucursal" id="sucursal" wire:model=sucursal>  
                                                                                @if (is_null($sucursal))
                                                                                <option value="">Seleccione una opcion</option>
                                                                                @endif
                                                                            @foreach (empresas() as $empresa)
                                                                                <option value="{{$empresa->idEmpresa}}">{{$empresa->sucursal}}</option>                                              
                                                                            @endforeach

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label form="">Nro Factura </label>
                                                                            <input type="number" class="form-control" name="nro_factura" id="nro_factura"  wire:model='nro_factura' aria-describedby="helpId" placeholder="">
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label form="">NIT</label>
                                                                                    <input type="number" class="form-control" name="nit_factura" id="nit_factura" wire:model='nit_factura' aria-describedby="helpId" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label form="">Nro Autorizacion </label>
                                                                                    <input type="number" class="form-control" name="nroautorizacion" 
                                                                                    id="nroautorizacion" wire:model='nroautorizacion' aria-describedby="helpId" placeholder="">
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label form="">Cod. Control </label>
                                                                                    <input type="number" class="form-control" name="codcontrol" id="codcontrol" wire:model='codcontrol' aria-describedby="helpId" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label form="">Proveedor</label>
                                                                                    <input type="text" class="form-control" name="proveedor" id="proveedor" wire:model='proveedor' aria-describedby="helpId" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label form="">Total Factura</label>
                                                                                    <input type="number" class="form-control" name="total_factura" id="total_factura"wire:model='total_factura' aria-describedby="helpId" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label form="">ICE </label>
                                                                                    <input type="number" class="form-control" name="ice" id="ice"wire:model='ice' aria-describedby="helpId" placeholder="">
                                                                                </div>  
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label form="">Importes Excentos </label>
                                                                                    <input type="number" class="form-control" name="importes_excentos" id="importes_excentos"wire:model='importes_excentos' aria-describedby="helpId" placeholder="">
                                                                                </div>  
                                                                        </div>
                                                                        </div>
                                                                        <div class="row">
                                                                        <div class="col-md-4 alert alert-warning text-dark" role="alert">
                                                                            CUENTA ELEGIDA : 
                                                                        {{$codigoSeleccionadoFactura}}
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label form="">Descuentos </label>
                                                                            <input type="number" class="form-control" name="descuentos" id="descuentos"wire:model='descuentos' aria-describedby="helpId" placeholder="">
                                                                        </div>  
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label form="">Credito Fiscal</label>
                                                                        {{get_iva($total_factura)}}
                                                                    </div>  
                                                            </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modelIdPlan" >
                                                                        Plan de cuentas
                                                                        </button>
                                                                    </div>
                                                                    </div>
                                                                    
                                                                        
                                                                        <!-- Modal -->
                                                                        <div wire:ignore.self class="modal fade" id="modelIdPlan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Plan Cuentas</h5>
                                                                                        
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="card-body">
                                                                                            @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
                                                                                                <div class="border p-1">
                                                                                                    {{-- FINALIZADO --}}
                                                                                                    <div class="row">
                                                                                                        {{-- <div class="col-md-5">{{ $cuenta1->idCuentaPlanTipo }}</div> --}}
                                                                                                        <div class="col-md-5"> <strong><span style="text-transform: uppercase;  "> {{ $key1+1 }}. </span></strong></div>
                                                                                                        <div class="col-md-4"><strong> <span style="text-transform: uppercase; "> {{ $cuenta1->descripcion }} </span></strong></div>
                                                                                                        <div class="col-md-3 text-right">
                                                                        
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
                                                                                                                                                            
                                                                                                                                                                    <button wire:click='seleccionar_cuenta_plan({{$key1+1}},{{$key2+1}},{{$key3+1}},{{$key4+1}},{{$key5+1}},{{$cuenta5->idCuentaPlan}},0)' class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                                                                                                                                    
                                                        
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
                                                                                    
                                                                                    <div class="modal-footer">
                                                                                        
                                                                                    
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <button type="button" wire:click="atras"class="btn btn-link">REGRESAR AL INICIO</button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <button type="button" class="btn btn-sm btn-link" wire:click='show_form_comprobante'>SIGUIENTE</button>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                                    
                                                                    @else
                                                                    {{-- FORMULARIO DE COMPROBANTE --}}
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modelIdPlans" >
                                                                                Plan de cuentas
                                                                            </button>
                                                                            
                                                                            
                                                                            <!-- Modal -->
                                                                            <div wire:ignore.self class="modal fade" id="modelIdPlans" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title">Plan Cuentas</h5>
                                                                                                
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="card-body">
                                                                                                @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
                                                                                                    <div class="border p-1">
                                                                                                        {{-- FINALIZADO --}}
                                                                                                        <div class="row">
                                                                                                            {{-- <div class="col-md-5">{{ $cuenta1->idCuentaPlanTipo }}</div> --}}
                                                                                                            <div class="col-md-5"> <strong><span style="text-transform: uppercase;  "> {{ $key1+1 }}. </span></strong></div>
                                                                                                            <div class="col-md-4"><strong> <span style="text-transform: uppercase; "> {{ $cuenta1->descripcion }} </span></strong></div>
                                                                                                            <div class="col-md-3 text-right">
                                                                            
                                                                                                                <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#key_11{{$key1}}" aria-expanded="false" aria-controls="key_11{{$key1}}">
                                                                                                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                </button>
                                                                                                            
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        {{-- FINALIZADO --}}
                                                                                                        <div wire:ignore.self class="collapse" id="key_11{{$key1}}">
                                                                                                            <div class="card card-body">
                                                                                                                @if (count(nivel_2_cuentas($cuenta1->idCuentaPlanTipo))>0)
                                                                                                                    
                                                                            
                                                                                                                @foreach (nivel_2_cuentas($cuenta1->idCuentaPlanTipo) as $key2 => $cuenta2)
                                                                                                                    <div class="border p-1">
                                                                                                                        {{-- FINALIZADO --}}
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-5"><strong> {{$key1+1}}0{{$key2+1}} </strong></div>
                                                                                                                            <div class="col-md-4"><strong>{{$cuenta2->descripcion}}</strong></div>
                                                                                                                            <div class="col-md-3 text-center">
                                                                                                                        
                                                                                                                                <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_22{{$key1+1}}0{{$key2+1}}" aria-expanded="false" aria-controls="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                </a>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        {{-- FINALIZADO --}}
                                                                                                                        <div wire:ignore.self class="collapse" id="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                            @if (count(nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan))>0)
                                                                                                                                @foreach (nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan) as $key3 => $cuenta3)
                                                                                                                                    <div class="border p-1">
                                                                            
                                                                                                                                        <div class="row">
                                                                                                                                            {{-- {{$cuenta1->idCuentaPlanTipo}}.&nbsp; {{$cuenta3->idCuentaPlan}}. --}}
                                                                                                                                            <div class="col-md-5">{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}</div>
                                                                                                                                            <div class="col-md-4">{{$cuenta3->descripcion}}</div>
                                                                                                                                            <div class="col-md-3 text-center">
                                                                            
                                                                                                                                                <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}" aria-expanded="false" aria-controls="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                                </a>
                                                                            
                                                                                                                                            </div>
                                                                            
                                                                                                                                        </div>
                                                                                                                                        <div wire:ignore.self class="collapse" id="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                        @if (count(nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan))>0)
                                                                                                                                            @foreach (nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan) as $key4 => $cuenta4)
                                                                                                                                                <div class="border p-1">
                                                                            
                                                                                                                                                    <div class="row">
                                                                                                                                                        <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}</div>
                                                                                                                                                        <div class="col-md-4">{{$cuenta4->descripcion}}</div>
                                                                                                                                                        <div class="col-md-3 text-center">
                                                                                                                                
                                                                                                                                                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}" aria-expanded="false" aria-controls="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                                            </a>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                            
                                                                                                                                                    <div wire:ignore.self class="collapse" id="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                        @if (count(nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan))>0)
                                                                                                                                                            @foreach (nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan) as $key5 => $cuenta5)
                                                                                                                                                                <div class="border p-1">
                                                                                                                                                                
                                                                                                                                                                    <div class="row">
                                                                                                                                                                        <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}0{{$key5+1}}</div>
                                                                                                                                                                        <div class="col-md-5">{{$cuenta5->descripcion}}</div>
                                                                                                                                                                        <div class="col-md-2 text-center">
                                                                                                                                                                
                                                                                                                                                                            <button wire:click='seleccionar_cuenta_plan({{$key1+1}},{{$key2+1}},{{$key3+1}},{{$key4+1}},{{$key5+1}},{{$cuenta5->idCuentaPlan}},1)' class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                                                                                                                                            
                                                                        
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
                                                                                        
                                                                                        <div class="modal-footer">
                                                                                            
                                                                                            
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                            </div>
                                                                        
                                                                        </div>
                                                                        <div class="row">
                                                                        
                                                                            
                                                                            <div class="col-md-6 alert alert-warning text-dark" role="alert">
                                                                                    CUENTA ELEGIDA : 
                                                                                {{$codigoSeleccionadoComprobanteFactura}}
                                                                            </div>
                                                                        
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Glosa individual </label>
                                                                                    <input type="text" name="glosaDetalle" id="glosaDetalle" wire:model='glosaDetalle'
                                                                                        class="form-control" placeholder="" aria-describedby="helpId">
                                                                                </div>
                                                                                @error('glosaDetalle')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Debe</label>
                                                                                    <input type="number" class="form-control" name="debe" id="debe"
                                                                                        wire:model='debe' aria-describedby="helpId" placeholder="">
                                                                                </div>
                                                                                @error('debe')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Haber</label>
                                                                                    <input type="number" class="form-control" name="haber" id="haber"
                                                                                        wire:model='haber' aria-describedby="helpId" placeholder="">
                                                                                </div>
                                                                                @error('haber')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            
                                                                        <button type="button" wire:click="regresar_emitir_factura"class="btn btn-sm btn-link">ATRAS</button>
                                                                        
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            
                                                                            <button type="button" wire:click="add_asiento" class="btn btn-sm btn-success">GUARDAR</button>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    @endif
                                                                {{--[id,tipo,[,id,nit]]--}} 
                                                                @else
                                                                {{-- FORMULARIO DE COMPROBANTE--}} 
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modelIdPlans" >
                                                                            Plan de cuentas
                                                                        </button>
                                                                        
                                                                        
                                                                        <!-- Modal -->
                                                                        <div wire:ignore.self class="modal fade" id="modelIdPlans" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Plan Cuentas</h5>
                                                                                            
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="card-body">
                                                                                            @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
                                                                                                <div class="border p-1">
                                                                                                    {{-- FINALIZADO --}}
                                                                                                    <div class="row">
                                                                                                        {{-- <div class="col-md-5">{{ $cuenta1->idCuentaPlanTipo }}</div> --}}
                                                                                                        <div class="col-md-5"> <strong><span style="text-transform: uppercase;  "> {{ $key1+1 }}. </span></strong></div>
                                                                                                        <div class="col-md-4"><strong> <span style="text-transform: uppercase; "> {{ $cuenta1->descripcion }} </span></strong></div>
                                                                                                        <div class="col-md-3 text-right">
                                                                        
                                                                                                            <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#key_11{{$key1}}" aria-expanded="false" aria-controls="key_11{{$key1}}">
                                                                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                            </button>
                                                                                                        
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    {{-- FINALIZADO --}}
                                                                                                    <div wire:ignore.self class="collapse" id="key_11{{$key1}}">
                                                                                                        <div class="card card-body">
                                                                                                            @if (count(nivel_2_cuentas($cuenta1->idCuentaPlanTipo))>0)
                                                                                                                
                                                                        
                                                                                                            @foreach (nivel_2_cuentas($cuenta1->idCuentaPlanTipo) as $key2 => $cuenta2)
                                                                                                                <div class="border p-1">
                                                                                                                    {{-- FINALIZADO --}}
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-5"><strong> {{$key1+1}}0{{$key2+1}} </strong></div>
                                                                                                                        <div class="col-md-4"><strong>{{$cuenta2->descripcion}}</strong></div>
                                                                                                                        <div class="col-md-3 text-center">
                                                                                                                    
                                                                                                                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_22{{$key1+1}}0{{$key2+1}}" aria-expanded="false" aria-controls="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                            </a>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    {{-- FINALIZADO --}}
                                                                                                                    <div wire:ignore.self class="collapse" id="key_22{{$key1+1}}0{{$key2+1}}">
                                                                                                                        @if (count(nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan))>0)
                                                                                                                            @foreach (nivel_3_cuentas($cuenta1->idCuentaPlanTipo,$cuenta2->idCuentaPlan) as $key3 => $cuenta3)
                                                                                                                                <div class="border p-1">
                                                                        
                                                                                                                                    <div class="row">
                                                                                                                                        {{-- {{$cuenta1->idCuentaPlanTipo}}.&nbsp; {{$cuenta3->idCuentaPlan}}. --}}
                                                                                                                                        <div class="col-md-5">{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}</div>
                                                                                                                                        <div class="col-md-4">{{$cuenta3->descripcion}}</div>
                                                                                                                                        <div class="col-md-3 text-center">
                                                                        
                                                                                                                                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}" aria-expanded="false" aria-controls="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                            </a>
                                                                        
                                                                                                                                        </div>
                                                                        
                                                                                                                                    </div>
                                                                                                                                    <div wire:ignore.self class="collapse" id="key_33{{$key1+1}}0{{$key2+1}}0{{$key3+1 }}">
                                                                                                                                    @if (count(nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan))>0)
                                                                                                                                        @foreach (nivel_4_cuentas($cuenta1->idCuentaPlanTipo,$cuenta3->idCuentaPlan) as $key4 => $cuenta4)
                                                                                                                                            <div class="border p-1">
                                                                        
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}</div>
                                                                                                                                                    <div class="col-md-4">{{$cuenta4->descripcion}}</div>
                                                                                                                                                    <div class="col-md-3 text-center">
                                                                                                                            
                                                                                                                                                        <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}" aria-expanded="false" aria-controls="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                                                                                                        </a>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                        
                                                                                                                                                <div wire:ignore.self class="collapse" id="key_44{{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}">
                                                                                                                                                    @if (count(nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan))>0)
                                                                                                                                                        @foreach (nivel_5_cuentas($cuenta1->idCuentaPlanTipo,$cuenta4->idCuentaPlan) as $key5 => $cuenta5)
                                                                                                                                                            <div class="border p-1">
                                                                                                                                                            
                                                                                                                                                                <div class="row">
                                                                                                                                                                    <div class="col-md-5"> {{$key1+1}}0{{$key2+1}}0{{$key3+1}}0{{$key4+1}}0{{$key5+1}}</div>
                                                                                                                                                                    <div class="col-md-5">{{$cuenta5->descripcion}}</div>
                                                                                                                                                                    <div class="col-md-2 text-center">
                                                                                                                                                            
                                                                                                                                                                        <button wire:click='seleccionar_cuenta_plan({{$key1+1}},{{$key2+1}},{{$key3+1}},{{$key4+1}},{{$key5+1}},{{$cuenta5->idCuentaPlan}},2)' class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                                                                                                                                        
                                                                    
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
                                                                                    
                                                                                    <div class="modal-footer">
                                                                                        
                                                                                        
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <div class="row">
                                                                    
                                                                        
                                                                        <div class="col-md-6 alert alert-warning text-dark" role="alert">
                                                                                CUENTA ELEGIDA : 
                                                                            {{$codigoSeleccionadoComprobante}}
                                                                        </div>
                                                                    
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Glosa individual </label>
                                                                                <input type="text" name="glosaDetalle" id="glosaDetalle" wire:model='glosaDetalle'
                                                                                    class="form-control" placeholder="" aria-describedby="helpId">
                                                                            </div>
                                                                            @error('glosaDetalle')
                                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Debe</label>
                                                                                <input type="number" class="form-control" name="debe" id="debe"
                                                                                    wire:model='debe' aria-describedby="helpId" placeholder="">
                                                                            </div>
                                                                            @error('debe')
                                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Haber</label>
                                                                                <input type="number" class="form-control" name="haber" id="haber"
                                                                                    wire:model='haber' aria-describedby="helpId" placeholder="">
                                                                            </div>
                                                                            @error('haber')
                                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <button type="button" wire:click="atras"class="btn btn-sm btn-link">REGRESAR AL INICIO</button>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <button wire:click="add_asiento"class="btn btn-sm btn-success">GUARDAR COMPROBANTE</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                {{--[id,tipo,[factura,id=null,nit=null]]--}} 
                                                                @endif
                                                                
                                                        @endif
                                                            
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>       
                            
                                <div class="card-body">
                                    <div class="responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th> 
                                                    <th>Cuenta</th>
                                                    <th>Glosa Individual</th>  
                                                    <th>Debe Bs</th>  
                                                    <th>Haber Bs</th>  
                                                    <th>Debe $us</th>  
                                                    <th>Haber $us</th> 
                                                  
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($array_asiento as  $asiento)
                                                    <tr>
                                                        <td>{{ $asiento['codigo']}}</td> 
                                                        <td> {{CuentaPlane($asiento['idCuentaPlan'])->descripcion }}</td>     
                                                        <td>{{$asiento['glosaDetalle']}}</td>  
                                                        <td>{{$asiento['debe']}}</td>  
                                                        <td>{{$asiento['haber']}}</td>  
                                                        <td>{{montoSus($tc,$asiento['debe'])}}</td>  
                                                        <td>{{montoSus($tc,$asiento['haber'])}}</td> 
                                                        <td>
                                                            @if ($asiento['condicion_factura'])
                                                                <span class="badge badge-info">
                                                                    Facturado
                                                                </span>
                                                            @else
                                                                <span class="badge badge-danger">
                                                                    Sin Facturar
                                                                </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @if ($asiento['condicion_factura'])
                                                    {{-- CUENTA SELECCIONA --}}
                                                    <tr>
                                                            <td>{{ $asiento['codigoSeleccionadoFactura']}}</td> 
                                                            <td>{{cuenta_plan($asiento['cuenta_factura'])->descripcion}}</td>
                                                            <td>{{ $asiento['glosaindividual']}}</td>
                                                            <td>{{ $asiento['cuenta_factura_debe']}}</td>
                                                            <td>{{ $asiento['haber_factura']}}</td>
                                                            <td>{{ montoSus($tc,$asiento['cuenta_factura_debe'])}}</td>
                                                            <td>{{ montoSus($tc,$asiento['haber_factura'])}}</td>
                                                           
                                                        </tr>

                                                    {{-- CREDITO --}}
                                                    <tr>
                                                        <td>{{ $asiento['codigo_credito_iva']}}</td>
                                                        <td>{{ cuenta_plan($asiento['cuenta_iva'])->descripcion}}</td>
                                                        <td>{{ $asiento['glosaindividual']}}</td> 
                                                        <td>{{ $asiento['credito_fiscal_debe']}}</td>
                                                        <td>{{ $asiento['haber_iva']}}</td>
                                                        <td>{{ montoSus($tc,$asiento['credito_fiscal_debe'])}}</td>
                                                        <td>{{ montoSus($tc,$asiento['haber_iva'])}}</td>
                                                        
                                                    </tr>                                               
                                                    
                                                @endif
                                                
                                                @endforeach
                                            
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="font-weight-bold">TOTALES : </td>
                                                
                                                @if ($facturar)
                                                <td>{{$debe_factura}}</td>
                                                <td>{{$haber_facturas}}</td>
                                                <td>{{$montodebeSus_factura}}</td>
                                                <td>{{$montohaberSus_factura}}</td>

                                                @else
                                                <td>{{$total_debe}}</td>
                                                <td>{{$total_haber}}</td>
                                                <td>{{$montodebeSus}}</td>
                                                <td>{{$montohaberSus}}</td>
                                                    
                                                @endif
                                            
                                                    
                                                
                                                    
                                                
                                                </tr>
                                            
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (count($array_asiento) > 0)
                                <div class="card-header">
                                    <button class="btn btn-sm btn-primary" wire:click="add_comprobante">Guardar</button>
                                </div>
                            @endif

                        </div>
                    </div>
                
                @endif
            @else
                @if ($isDetail)
                    <div class="card">
                        DETALLE
                    </div>
                @else
                    <div class="card">

                        <div class="card-header">
                           <div class="row">
                             
                                <div class="col-md-8">
                                    <button type="button" wire:click='show_create' class="btn btn-sm btn-primary">Agregar</button>
                                </div>
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Fecha Inicio</label>
                                        <input type="date" wire:model='fecha_inicio' class="form-control"  placeholder='Buscar'>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Fecha  Final</label>
                                        <input type="date" wire:model='fecha_final' class="form-control"  placeholder='Buscar'>
                                   
                                    </div>
                                </div>
         
                        </div>

                        <div class="card-body p-0">
                            @if (count($comprobantes) > 0)
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                
                                                <th class="border-0">Numero comprobante</th>
                                                <th class="border-0">Tipo Comprobante</th>
                                                <th class="border-0">Fecha</th>
                                                <th class="border-0">Cancelado a</th>
                                                <th class="border-0">Glosa</th>
                                                <th> Estado</th>
                                                <th class="border-0">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comprobantes as $comprobante)
                                                <tr>
                                                    <td>{{ $comprobante->idComprobante }}</td>
                                                    <td>{{ $comprobante->numeroDocumento }}</td>
                                                    <td>{{ comprobanteTipo($comprobante->idComprobanteTipo)->descripcion }}</td>
                                                    <td>{{ $comprobante->fecha }}</td>
                                                    <td>{{ $comprobante->canceladoa }}</td>
                                                    <td>{{ $comprobante->glosa }}</td>
                                                    
                                                    <td> 
                                                        <span class="badge {{$comprobante->estado ? 'badge-success' : 'badge-danger' }}">
                                                            {{$comprobante->estado ? 'Activado' : 'Desactivado' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <button type="button" wire:click='show_update({{$comprobante->idComprobante}})' class="btn btn-sm btn-dark">
                                                     <i class="fas fa-edit"> </i>
                                                            
                                                        </button>
                                                        <button
                                                            wire:click='delete_comprobante({{ $comprobante->idComprobante }})'
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        <button wire:click='update_estado( {{$comprobante->idComprobante }})'  class="btn btn-sm {{!$comprobante->estado ? 'btn-success' : 'btn-danger' }}">
                                                            @if ($comprobante->estado)
                                                                <i class="fas fa-unlock-alt"></i>
                                                            @else
                                                                <i class="fas fa-unlock"></i> 
                                                            @endif
                                                        </button>

                                                        <!-- Button trigger modal -->
                                                          <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detalle{{ $comprobante->idComprobante }}">
                                                            <i class="fas fa-eye"></i> 
                                                        </button> 

                                                
                                                       
                                                        <a href="{{route('pdf.index',['id'=> $comprobante->idComprobante])}}" class="btn btn-sm btn-warning"><i class="fas fa-file"></i></a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="detalle{{ $comprobante->idComprobante }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Detalle del Comprobante</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                               
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                
                                                                                <div class="col-3 ">EMPRESA: 
                                                                                    {{empresaid($comprobante->idEmpresa)->razonsocial}} 
                                                                                </div>

                                                                                <div class="col-6"></div>
                                                                                <div class="col-3 text-lefth">FECHA : 
                                                                                    {{ $comprobante->fecha  }}
                                                                                </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                <div class="col-6 ">Direccion : 
                                                                                    {{empresaid($comprobante->idEmpresa)->direccion}} 
                                                                                </div>
                                                                                <div class="col-3"></div>
                                                                                <div class="col-3 text-lefth">T. C.:
                                                                                    {{$comprobante->tc}}
                                                                                </div>

                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-3">GESTION: {{año()}}</div>
                                                                                    <div class="col-6"></div>
                                                                                    <div class="col-3">NIT: 
                                                                                        {{empresaid($comprobante->idEmpresa)->nit}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-3">MES: {{mes()}}</div>
                                                                                    <div class="col-6"></div>
                                                                                    <div class="col-3">Usuario: 
                                                                                        @foreach (users() as $usuario)
                                                                                        {{$usuario->name}}
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <h3 class="col-12 text-center">COMPROBANTE DE {{comprobanteTipo($comprobante->idComprobanteTipo)->descripcion}}</h3>
                                                                                <h5 class="col-12 text-center">NRO DE COMPROBANTE : {{$comprobante->numeroDocumento}}</h5>
                                                                            </div>
                                                                            <br> 
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-6">CANCELADO A :</div>
                                                                                    <div class="col-2"></div>
                                                                                    <div class="col-7">{{ $comprobante->canceladoa }}</div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-6">POR CONCEPTO DE : </div>
                                                                                    <div class="col-1"></div>
                                                                                    <div class="col-8"> {{ $comprobante->glosa }}</div>
                                                                                </div>
                                                                                <br>
                                                                                <br>
                                                                                <table class="table table-bordered">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th scope="col">CODIGOS</th>
                                                                                        <th scope="col">DESCRIPCION</th>
                                                                                        <th scope="col">DEBE Bs</th>
                                                                                        <th scope="col">HABER Bs</th>
                                                                                        <th scope="col">DEBE $us</th>
                                                                                        <th scope="col">HABER $us</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach (detallecomprobante($comprobante->idComprobante)['asiento'] as $detalle )
                                                                                        <tr>
                                                                                                
                                                                        
                                                                                            <td>{{$detalle->codigo}}</td>                                     
                                                                                            <td>{{CuentaPlane($detalle->idCuentaPlan)->descripcion}} <br>{{$detalle->glosa}} </td>                                                                                                                   
                                                                                            <td>{{$detalle->debe}}</td>
                                                                                            <td>{{$detalle->haber}}</td>
                                                                                            <td>{{montoSus($comprobante->tc,$detalle->debe)}}</td>
                                                                                            <td>{{montoSus($comprobante->tc,$detalle->haber)}}</td>
                                                                                        </tr>
                                                                                        @endforeach

                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                        
                                                                                            <td></td>
                                                                                            <td class="font-weight-bold">TOTALES : </td>
                                                                                        
                                            
                                                                                        
                                                                                            <td>{{detallecomprobante($comprobante->idComprobante)['total_debes']}}</td>
                                                                                            <td>{{detallecomprobante($comprobante->idComprobante)['total_habers']}}</td>
                                                                                            <td>{{montoSus($comprobante->tc,detallecomprobante($comprobante->idComprobante)['total_debes'])}}</td>
                                                                                            <td>{{montoSus($comprobante->tc,detallecomprobante($comprobante->idComprobante)['total_habers'])}}</td>
                                                                                                
                                                                                        
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                        <br>
                                                                            
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <strong>SON :</strong>
                                                                                    {{convertir(detallecomprobante($comprobante->idComprobante)['total_debes'])}} 00/100 BOLIVIANOS
                                                                                </div>
                                                                            </div>    
                                                                            
                                                                                    
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        
                                                                            <div class="row">
                                                                                <div class="col-4 text-lefht">
                                                                                        ____________________
                                                                                    <strong>GERENCIA GENERAL</strong> 
                                                                                </div>
                                                                                <div class="col-4 text-center">
                                                                                        ______________________
                                                                                    <strong>ADMINISTRACION</strong>    
                                                                                </div> 
                                                                                <div class="col-3 text-right">
                                                                                    
                                                                                        _______________
                                                                                    <strong>CONTABILIDAD</strong>     
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$comprobantes->render()}}
                                </div>
                                @else
                                <div class="alert alert-primary text-center" role="alert">
                                    <strong>No existen registros</strong>
                                </div>
                            @endif
                        </div>
                        
                    </div>
                @endif
            @endif

        </div>
    </div>
</div>
