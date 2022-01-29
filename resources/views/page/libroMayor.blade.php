@extends('layouts.home')
@section('title')
    <title>Libro Mayor</title>
@endsection


@section('content')
<h1>Libro Mayor</h1>
    @livewire('libro-mayor.index', ['user' => Auth::user()->id])    
@endsection