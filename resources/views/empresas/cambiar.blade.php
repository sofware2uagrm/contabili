@extends('layouts.home')
@section('title')
    <title></title>
@endsection




@section('content')
    @livewire('empresa-ac.index', ['user' => Auth::user()->id])    
@endsection