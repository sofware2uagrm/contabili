<?php

namespace App\Models\Seguridad;

use App\Models\Functions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoUsuario extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'grupousuario';
    protected $primaryKey = 'idgrupousuario';

    public $timestamps = true;

    protected $dates = [
        "created_at", "updated_at", "deleted_at",
    ];

    protected $attributes = [
        "nota" => null, "issuperadmin" => "N", "isadmin" => "N",
        "x_idusuario" => null,
        "isdelete" => "A", "estado" => "A",
    ];

    protected $fillable = [
        "descripcion", "nota", "issuperadmin", "isadmin",
        "x_idusuario", "x_fecha", "x_hora", "isdelete", "estado",
    ];

    public function get_data( $query, $request ) {

        $search = isset( $request->search ) ? $request->search : null;
        $order = isset( $request->order ) ? $request->order : "ASC";
        $column = isset( $request->column ) ? $request->column : "idgrupousuario";

        $functions = new Functions();

        if ( strtoupper( $order ) !== "DESC" ) $order = "ASC";

        $grupousuario = $query
            ->select( [
                'idgrupousuario', 'descripcion', 'nota',
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

        return $grupousuario;
    }

    public function get_paginate( $query, $request ) {

        $search    = isset( $request->search ) ? $request->search : null;
        $order     = isset( $request->order ) ? $request->order : "ASC";
        $column    = isset( $request->column ) ? $request->column : "idgrupousuario";
        $paginate  = isset( $request->search ) ? $request->search : 10;

        $functions = new Functions();

        if ( strtoupper( $order ) !== "DESC" ) $order = "ASC";
        if ( !is_numeric( $paginate ) ) $paginate = 10;

        $grupousuario = $query
            ->select( [
                'idgrupousuario', 'descripcion', 'nota',
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

        return $grupousuario;
    }

    public function guardar( $query, $request ) 
    {
        $descripcion  = isset( $request->descripcion ) ? $request->descripcion : null;
        $nota         = isset( $request->nota ) ? $request->nota : null;

        $x_idusuario  = isset( $request->x_idusuario ) ? $request->x_idusuario : null;
        $x_fecha      = isset( $request->x_fecha ) ? $request->x_fecha : null;
        $x_hora       = isset( $request->x_hora ) ? $request->x_hora : null;

        $grupousuario = $query->create( [
            'descripcion' => $descripcion,
            'nota' => $nota,

            'x_idusuario' => $x_idusuario,
            'x_fecha'     => $x_fecha,
            'x_hora'      => $x_hora,
        ] );

        return $grupousuario;
    }

    public function actualizar( $query, $request ) 
    {
        $idgrupousuario = isset( $request->idgrupousuario ) ? $request->idgrupousuario : null;
        $descripcion    = isset( $request->descripcion ) ? $request->descripcion : null;
        $nota    = isset( $request->nota ) ? $request->nota : null;

        $grupousuario = $query->where( 'idgrupousuario', '=', $idgrupousuario )
            ->update( [
                'descripcion' => $descripcion,
                'nota' => $nota,
            ] );

        return $grupousuario;
    }

    public function detalle( $query, $idgrupousuario )
    {

        $grupousuario = $query
            ->select( [
                'idgrupousuario', 'descripcion', 'nota',
                'estado', 'isdelete', 'x_fecha', 'x_hora',
            ] )
            ->where( 'idgrupousuario', '=', $idgrupousuario )
            ->orderBy( 'idgrupousuario', 'ASC' )
            ->first();

        return $grupousuario;
    }
    
}
