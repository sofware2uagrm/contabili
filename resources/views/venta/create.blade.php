@extends('layouts.home')
@section('title')
@section('content')
    <title>Page Venta</title>
<div class="col">
<center><h1>REGISTRO DE VENTA</h1> </center>
</div>
<form action="{{url('venta')}}" method="post"  enctype="multipart/form-data">
@csrf
@include('venta.form')
</form>