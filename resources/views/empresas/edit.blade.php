@extends('layouts.home')
@section('title')
    <title> Empresa</title>
@endsection




@section('content')
<h1>Editar Empresa</h1>
<div class="card">
  <div class="card-body">
    <form action="{{ route('empresas.update',$empresa)}}" method="post" enctype="multipart/form-data">
      @csrf
      {{method_field('PATCH')}}
      @include('empresas.form',['modo'=>'Editar']);
      
  </div>
</div>


@endsection




