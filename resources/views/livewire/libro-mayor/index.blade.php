<div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @if ($table)
                <div class="card">
                    <div class="card-header">
                        <div class="row" >
                            <div class="col-12 text-center">
                                LIBRO MAYOR
                            </div>
                            <div class="col-12 text-center">
                                Desde {{$desde}} hasta {{$hasta}} <br>
                                Expresado en Bs
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                Cuenta : {{cuenta_plan($idCuentaPlan)->descripcion}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      
                       @if (count($comprobantes)> 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descripcion</th>
                                        <th>Fecha</th>
                                        <th>Debe</th>
                                        <th>Haber</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comprobantes as $item)
                                        <tr>
                                            <td scope="row">{{$item->idComprobanteCuentaDetalle}}</td>
                                            <td>{{$item->glosa}}</td>
                                            <td>{{$item->fecha}}</td>
                                            <td>{{$item->debe}}</td>
                                            <td>{{$item->haber}}</td>
                                        </tr>                        
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>TOTALES</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{libro_mayor_detalle($desde,$hasta,$idCuentaPlan)['debe']}}</td>
                                        <td>{{libro_mayor_detalle($desde,$hasta,$idCuentaPlan)['haber']}}</td>
                                    </tr>          
                                </tfoot>
                            </table>
                       @else
                           <div class="alert alert-danger" role="alert">
                               No existen registros entre este rango de fechas
                               {{-- <strong>Existen comprobantes entre este rango de fechas y de este tipo {{ comprobanteTipo($idTipoComprobante)->descripcion}}</strong> --}}
                           </div>
                       @endif 

                    </div>
                    <div class="card-footer">
                        <button type="button" wire:click='close_table'  class="btn btn-primary">Regresar</button>
                        <a name="" target="_black" id="" class="btn btn-sm btn-danger" href="{{ route('libro-mayor.pdf', ['desde'=>$desde,'hasta'=>$hasta,'idCuentaPlan'=>$idCuentaPlan]) }}" role="button">
                            <i class="fa fa-file-pdf" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            @else      
            <div class="card">
                <div class="card-header text-center">
                    Seleccione un filtro 
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ver-comprobantes">Ver Libro Mayor</button>
                    <!-- Modal -->
                    <div wire:ignore.self class="modal fade" id="ver-comprobantes" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">LIBRO MAYOR</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    @if ($message)
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$message}}</strong>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                      <label for="">Desde</label>
                                      <input type="date" wire:model='desde' name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hasta</label>
                                        <input type="date" wire:model='hasta' name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="btn-group col-md-12" role="group" aria-label="">
                                            <button wire:click="show_cuentas" type="button" class="btn btn-primary">
                                                Seleccionar Cuenta
                                            </button>
                                            @if (!is_null($idCuentaPlan))
                                                <input type="text" class="form-control" value=" {{cuenta_plan($idCuentaPlan)->descripcion}}">

                                            @else
                                                <input type="text" class="form-control">
                                            @endif
    
                                        </div>
                                    </div>

                                   
                                    @if ($cuentas)
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
                                                                                                            
                                                                                                                    <button wire:click='seleccionar_cuenta_plan({{$key1+1}},{{$key2+1}},{{$key3+1}},{{$key4+1}},{{$key5+1}},{{$cuenta5->idCuentaPlan}})' class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
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
                                    @else
                                    
                                    @endif 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" wire:click='show_table' data-dismiss="modal" class="btn btn-primary">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endif
        </div>
    </div>
</div>
