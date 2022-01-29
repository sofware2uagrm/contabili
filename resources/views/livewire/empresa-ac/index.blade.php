<div>
    <div class="card">
        <div class="card-body">

<form action="">            <select name="" id="" class="form-control" wire:modal="empresa_id">
                    <option value="">Selecione una empresas</option>            
                    @foreach (empresas_user(Auth::user()->id) as $empresa)
                        <option value="{{$empresa->idEmpresa}}">{{$empresa->idEmpresa}}{{$empresa->razonsocial}}</option>
                    @endforeach
            </select>

            {{$this->empresa_id}}
        </div>
    </form>
    </div>
 </div>
