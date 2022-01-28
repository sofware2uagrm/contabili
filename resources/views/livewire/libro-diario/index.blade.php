<div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @if ($table)

                <div class="card">
                    <div class="card-header">
                        <div class="row" >
                            <div class="col-12 text-center">
                                LIBRO DIARIO
                            </div>
                            <div class="col-12 text-center">
                                Desde {{$desde}} hasta {{$hasta}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      
                       @if (count($comprobantes)> 0)
                        @foreach ($comprobantes as $comprobante)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-md-3">Comprobante</label>
                                            <input type="text" name="" id="" value="{{$comprobante->idComprobante}}" class="form-control col-md-8" placeholder="" aria-describedby="helpId">
                                        </div> 
                                        <div class="form-group row">
                                            <label for="" class="col-md-3">Razon Social</label>
                                            <input type="text" name="" id="" value="{{$comprobante->razon_social}}" class="form-control col-md-8" placeholder="" aria-describedby="helpId">
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="" class="col-md-3">Glosa</label>
                                            <input type="text" name="" id="" value="{{$comprobante->glosa}}" class="form-control col-md-8" placeholder="" aria-describedby="helpId">
                                        </div>    
                                    </div>    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-md-3">Fecha</label>
                                            <input type="text" name="" id=""  value="{{$comprobante->fecha}}" class="form-control col-md-8" placeholder="" aria-describedby="helpId">
                                        </div> 
                                        <div class="form-group row">
                                            <label for="" class="col-md-3">Tipo Comprobante</label>
                                            <input type="text" name="" id="" value="{{comprobanteTipo($comprobante->idComprobanteTipo)->descripcion}}" class="form-control col-md-8" placeholder="" aria-describedby="helpId">
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <a name="" target="_black" id="" class="btn btn-sm btn-danger" href="{{ route('comprobantes.pdf', ['desde'=>$desde,'hasta'=>$hasta,'idComprobanteTipo'=>$idTipoComprobante]) }}" role="button">
                                                    <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                {{ $comprobantes->render() }}
                                            </div>
                                        </div>
                                    </div>  
                                </div>  
                                <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Descripcion</th>
                                                        <th>Debe</th>
                                                        <th>Haber</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (detallecomprobantelibro($comprobante->idComprobante) as $item)
                                                    <tr>
                                                        <td scope="row">{{$item->idComprobanteCuentaDetalle}}</td>
                                                        <td>{{$item->glosa}}</td>
                                                        <td>{{$item->debe}}</td>
                                                        <td>{{$item->haber}}</td>
                                                    </tr>                                                    
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>                           
                        @endforeach
                       @else
                           <div class="alert alert-danger" role="alert">
                               <strong>Existen comprobantes entre este rango de fechas y de este tipo {{ comprobanteTipo($idTipoComprobante)->descripcion}}</strong>
                           </div>
                       @endif 

                    </div>
                    <div class="card-footer">
                        <button type="button" wire:click='close_table'  class="btn btn-primary">Regresar</button>
                    </div>
                </div>
            @else      
            <div class="card">
                <div class="card-header text-center">
                    Seleccione un filtro 
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ver-comprobantes">Ver Libro Diario</button>
                    <!-- Modal -->
                    <div wire:ignore.self class="modal fade" id="ver-comprobantes" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">LIBRO DIARIO</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="">Desde</label>
                                      <input type="date" wire:model='desde' name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hasta</label>
                                        <input type="date" wire:model='hasta' name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo de Comprobantes</label>
                                        <select name="" id="" wire:model='idTipoComprobante' class="form-control">
                                            @if (is_null($idTipoComprobante))
                                                <option value="">Seleccione una opcion</option>
                                            @endif
                                            @foreach (comprobanteTipos() as $tipo)
                                                <option value="{{$tipo->idComprobanteTipo}}">{{$tipo->descripcion}}</option>                                                
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" wire:click='show_table' data-dismiss="modal" class="btn btn-primary">Guardar</button>
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
