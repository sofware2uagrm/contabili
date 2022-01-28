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

<form action="{{ route('gestions.store' ) }}" method="post"  enctype="multipart/form-data">
@csrf
@include('gestions.form',['modo'=>'Crear']);
</form>

@stop
