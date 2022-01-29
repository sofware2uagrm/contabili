
<div class="row">
    <div class="col">   
    <label for="descripcion">DESCRIPCION</label>
    <input class="form-control" placeholder="imgrese" type="text" name="descripcion"  value="{{isset($gestion->descripcion)?$gestion->descripcion:""}}" id="descripcion">
    <br>
<form >
  
    <div id="sel" style="display:block;">    
    <label>SELECIONE EL TIPO DE GESTION:</label>
    <select class="ciudad">
        <option value="" selected disabled>SELECCIONE UNA OPCION</option>
        <option value="INDUSTRIAL">INDUSTRIALES ,PETROLERAS</option>
        <option value="GOMERAS">GOMERAS,CASTAÑERAS,AGRICOLAS,GANADERAS</option>
        <option value="MINERAS">MINERAS</option>
        <option value="COMERCIAL">COMERCIAL ,BANCARIAS ,SERVICIOS,SEGUROS</option>
    </select>
</div>

</form>
    <div id="OtroTema" style="display:none;">	
       <label for="fecha_ini">FECHA DE INICIO</label> 
       <input class="form-control" placeholder="imgrese"type="date" name="fecha_ini" value="{{isset($gestion->fecha_fin)?$gestion->fecha_fin:""}}" id="fecha_ini">
       <br> 
       <label for="fecha_fin">FECHA DE FIN</label>
       <input class="form-control" placeholder="imgrese"type="date" name="fecha_fin" value="{{isset($gestion->fecha_fin)?$gestion->fecha_fin:""}}" id="fecha_fin"> 
       <br>
       <input onclick="ActivarCampoOtroTema2();" type="button" name="tema[]" value="Colocar auto" >
  
    </div>
    
  
    

   <div id="OtroTema2" style="display:block;" >
  
    <label for="fecha_fin">FECHA DE INICIO</label>
    <br>
    <input type="text" name="fecha" id="fecha"  value="{{isset($gestion->fecha_fin)?$gestion->fecha_ini:""}}"> 
  <br>
    <label for="fecha_fin">FECHA DE FIN</label>
    <br>
    <input type="text" name="fecha2" id="fecha2"  value="{{isset($gestion->fecha_fin)?$gestion->fecha_fin:""}}"> 
  <br>
        <input onclick="ActivarCampoOtroTema();" type="button" name="tema[]" value="Colocar Manualmente" >
  
    </div>
<br>
    
    <input type="submit" value="{{$modo}} datos"> 

    <a href="{{url('/gestions/')}}">volver </a> 
    
    
    