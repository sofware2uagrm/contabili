@extends('layouts.home')

@section('title')
    <title>Plan De Cuentas</title>
@endsection




@section('content')
<h1>Plan De Cuentas</h1>
    @livewire('plan.index', ['user' => Auth::user()->id])
@endsection