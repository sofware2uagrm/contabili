
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">CONTABSAYUBU {{date("Y")}} </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php 
                $usuario = auth()->user();
                $perm = new App\Models\Seguridad\AsignarFormulario();
                $arrayPermiso = $perm
                    ->leftJoin( 'formulario', 'asignarformulario.fkidformulario', '=', 'formulario.idformulario' )
                    ->select( 
                        'formulario.idformulario', 'formulario.descripcion', 'formulario.activo',
                        'asignarformulario.visible', 'asignarformulario.idasignarformulario'
                    )
                    ->where( 'asignarformulario.fkidgrupousuario', '=', $usuario->fkidgrupousuario )
                    ->orderBy('formulario.idformulario', 'ASC')->get();
            ?>

            <input type="hidden" id="arrayPermiso" value="{{ json_encode( $arrayPermiso ) }}" />
            <input type="hidden" id="usuario" value="{{ json_encode( $usuario ) }}" />

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                      Razon Social:{{session('nombre')}} {{ sizeof( $arrayPermiso ) }}
                    </li>
                    <li class="nav-item ">
                        
                        @if ( isset($arrayPermiso[1]->visible) && $arrayPermiso[1]->visible == "A" )
                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fa fa-fw fa-user-circle"></i>Cuentas <span class="badge badge-success">6</span></a>
                            <div id="submenu-6" class="collapse submenu">
                                <ul class="nav flex-column">
                                    @if (  isset($arrayPermiso[2]->visible) && $arrayPermiso[2]->visible == "A" )
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-4" aria-controls="submenu-1-2">Cuentas</a>
                                            <div id="submenu-1-4" class="collapse submenu">
                                                <ul class="nav flex-column">
                                                    @if ( isset($arrayPermiso[18]->visible) && $arrayPermiso[18]->visible == "A" )
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('plan.index') }}">Plan De Cuentas</a>
                                                        </li>
                                                    @endif
                                                    @if ( isset($arrayPermiso[19]->visible) && $arrayPermiso[19]->visible == "A" )
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('libro-diario.index') }}">Libro Diario</a>
                                                        </li>
                                                    @endif
                                                    @if ( isset($arrayPermiso[20]->visible) && $arrayPermiso[20]->visible == "A" )
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('libro-mayor.index') }}">Libro Mayor</a>
                                                        </li>
                                                    @endif
                                                    @if ( isset($arrayPermiso[21]->visible) && $arrayPermiso[21]->visible == "A" )
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('compra.index') }}">Compras</a>
                                                        </li>
                                                    @endif
                                                    @if ( isset($arrayPermiso[22]->visible) && $arrayPermiso[22]->visible == "A" )
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('venta.index') }}">Ventas</a>
                                                        </li>
                                                    @endif
                                                    
                                                
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                    @if ( isset($arrayPermiso[23]->visible) && $arrayPermiso[23]->visible == "A" )
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-3" aria-controls="submenu-1-2">Contabilidad</a>
                                            <div id="submenu-1-3" class="collapse submenu">
                                                <ul class="nav flex-column">
                                                    @if ( isset($arrayPermiso[24]->visible) && $arrayPermiso[24]->visible == "A" )
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('comprobante.index') }}">Comprobante</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                        <!-- <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-fw fa-user-circle"></i>Comprobante <span class="badge badge-success">6</span></a>
                        <div id="submenu-5" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('comprobante.index') }}">Comprobante</a>
                                </li>
                            </ul>
                        </div>
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-fw fa-user-circle"></i>Libros <span class="badge badge-success">6</span></a>
                        <div id="submenu-4" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('libro-diario.index') }}">Libro Diario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('libro-mayor.index') }}">Libro Mayor</a>
                                </li>
                            </ul>
                        </div> -->
                        @if ( isset($arrayPermiso[25]->visible) &&  $arrayPermiso[25]->visible == "A" )
                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-fw fa-user-circle"></i>Gestion <span class="badge badge-success">6</span></a>
                            <div id="submenu-3" class="collapse submenu">
                                <ul class="nav flex-column">
                                    @if ( isset($arrayPermiso[26]->visible) && $arrayPermiso[26]->visible == "A" )
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('gestions.index') }}">Fecha De Inicio De Gestion Contable</a>
                                        </li>
                                    @endif
                                    @if ( isset($arrayPermiso[27]->visible) && $arrayPermiso[27]->visible == "A" )
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('empresas.index') }}">Datos Generales De La Empresa</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                        @if ( isset($arrayPermiso[28]->visible) && $arrayPermiso[28]->visible == "A" )
                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-user-circle"></i>Sistema <span class="badge badge-success">6</span></a>
                            <div id="submenu-2" class="collapse submenu">
                                <ul class="nav flex-column">
                                    @if ( isset($arrayPermiso[29]->visible) && $arrayPermiso[29]->visible == "A" )
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ asset('moneda') }}">Configuracion De Parametros Del Sistema</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                        @if ( isset($arrayPermiso[0]->visible) && $arrayPermiso[0]->visible == "A" )

                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7">
                                <i class="fa fa-fw fa-user-circle"></i>Seguridad <span class="badge badge-success">6</span>
                            </a>
                            <div id="submenu-7" class="collapse submenu">
                                <ul class="nav flex-column">
                                    @if ( isset($arrayPermiso[4]->visible) && $arrayPermiso[4]->visible == "A" )
                                        <li class="nav-item">
                                            <a class="nav-link" href="/usuario/index">Usuario</a>
                                        </li>
                                    @endif
                                    
                                    @if ( isset($arrayPermiso[8]->visible) && $arrayPermiso[8]->visible == "A" )
                                        <li class="nav-item">
                                            <a class="nav-link" href="/grupo_usuario/index">Grupo Usuario</a>
                                        </li>
                                    @endif
                                    @if ( isset($arrayPermiso[13]->visible) && $arrayPermiso[13]->visible == "A" )
                                        <li class="nav-item">
                                            <a class="nav-link" href="/formulario/index">Formulario</a>
                                        </li>
                                    @endif
                                    @if ( isset($arrayPermiso[17]->visible) && $arrayPermiso[17]->visible == "A" )
                                        <li class="nav-item">
                                            <a class="nav-link" href="/formulario/asignar">Asignar Formulario</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                    </li>
                </ul>
            </div>
        </nav>
    </div>

</div>

