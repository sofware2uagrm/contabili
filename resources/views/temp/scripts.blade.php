<!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script> -->
   <!-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
   -->
    <!-- bootstap bundle js -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    <!-- sparkline js -->
    <script src="{{ asset('assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <!-- chart c3 js -->
    <script src="{{ asset('assets/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
    <script src="{{ asset('assets/libs/js/dashboard-ecommerce.js') }}"></script>

    <!-- leonel -->
    <script>
    $(function() {
        $("#limpiador").click(function() {
             // alert
             swal({
                 title: "desea borrar las historias de usuarios",
                 text: "{{Auth::user()->name}}",
                 icon: "warning",
                 buttons: true,
                 dangerMode: false,
             }).then((willDelete) => {
                             if (willDelete) {
                                 $("#limpiador").submit();
                             } else {
                                 swal("cancelada!");
                             }
               });
           })
         }
       )
     </script>
         
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

    <script>
        $(document).ready(function() {
            $('#empresatable').DataTable(
                {
        
                    responsive:true,
                    autoWhidh:false,
                
            
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por paginas",
                    "zeroRecords": "nada encontrado - disculpa",
                    "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ registros totales)",
                    'search':'buscar:',
                    'paginate':{
                    'next':'siguiente',
                    'previous':'anterior'
                }
                }
                    }    );
        } );
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
        function readURL(input) {
        if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
            var reader = new FileReader(); //Leemos el contenido
            reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
            $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        }

        $("#imgInp").change(function() { //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
        readURL(this);
        });
        </script>

    
        <script>

        function readURL(input) {
        if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
            var reader = new FileReader(); //Leemos el contenido
            
            reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
            $('#blah').attr('src', e.target.result);
            }
            /*  */
            reader.readAsDataURL(input.files[0]);
        }
        }
        $("#imgInp").change(function() { //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
        readURL(this);
        });
        </script>

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










    <!--LUCAS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>{{time();}}</script>
    

    <script>
        //ACTUALIZAR UN REGISTRO
        $('#forproyecto').submit(function(e){
            e.preventDefault();
            var habilitar_contabilidad = $("#habilitar_contabilidad").val();
            var id = $("#id_proyecto").val();
            var _token2 = $("input[name=_token]").val();
            var link="{{asset('')}}"+"proyecto/update/"+id;
            $.ajax({
                url: link,
                type: "POST",
                data:{
                    id:id,
                    habilitar_contabilidad:habilitar_contabilidad,
                    _token:_token2
                },
                success:function(response){
                    if(response){
                        toastr.info('El registro de moneda fue actualizado correctamente.', 'Actualizar Registro', {timeOut:3000})        
                    }
                }
            })
           var link2="{{asset('proyecto')}}";
           $.ajax({
                url: link2,      
                success:function(response){
                    if(response){
                   // nada nose porq motivos falla el sin recargar
                    }
                }
            })
            
        });
        </script>
        
        <!-- end java scrip mas ajax-->

        <script>
            //ACTUALIZAR UN REGISTRO
            $('#forformato').submit(function(e){
                e.preventDefault();
                var imprimir_nombre_comprobante = $("#imprimir_nombre_comprobante").val();
                var id = $("#id_formato").val();
                var mostrar_fecha_hora = $("#mostrar_fecha_hora").val();
                var habilitar_ref = $("#habilitar_ref").val();
                var _token2 = $("input[name=_token]").val();
                var link="{{asset('')}}"+"formatoDocumento/update/"+id;
                $.ajax({
                    url: link,
                    type: "POST",
                    data:{
                        id:id,
                        imprimir_nombre_comprobante:imprimir_nombre_comprobante,
                        mostrar_fecha_hora:mostrar_fecha_hora,
                        habilitar_ref:habilitar_ref,
                        _token:_token2
                    },
                    success:function(response){
                        if(response){
                            toastr.info('El registro de Formato Doc fue actualizado correctamente.', 'Actualizar Registro', {timeOut:3000})        
                        }
                    }
                })
            var link2="{{asset('formatoDocumento/update')}}";
            $.ajax({
                    url: link2,      
                    success:function(response){
                        if(response){
                    // nada nose porq motivos falla el sin recargar
                        }
                    }
                })
                
            });
            </script>

            
