<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use App\Models\Seguridad\AsignarFormulario;
use App\Models\Seguridad\AsignarUsuario;
use App\Models\Seguridad\Formulario;
use App\Models\Seguridad\GrupoUsuario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GrupoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        try {
            
            $grupouser = new GrupoUsuario();
            $arraygrupousuario = $grupouser->get_data( $grupouser, $request );
            
            return response()->json( [
                "rpta" => 1,
                "message" => "Servicio realizado exitosamente",
                "arrayGrupoUsuario" => $arraygrupousuario,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        try {
            
            return response()->json( [
                "rpta" => 1,
                "message" => "Servicio realizado exitosamente",
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        try {

            $rules = [
                'descripcion' => "required|max:150",
                'nota' => "nullable|max:300",

                'x_idusuario' => "nullable|numeric",
                'x_fecha' => "required|date",
                'x_hora' => "required|date_format:H:i:s",
            ];

            $messages = [
                "descripcion.required" => "Campo requerido",
                "descripcion.max" => "Se permite máximo 150 caracteres",

                "nota.max" => "Se permite máximo 300 caracteres",

                "x_idusuario.numeric" => "Campo permite tipo número",

                "x_fecha.required" => "Campo requerido",
                "x_fecha.date" => "Campo permite tipo fecha",

                "x_hora.required" => "Campo requerido",
                "x_hora.date_format" => "Campo permite tipo hora",
            ];

            $validator = Validator::make( $request->all(), $rules, $messages );

            if ( $validator->fails() ) {

                return response()->json( [
                    "rpta" => -1,
                    "message" => "Advertencia llenar campos requeridos",
                    "errors" => $validator->errors(),
                ] );
            }

            $grupouser = new GrupoUsuario();
            $grupousuario = $grupouser->guardar( $grupouser, $request );
            
            return response()->json( [
                "rpta" => 1,
                "message" => "Grupo Usuario creado exitosamente",
                "grupousuario" => $grupousuario,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, $idgrupousuario )
    {
        try {

            $grupouser = new GrupoUsuario();
            $grupousuario = $grupouser->detalle( $grupouser, $idgrupousuario );

            if ( is_null( $grupousuario ) ) {
                return response()->json( [
                    "rpta" => -1,
                    "message" => "Grupo Usuario no existente",
                ] );
            }
            
            return response()->json( [
                "rpta" => 1,
                "message" => "Servicio realizado exitosamente",
                "grupousuario" => $grupousuario,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $idgrupousuario )
    {
        try {

            $grupouser = new GrupoUsuario();
            $grupousuario = $grupouser->detalle( $grupouser, $idgrupousuario );

            if ( is_null( $grupousuario ) ) {
                return response()->json( [
                    "rpta" => -1,
                    "message" => "Grupo Usuario no existente",
                ] );
            }
            
            return response()->json( [
                "rpta" => 1,
                "message" => "Servicio realizado exitosamente",
                "grupousuario" => $grupousuario,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request )
    {
        try {

            $rules = [
                'idgrupousuario' => "required|numeric",
                'descripcion' => "required|max:150",
                'nota' => "nullable|max:300",
            ];

            $messages = [
                "idgrupousuario.required" => "Campo requerido",
                "idgrupousuario.numeric" => "Campo permite tipo número",

                "descripcion.required" => "Campo requerido",
                "descripcion.max" => "Se permite máximo 150 caracteres",

                "nota.max" => "Se permite máximo 300 caracteres",
            ];

            $validator = Validator::make( $request->all(), $rules, $messages );

            if ( $validator->fails() ) {

                return response()->json( [
                    "rpta" => -1,
                    "message" => "Advertencia llenar campos requeridos",
                    "errors" => $validator->errors(),
                ] );
            }

            $grupouser = new GrupoUsuario();

            if ( is_null( $grupouser->find( $request->idgrupousuario ) ) ) {
                
                return response()->json( [
                    "rpta" => 0,
                    "message" => "Grupo Usuario no existente.",
                ] );
            }
            $grupousuario = $grupouser->actualizar( $grupouser, $request );
            
            return response()->json( [
                "rpta" => 1,
                "message" => "Grupo Usuario actualizado exitosamente",
                "grupousuario" => $grupousuario,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idgrupousuario )
    {
        try {

            $grupouser = new GrupoUsuario();
            $grupousuario = $grupouser->find( $idgrupousuario );

            if ( is_null( $grupousuario ) ) {
                return response()->json( [
                    "rpta" => -1,
                    "message" => "Grupo Usuario no existente",
                ] );
            }

            if ( $grupousuario->isdelete == "N" ) {
                return response()->json( [
                    "rpta" => 0,
                    "message" => "Grupo Usuario no permitido eliminar.",
                ] );
            }

            $grupousuariodelete = $grupousuario->delete();
            
            return response()->json( [
                "rpta" => 1,
                "message" => "Grupo Usuario eliminado exitosamente",
                "grupousuario" => $grupousuariodelete,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    public function getusuario( Request $request, $idgrupousuario )
    {
        try {

            $user = new User();

            $arrayusuariosingrupousuario = $user
                ->select( [
                    'users.idusers', 'users.nombre', 'users.apellido', 'users.email', 'users.login', 
                    'users.imagen', 'users.estado', 'users.isdelete', 'users.x_fecha', 'users.x_hora',
                    DB::raw( "CONCAT(users.nombre, ' ', users.apellido) as title" ), 'users.idusers as key'
                ] )
                ->orderBy( 'idusers', 'DESC' )
                ->get();

            $arrayusuariocongrupousuario = $user
                ->join('asignarusuario as asiguser', 'users.idusers', '=', 'asiguser.fkidusers')
                ->select( [
                    'asiguser.idasignarusuario', 'users.idusers', 'users.nombre', 'users.apellido', 'users.email', 'users.login', 
                    'users.imagen', 'users.estado', 'users.isdelete', 'users.x_fecha', 'users.x_hora',
                    DB::raw( "CONCAT(users.nombre, ' ', users.apellido) as title" ), 'users.idusers as key'
                ] )
                ->where('asiguser.fkidgrupousuario', '=', $idgrupousuario)
                ->whereNull('asiguser.deleted_at')
                ->orderBy( 'idusers', 'DESC' )
                ->get();
            
            return response()->json( [
                "rpta" => 1,
                "message" => "Servicio realizado exitosamente",
                "arrayUsuarioSinGrupoUsuario" => $arrayusuariosingrupousuario,
                "arrayUsuarioConGrupoUsuario" => $arrayusuariocongrupousuario,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    public function asignarusuario( Request $request ) {
        try {

            $fkidgrupousuario = isset( $request->fkidgrupousuario ) ? $request->fkidgrupousuario : null;
            $arrayUsuarioConGrupoUsuario = isset($request->arrayUsuarioConGrupoUsuario) ? json_decode($request->arrayUsuarioConGrupoUsuario) : [];

            $x_idusuario  = isset( $request->x_idusuario ) ? $request->x_idusuario : null;
            $x_fecha      = isset( $request->x_fecha ) ? $request->x_fecha : null;
            $x_hora       = isset( $request->x_hora ) ? $request->x_hora : null;

            $user = new User();
            $arrayusuariocongrupousuario = $user
                ->join('asignarusuario as asiguser', 'users.idusers', '=', 'asiguser.fkidusers')
                ->select( [
                    'users.idusers', 'users.nombre', 'users.apellido', 'users.email', 'users.login', 
                    'users.imagen', 'users.estado', 'users.isdelete', 'users.x_fecha', 'users.x_hora',
                    'asiguser.idasignarusuario', 'asiguser.habilitado',
                ] )
                ->where('asiguser.fkidgrupousuario', '=', $fkidgrupousuario)
                ->whereNull('asiguser.deleted_at')
                ->orderBy( 'users.idusers', 'DESC' )
                ->get();

            foreach ($arrayusuariocongrupousuario as $detalle) {
                $asiguser = new AsignarUsuario();
                $asignarUsuario = $asiguser->find($detalle->idasignarusuario);
                $asignarUsuario->delete();
            }

            foreach ( $arrayUsuarioConGrupoUsuario as $key ) {
                $asignarUsuario = new AsignarUsuario();
                $asignarUsuario->fkidgrupousuario = $fkidgrupousuario;
                $asignarUsuario->fkidusers = $key;

                $asignarUsuario->x_idusuario = $x_idusuario;
                $asignarUsuario->x_fecha = $x_fecha;
                $asignarUsuario->x_hora = $x_hora;

                $asignarUsuario->save();
            }

            return response()->json( [
                "message" => "Servicio realizado exitosamente",
                "rpta" => 1,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    public function getformulario( Request $request, $idgrupousuario )
    {
        try {

            $arrayformulariosingrupousuario = DB::select(
                'select *
                from formulario as form 
                where form.idformulario not in (
                    select asigform.fkidformulario 
                    from asignarformulario as asigform
                    where asigform.fkidgrupousuario = '.$idgrupousuario.'
                )'
            );

            if ( sizeof($arrayformulariosingrupousuario) > 0 ) {
                $mytime = new Carbon("America/La_Paz");
                
                foreach ( $arrayformulariosingrupousuario as $formulario ) {
                    $asignarFormulario = new AsignarFormulario();
                    $asignarFormulario->fkidgrupousuario = $idgrupousuario;
                    $asignarFormulario->fkidformulario = $formulario->idformulario;
                    $asignarFormulario->visible = 'N';

                    $asignarFormulario->x_idusuario = null;
                    $asignarFormulario->x_fecha = $mytime->toDateString();
                    $asignarFormulario->x_hora = $mytime->toTimeString();
    
                    $asignarFormulario->save();
                }
            }

            $form = new Formulario();

            $arrayformulariocongrupousuario = $form
                ->join('asignarformulario as asigform', 'formulario.idformulario', '=', 'asigform.fkidformulario')
                ->select( [
                    'formulario.idformulario', 'formulario.descripcion', 'formulario.fkidformulariopadre',
                    'asigform.visible', 'asigform.idasignarformulario',
                ] )
                ->where('asigform.fkidgrupousuario', '=', $idgrupousuario)
                ->orderBy( 'formulario.idformulario', 'ASC' )
                ->get();
            
            return response()->json( [
                "rpta" => 1,
                "message" => "Servicio realizado exitosamente",
                "arrayFormularioConGrupoUsuario" => $arrayformulariocongrupousuario,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    public function asignarformulario( Request $request ) {
        try {

            $arrayFormulario = isset($request->arrayFormulario) ? json_decode($request->arrayFormulario) : [];

            foreach ( $arrayFormulario as $formulario ) {
                $asigform = new AsignarFormulario();
                $asignarUsuario = $asigform->find($formulario->idasignarformulario);
                $asignarUsuario->visible = $formulario->visible;
                $asignarUsuario->save();
            }

            return response()->json( [
                "message" => "Servicio realizado exitosamente",
                "rpta" => 1,
            ] );

        } catch (\Throwable $th) {
            return response()->json( [
                'rpta' => -5,
                "message" => "Error al realizar servicio",
                "errors" => [
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                    "message" => $th->getMessage(),
                ],
            ] );
        }
    }

    public function view_index( Request $request ) {
        return view( 'page.seguridad.grupousuario.index' );
    }

    public function view_create( Request $request ) {
        return view( 'page.seguridad.grupousuario.create' );
    }
    
    public function view_edit( $idgrupousuario ) {
        return view( 'page.seguridad.grupousuario.edit', compact('idgrupousuario') );
    }
    
    public function view_show( $idgrupousuario ) {
        return view( 'page.seguridad.grupousuario.show', compact('idgrupousuario') );
    }

}
