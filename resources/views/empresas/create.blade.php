@extends('layouts.home')
@section('title')
    <title>Empresa</title>
@endsection


@section('content')
<h1>Crear Empresa</h1>
<div class="card">
<div class="card-body">

<form action="{{ route('empresas.store' ) }}" method="post"  enctype="multipart/form-data">
@csrf
@include('empresas.form',['modo'=>'Crear']);
</form>

</div>
</div>
 
@endsection





     