<script>
    //ACTUALIZAR UN REGISTRO
    $('#forasiento').submit(function(e){
        e.preventDefault();
        var generar_asientos = $("#generar_asientos").val();
        var credito_fiscal = $("#credito_fiscal").val();
        var it = $("#it").val();
        var id = $("#id_asiento").val();
        var _token2 = $("input[name=_token]").val();
        var link="{{asset('')}}"+"asientoLCV/update/"+id;
        $.ajax({
            url: link,
            type: "POST",
            data:{
                id:id,
                generar_asientos:generar_asientos,
                credito_fiscal:credito_fiscal,
                it:it,
                _token:_token2
            },
            success:function(response){
                if(response){
                    toastr.info('El registro de asiento LCV fue actualizado correctamente.', 'Actualizar Registro', {timeOut:3000})        
                }
            }
        })
       var link2="{{asset('asientoLCV')}}";
       $.ajax({
            url: link2,      
            success:function(response){
                if(response){
               // nada nose porq motivos falla el sin recargar
                }
            }
        })
        
    });
    </script>

<script>
    //ACTUALIZAR UN REGISTRO
    $('#prueba').submit(function(e){
        e.preventDefault();
        var c=1;
        var n=$("#contador").val();
        while (c<n) { 
        var t="#form"+c;
        var id = $(t+"id_nivel").val();
        var tipo = $("#form"+id+"Tipo_nivel").val();
        var _token2 = $("input[name=_token]").val();
        var link="{{asset('')}}"+"tipoNivel/update/"+id;
        
        $.ajax({
            url: link,
            type: "POST",
            data:{
                id:id,
                tipo:tipo,
                _token:_token2
            },
            success:function(response){
                if(response){
                    toastr.info('El registro nivel fue actualizado correctamente.', 'Actualizar Registro', {timeOut:3000})        
                }
            }
        })
        c++;
       }
       var link2="{{asset('')}}"+"tipoNivel";

       $.ajax({
            url: link2,
             
            success:function(resp){
               //$("#contenido").html(resp); 
               window.location.href = window.location.href;
            }
        })
    });
  </script>
  <!-- END LUCAS-->

  <script>
    //ACTUALIZAR UN REGISTRO
    $('#guardaTodoFirma').submit(function(e){
        e.preventDefault();
        var c=1;
        var n=$("#contador").val();
        while (c<n) {
        var t="#form"+c;
        var id = $(t+"id_firma").val();
        var firma1 = $("#form"+id+"firma1").val();
        var firma2 = $("#form"+id+"firma2").val();
        var firma3 = $("#form"+id+"firma3").val();
        var firma_interesado = $("#form"+id+"firma_interesado").val();
        var _token2 = $("input[name=_token]").val();
        var link="{{asset('')}}firmaReporte/update/"+id;
        $.ajax({
            url: link,
            type: "POST",
            data:{
                id:id,
                firma1:firma1,
                firma2:firma2,
                firma3:firma3,
                firma_interesado:firma_interesado,
                _token:_token2
            },
            success:function(response){
                if(response){
                    toastr.info('El registro firma fue actualizado correctamente', 'Actualizar Registro', {timeOut:3000})        
                }
            }
        })
        c++;
       }
       var link2="{{asset('firmaReporte')}}";
     $.ajax({
          url: link2,      
          success:function(resp){
             // $("#contenido").html(resp);   
          }
      })
    });
    </script>

<script>
    //ACTUALIZAR UN REGISTRO
    $('#formoneda').submit(function(e){
        e.preventDefault();
        var id_moneda = $("#id_moneda").val();
        var id_aux = $("#id_aux").val();
        var _token2 = $("input[name=_token]").val();
        var link="{{asset('')}}"+"moneda/update/"+id_moneda;
        $.ajax({
            url: link,
            type: "POST",
            cache: false,
            async: false,
            data:{
                id_moneda:id_moneda,
                id_aux:id_aux,
                _token:_token2
            },
            success:function(response){
                if(response){
                    toastr.info('El registro de moneda fue actualizado correctamente.', 'Actualizar Registro', {timeOut:3000})        
                }
            }
        })
       var link2="{{asset('moneda')}}";
       $.ajax({
            url: link2,      
            success:function(response){
                if(response){
               // nada nose porq motivos falla el sin recargar
               window.location.href = window.location.href;
                }
            }
        })
    });
</script>

<!--//agregamos Java Script-->


 

  