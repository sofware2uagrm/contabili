@extends('layouts.home')
@section('title')
    <title>Page Venta</title>
@endsection

@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Venta",
        "page"=>"Dashboard",
        "subPage"=>"Venta",
    ])
@endsection

@section('content')
    @livewire('venta.index', ['user' => Auth::user()->id])    
@endsection