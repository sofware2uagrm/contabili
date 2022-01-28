<div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            @if($form)
            {{$isEdit ? "EDITAR" : "GUARDAR"}}
            <div class="card">
                <div class="card-header">
                    {{$title}}
                </div>

                <div class="card-body m-4 p-4">
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <input type="text" wire:model='descripcion' class="form-control" value="{{$descripcion}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" wire:click='create_or_update()' class="btn btn-primary">Guardar</button>
                    <button type="button" wire:click='closed_form()' class="btn btn-danger">Cancelar</button>
                </div>
            </div>
            @else
            <div class="card">
                <div class="card-header">
                    <button wire:click='show_create' class="btn btn-sm btn-primary">Agregar</button>    
                </div>                

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Descripción</th>
                                    <th class="border-0">Estado</th>
                                    <th class="border-0">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipos as $tipo)
                                    <tr>
                                        <td>{{$tipo->idCuentaPlanTipo}}</td>
                                        <td>{{$tipo->descripcion}}</td>
                                        <td>
                                            <span class="badge {{$tipo->estado ? 'badge-success' : 'badge-danger' }}">
                                                {{$tipo->estado ? 'Activado' : 'Desactivado' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button wire:click='update_estado({{$tipo->idCuentaPlanTipo}})'  class="btn btn-sm {{!$tipo->estado ? 'btn-success' : 'btn-danger' }}">
                                                @if ($tipo->estado)
                                                    <i class="fas fa-unlock-alt"></i>
                                                @else
                                                    <i class="fas fa-unlock"></i> 
                                                @endif
                                            </button>

                                            <button wire:click='delete_tipo_cuenta({{$tipo->idCuentaPlanTipo}})'  class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- Button trigger modal -->
                                            <button wire:click='show_update({{$tipo->idCuentaPlanTipo}})' type="button" class="btn btn-sm btn-success">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                          
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            @endif

        </div>
    </div>
</div>
