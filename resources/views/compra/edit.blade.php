@extends('layouts.home')
@section('title')
@section('content')
<h1>edicion de datos </h1>
<form action="{{url('compra/'.$compra->id)}}" method="post">
@csrf
{{method_field('PATCH')}}
@include('compra.form')
</form>