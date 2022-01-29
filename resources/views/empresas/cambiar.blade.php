@extends('layouts.home')
@section('title')
    <title></title>
@endsection




@section('content')

    @livewire('comprobante.index', ['user' => Auth::user()->id])    
@endsection