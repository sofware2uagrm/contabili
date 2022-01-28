@extends('layouts.home')
@section('title')
    <title>Comprobante</title>
@endsection


@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Comprobante",
        "page"=>"Dashboard",
        "subPage"=>"Comprobante",
    ])
@endsection

@section('content')
    @livewire('comprobante.index', ['user' => Auth::user()->id])    
@endsection