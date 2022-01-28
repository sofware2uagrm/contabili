@extends('layouts.home')
@section('title')
    <title>Page Libro Diario</title>
@endsection

@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Libro Diario",
        "page"=>"Dashboard",
        "subPage"=>"Libro Diario",
    ])
@endsection

@section('content')
    @livewire('libro-diario.index', ['user' => Auth::user()->id])    
@endsection