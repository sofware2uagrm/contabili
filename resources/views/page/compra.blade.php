@extends('layouts.home')
@section('title')
    <title>Page Compra</title>
@endsection

@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Compra",
        "page"=>"Dashboard",
        "subPage"=>"Compra",
    ])
@endsection

@section('content')
    @livewire('compra.index', ['user' => Auth::user()->id])    
@endsection