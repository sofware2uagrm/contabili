<div>
    <div class="card">
        <div class="card-body">
            <select name="" id="" class="form-control" wire:modal="empresa_id">
                    <option value="">Selecione una empresas</option>            
                    @foreach (empresas_user(Auth::user()->id) as $empresa)
                        <option value="{{$empresa->idEmpresa}}">{{$empresa->idEmpresa}}{{$empresa->razonsocial}}</option>
                    @endforeach
            </select>
            ijoij
            {{$this->empresa_id}}
        </div>
        
    </div>
 </div>
