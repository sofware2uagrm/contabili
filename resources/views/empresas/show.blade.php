@extends('layouts.home')
@section('title')
    <title>Datos De la empresa</title>
@endsection


@section('content')

<form action="{{ route('empresas.update',$empresa)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('empresas.form',['modo'=>'Editar']);
    
  @stop
  
@section('css')

<style>
    .leo{
        position: relative;
        padding-bottom: 53%;
    } 
    .leo img{
       position: absolute;
        object-fit: cover;
        width: auto;
        height: 230px;
    } 
</style>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
/*  document.getElementById("file").addEventListener('change',cambiarImage);
  function cambiarImagen(event){
      var file=event.target.files[0];
      var reader =new FileReader();
   reader.onload=(event)=>{
          document.getElementBylId("picture").setAttribute('scr',event.target.result);
        
    }reader.readerAsDataURL(file);
} */

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


@endsection