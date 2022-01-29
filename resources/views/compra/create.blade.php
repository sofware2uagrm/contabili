@extends('layouts.home')
@section('title')
@section('content')

<title>Page Compra</title>
<div class="col">
<center><h1>REGISTRO DE COMPRA</h1> </center>
</div>
<form action="{{url('compra')}}" method="post"  enctype="multipart/form-data">
@csrf
@include('compra.form')
</form>