@extends('layouts.home')

@section('title')
    <title>Page Plan</title>
@endsection

@section('breadcrumb')
    @include('temp.breadcrumb',[
        "title"=> "Plan de Cuentas",
        "page"=>"Dashboard",
        "subPage"=>"Cuenta Plan",
    ])
@endsection


@section('content')
    @livewire('plan.index', ['user' => Auth::user()->id])
@endsection