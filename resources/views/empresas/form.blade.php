
<div class="row">
<div class="col">   
<label for="razonsocial">RAZON SOCIAL</label>
<input class="form-control" placeholder="INGRESE .. RAZON SOCIAL " type="text" name="razonsocial"  value="{{isset($empresa->razonsocial)?$empresa->razonsocial:""}}" id="razonsocial">
<br>
<label for="nit">NIT</label> 
<input class="form-control" placeholder="INGRESE .. NIT"type="text" name="nit" value="{{isset($empresa->nit)?$empresa->nit:""}}" id="nit">
<br> 
<label for="licencia">LICENCIA</label> 
<input class="form-control" placeholder="INGRESE .. LICENCIA"type="text" name="licencia" value="{{isset($empresa->licencia)?$empresa->nit:""}}" id="licencia">
<br> 
<label for="telefono">TELÉFONO</label>
<input class="form-control" placeholder="INGRESE .. TELÉFONO"type="text" name="telefono" value="{{isset($empresa->telefono)?$empresa->telefono:""}}" id="telefono"> 
<br>
<label for="ciudad">CIUDAD</label>
<input class="form-control" placeholder="INGRESE .. CIUDAD"type="text" name="ciudad" value="{{isset($empresa->ciudad)?$empresa->ciudad:""}}" id="ciudad"> 
<br>
<label for="actividad">ACTIVIDAD</label>
<input class="form-control" placeholder="INGRESE .. ACTIVIDAD"type="text" name="actividad" value="{{isset($empresa->actividad)?$empresa->actividad:""}}" id="actividad"> 

</div>
<div class="col">

<label for="direccion">DIRECCIÓN</label>
<input class="form-control" placeholder="INGRESE .. DIRECCIÓN"type="text" name="direccion" value="{{isset($empresa->direccion)?$empresa->direccion:""}}" id="direccion"> 
<br>
    
    
<label for="responsable">RESPONSABLE</label>
<input class="form-control" placeholder="INGRESE ..NOMBRE DEL RESPONSABLE" type="text" name="responsable" value="{{isset($empresa->responsable)?$empresa->responsable:""}}" id="responsable"> 
<br>
<label for="ci_responsable">CEDULA DEL RESPONSABLE</label>
<input class="form-control" placeholder="INGRESE .. CI DEL RESPONSABLE" type="text" name="ci_responsable" value="{{isset($empresa->ci_responsable)?$empresa->ci_responsable:""}}" id="ci_responsable"> 
<br>
<label for="sucursal">SUCURSAL</label>
<input class="form-control" placeholder="INGRESE .. SUCURSAL" type="text" name="sucursal" value="{{isset($empresa->sucursal)?$empresa->sucursal:""}}" id="sucursal"> 
<br>

<label for="estado">ESTADO</label>
<select name="estado" id="estado" class="form-control">
    <option value="{{isset($empresa->estado)?$empresa->estado:""}}">{{isset($empresa->estado)?$empresa->estado:""}}</option>
    <option value="activo">ACTIVO</option>
    <option value="inactivo">PASIVO</option>
    
</select>
<br>

<label for="logo">LOGO</label>
@if(isset($empresa->logo))

<img id="blah" src="{{Storage::url($empresa->logo)}}" width="120" alt="">
    
@else
    
<img id="blah" src="https://img2.freepng.es/20180423/jee/kisspng-accountant-accounting-cartoon-accounting-financial-5ade05d54ec3d5.5356307815244999253226.jpg" width="140" alt="">
@endif
</div>

<br>

</div>



<input type="file" name="logo" value="" id="imgInp"> 
 
<br>
<input type="submit" value="{{$modo}} datos"> 

<a href="{{url('/empresas/')}}">volver </a> 
    