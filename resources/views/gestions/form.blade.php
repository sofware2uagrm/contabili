
<div class="row">
    <div class="col">   
    <label for="descripcion">DESCRIPCION</label>
    <input class="form-control" placeholder="imgrese" type="text" name="descripcion"  value="{{isset($gestion->descripcion)?$gestion->descripcion:""}}" id="descripcion">
    <br>
<form >
   {{--  <select name="fechagestion" id="fechagestion">
        @foreach ($tipo_gestions as $tipo_gestion)
        <option value="" > {{$tipo_gestion->nombre}}<option>
        @endforeach
    </select> --}}
    <div id="sel" style="display:block;">    
    <label>SELECIONE EL TIPO DE GESTION:</label>
    <select class="ciudad">
       {{--  @foreach ($tipo_gestions as $tipo_gestion)
        <option value="{{$tipo_gestion->nombre}}" > {{$tipo_gestion->nombre}}<option>
        @endforeach
        --}}
        <option value="" selected disabled>SELECCIONE UNA OPCION</option>

      
        <option value="INDUSTRIAL">INDUSTRIALES ,PETROLERAS</option>

        <option value="GOMERAS">GOMERAS,CASTAÑERAS,AGRICOLAS,GANADERAS</option>
        <option value="MINERAS">MINERAS</option>

        <option value="COMERCIAL">COMERCIAL ,BANCARIAS ,SERVICIOS,SEGUROS</option>

    </select>
</div>

</form>
    <div id="OtroTema" style="display:none;">	
       {{--  <input type="text" name="temaotro"> --}}
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
    

    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script>#contenidoTabla {
        font-size: 15px;
      }
      
      td {
        font-size: 10px;
        color: red;
      }
      
      th {
        font-size: 25px;
        color:green;
      }</script>
    
    @endsection
    
    @section('js') 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    
    <script>
    $(document).ready(function(){
    
    $("select.ciudad").change(function(){
    
        var seleccion= $(this).children("option:selected").val();
        var now = new Date();
            var month = now.getMonth();               
            var day = 1;
   
    
          
if(seleccion=='INDUSTRIAL')
{   var today = now.getFullYear() + '-' +4  + '-' + 1;
    $('#fecha').val(today); 
    $('#fecha2').val(now.getFullYear()+1 + '-' + 3 + '-' + 31);   
     $('#fecha_fin').val(null);   
    $('#fecha_ini').val(null);   
}   
if(seleccion=='GOMERAS')
{   var today = now.getFullYear() + '-' + 7 + '-' + 1;
    $('#fecha').val(today); 
    $('#fecha2').val(now.getFullYear()+1 + '-' + 6 + '-' + 30);   
    $('#fecha_fin').val(null);   
   $('#fecha_ini').val(null);  
     }
if(seleccion=='MINERAS')
{   var today = now.getFullYear() + '-' + 10 + '-' + 1;
    $('#fecha').val(today); 
    $('#fecha2').val(now.getFullYear()+1 + '-' + 9 + '-' + 30);   
    $('#fecha_fin').val(null);   
    $('#fecha_ini').val(null); 
     }
if(seleccion=='COMERCIAL')
{   var today = now.getFullYear() + '-' + 1 + '-' + 1;
    $('#fecha').val(today); 
    $('#fecha2').val(now.getFullYear() + '-' + 12 + '-' + 31);   
    $('#fecha_fin').val(null);   
   $('#fecha_ini').val(null);   
}   

        
    
       
       // console.log(seleccion); 
    });
    
    });
    
    
    </script>
    <script type="text/javascript">	
    function ActivarCampoOtroTema(){		
        var contenedor = document.getElementById("OtroTema");	
            contenedor.style.display = "block";	
            var contenedorsel = document.getElementById("sel");	
            contenedorsel.style.display = "none";			
        var contenedor2 = document.getElementById("OtroTema2");	
            contenedor2.style.display = "none";	
            return true;	
            }
            function ActivarCampoOtroTema2(){		
        var contenedor = document.getElementById("OtroTema");	
            contenedor.style.display = "none";		
        var contenedor2 = document.getElementById("OtroTema2");	
            contenedor2.style.display = "block";	
            var contenedorsel = document.getElementById("sel");	
            contenedorsel.style.display = "block";			
      
            return true;	
            }
    </script>
    
        
            
    @endsection
    