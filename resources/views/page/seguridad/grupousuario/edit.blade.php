
@extends('layouts.home')

@section('title')
    <title>Grupo Usuario</title>
@endsection

@section('content')
    <input type="hidden" id="idgrupousuario" value="{{ $idgrupousuario }}" />
    <div id="EditGrupoUsuario">
    </div>

    <script src="/js/module.js"></script>
@endsection