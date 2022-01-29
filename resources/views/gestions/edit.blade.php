@extends('layouts.home')
@section('title')
    <title>Gestion</title>
@endsection


@section('content')
<h1>Editar Gestion</h1>

<form action="{{ route('gestions.update',$gestion)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('gestions.form',['modo'=>'Editar']);
    
 @endsection