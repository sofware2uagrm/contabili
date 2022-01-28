@extends('layouts.home')
@section('title')
    <title>Comprobante</title>
@endsection


@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Comprobante",
        "page"=>"Dashboard",
        "subPage"=>"Comprobante",
    ])
@endsection

@section('content')

<div class="card">
<div class="card-body">

<form action="{{ route('empresas.store' ) }}" method="post"  enctype="multipart/form-data">
@csrf
@include('empresas.form',['modo'=>'Crear']);
</form>

</div>
</div>
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
       
      {{--   <div class="row mb-3">
            {!! Form::open() !!}
            <div class="image-wrapper">
                <img id="picture" src="https://img2.freepng.es/20180423/jee/kisspng-accountant-accounting-cartoon-accounting-financial-5ade05d54ec3d5.5356307815244999253226.jpg" alt="">

            </div>
           <div class="form-group">
            {!! Form::label('file ', 'INGRESE LA FOTO') !!}

            {!! Form::file('file',['class'=>'form-control-file']) !!}
           </div>
           
            {!! Form::close() !!} --}}
