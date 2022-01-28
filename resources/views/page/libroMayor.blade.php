@extends('layouts.home')
@section('title')
    <title>Page Libro Mayor</title>
@endsection

@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Libro MAyor",
        "page"=>"Dashboard",
        "subPage"=>"Libro MAyor",
    ])
@endsection

@section('content')
    @livewire('libro-mayor.index', ['user' => Auth::user()->id])    
@endsection