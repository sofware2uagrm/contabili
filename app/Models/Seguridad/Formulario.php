<?php

namespace App\Models\Seguridad;

use App\Models\Functions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'formulario';
    protected $primaryKey = 'idformulario';

    public $timestamps = true;

    protected $dates = [
        "created_at", "updated_at", "deleted_at",
    ];

    protected $attributes = [
        "nota" => null, "activo" => "A", "fkidformulariopadre" => null,
        "x_idusuario" => null,
        "isdelete" => "A", "estado" => "A",
    ];

    protected $fillable = [
        "descripcion", "nota", "activo", "fkidformulariopadre",
        "x_idusuario", "x_fecha", "x_hora", "isdelete", "estado",
    ];

    public function get_data( $query, $request ) {

        $search = isset( $request->search ) ? $request->search : null;
        $order = isset( $request->order ) ? $request->order : "ASC";
        $column = isset( $request->column ) ? $request->column : "idformulario";

        $functions = new Functions();

        if ( strtoupper( $order ) !== "DESC" ) $order = "ASC";

        $formulario = $query
            ->select( [
                'idformulario', 'descripcion', 'nota', 'activo', 'fkidformulariopadre',
                'estado', 'isdelete', 'x_fecha', 'x_hora',
            ] )
            ->where( function ( $query ) use ( $search, $functions ) {
                if ( !is_null( $search ) ) {
                    return $query->where( 'descripcion', $functions->isLikeOrIlike(), "%" . $search . "%" );
                }
                return;
            } )
            ->orderBy( $column, $order )
            ->get();

        return $formulario;
    }

    public function get_paginate( $query, $request ) {

        $search    = isset( $request->search ) ? $request->search : null;
        $order     = isset( $request->order ) ? $request->order : "ASC";
        $column    = isset( $request->column ) ? $request->column : "idformulario";
        $paginate  = isset( $request->search ) ? $request->search : 10;

        $functions = new Functions();

        if ( strtoupper( $order ) !== "DESC" ) $order = "ASC";
        if ( !is_numeric( $paginate ) ) $paginate = 10;

        $formulario = $query
            ->select( [
                'idformulario', 'descripcion', 'nota', 'activo', 'fkidformulariopadre',
                'estado', 'isdelete', 'x_fecha', 'x_hora',
            ] )
            ->where( function ( $query ) use ( $search, $functions ) {
                if ( !is_null( $search ) ) {
                    return $query->where( 'descripcion', $functions->isLikeOrIlike(), "%" . $search . "%" );
                }
                return;
            } )
            ->orderBy( $column, $order )
            ->paginate($paginate);

        return $formulario;
    }

    public function guardar( $query, $request ) 
    {
        $fkidformulariopadre  = isset( $request->fkidformulariopadre ) ? $request->fkidformulariopadre : null;
        $descripcion  = isset( $request->descripcion ) ? $request->descripcion : null;
        $nota         = isset( $request->nota ) ? $request->nota : null;

        $x_idusuario  = isset( $request->x_idusuario ) ? $request->x_idusuario : null;
        $x_fecha      = isset( $request->x_fecha ) ? $request->x_fecha : null;
        $x_hora       = isset( $request->x_hora ) ? $request->x_hora : null;

        $formulario = $query->create( [
            'fkidformulariopadre' => $fkidformulariopadre,
            'descripcion' => $descripcion,
            'nota' => $nota,

            'x_idusuario' => $x_idusuario,
            'x_fecha'     => $x_fecha,
            'x_hora'      => $x_hora,
        ] );

        return $formulario;
    }

    public function actualizar( $query, $request ) 
    {
        $idformulario = isset( $request->idformulario ) ? $request->idformulario : null;
        $descripcion    = isset( $request->descripcion ) ? $request->descripcion : null;
        $nota    = isset( $request->nota ) ? $request->nota : null;

        $formulario = $query->where( 'idformulario', '=', $idformulario )
            ->update( [
                'descripcion' => $descripcion,
                'nota' => $nota,
            ] );

        return $formulario;
    }

    public function detalle( $query, $idformulario )
    {

        $formulario = $query
            ->select( [
                'idformulario', 'descripcion', 'nota', 'activo',
                'estado', 'isdelete', 'x_fecha', 'x_hora',
            ] )
            ->where( 'idformulario', '=', $idformulario )
            ->orderBy( 'idformulario', 'ASC' )
            ->first();

        return $formulario;
    }

}
