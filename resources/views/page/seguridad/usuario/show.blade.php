
@extends('layouts.home')

@section('title')
    <title> Usuario </title>
@endsection

@section('content')
    <input type="hidden" id="idusuario" value="{{ $idusuario }}" />
    <div id="ShowUsuario">
    </div>

    <script src="/js/module.js"></script>
@endsection