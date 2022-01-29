@extends('layouts.home')
@section('title')
    <title>Gestion</title>
@endsection


@section('content')
<h1>Crear Gestion</h1>

<form action="{{ route('gestions.store' ) }}" method="post"  enctype="multipart/form-data">
@csrf
@include('gestions.form',['modo'=>'Crear']);
</form>

@endsection