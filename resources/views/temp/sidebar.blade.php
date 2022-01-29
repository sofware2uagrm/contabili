<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">ICONTABSAYUBU {{date("Y")}} </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                      Razon Social:{{session('nombre')}}
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Configuracion <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu">
                            <ul class="nav flex-column">
                                
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Cuentas</a>
                                    <div id="submenu-1-2" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuenta-plan-tipo.index') }}">Tipo de Cuenta</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('cuenta-plan.index') }}">Plan de Cuenta</a>
                                            </li>

                                            
                                           
                                        </ul>
                                    </div>
                                </li>

                                 --}}

                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-4" aria-controls="submenu-1-2">Cuentas</a>
                                    <div id="submenu-1-4" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('plan.index') }}">Plan</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('libro-diario.index') }}">Libro Diario</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('libro-mayor.index') }}">Libro Mayor</a>
                                            </li>
                                            
                                            
                                            
                                           
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-3" aria-controls="submenu-1-2">Contabilidad</a>
                                    <div id="submenu-1-3" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('comprobante.index') }}">Comprobante</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fa fa-fw fa-user-circle"></i>Cuentas <span class="badge badge-success">6</span></a>
                        <div id="submenu-6" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('plan.index') }}">Plan De Cuentas</a>
                                </li>
                            </ul>
                        </div>
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-fw fa-user-circle"></i>Comprobante <span class="badge badge-success">6</span></a>
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
                        </div>
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-fw fa-user-circle"></i>Gestion <span class="badge badge-success">6</span></a>
                        <div id="submenu-3" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('gestions.index') }}">Fecha De Inicio De Gestion Contable</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('empresas.index') }}">Datos Generales De La Empresa</a>
                                </li>
                            </ul>
                        </div>
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-user-circle"></i>Sistema <span class="badge badge-success">6</span></a>
                        <div id="submenu-2" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('moneda') }}">Configuracion De Parametros Del Sistema</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</div>

