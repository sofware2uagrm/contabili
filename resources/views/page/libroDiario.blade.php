@extends('layouts.home')
@section('title')
    <title>Libro Diario</title>
@endsection


@section('content')
<h1>Libro Diario</h1>
    @livewire('libro-diario.index', ['user' => Auth::user()->id])    
@endsection