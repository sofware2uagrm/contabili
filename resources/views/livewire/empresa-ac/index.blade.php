<div>
    <div class="card">
        <div class="card-body">

<form action="{{route('acempresas.store') }}" method="post">        
   @csrf
    <select name="empresa_id" id="empresa_id" class="form-control" ">
                    <option value="">Selecione una empresas</option>            
                    @foreach (empresas_user(Auth::user()->id) as $empresa)
                        <option value="{{$empresa->idEmpresa}}">{{$empresa->idEmpresa}}{{$empresa->razonsocial}}</option>
                    @endforeach
            </select>

           
        </div>
        <input type="submit" value="agrear">
    </form>
    </div>
 </div>