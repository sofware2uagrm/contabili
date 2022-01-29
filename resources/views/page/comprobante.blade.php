@extends('layouts.home')
@section('title')
    <title>Comprobante</title>
@endsection




@section('content')
<h1>Comprobante</h1>
    @livewire('comprobante.index', ['user' => Auth::user()->id])    
@endsection