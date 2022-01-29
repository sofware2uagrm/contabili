<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
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

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('compra.index') }}">Compras</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('venta.index') }}">Ventas</a>
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
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>