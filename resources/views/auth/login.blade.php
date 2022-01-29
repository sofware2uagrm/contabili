@extends('layouts.app')
@section('login')
<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Por favor complete sus credenciales</span></div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

               
                <div class="form-group">
                    <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" 
                        name="login" value="{{ old('login') }}" required autocomplete="login" autofocus
                        placeholder="INGRESAR USUARIO"
                    />
                </div>
                @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                        name="password" required autocomplete="current-password"
                        placeholder="INGRESAR CONTRASEÑA"
                    />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Ingresar') }}
                        </button>

                        <!-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña') }}
                            </a>
                        @endif -->
                    </div>
                </div>
                
            </form>
        </div>
        <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                <!-- <a href="{{ url('register') }}" class="footer-link">Crear una cuenta</a></div> -->
            <!--<div class="card-footer-item card-footer-item-bordered">
                <a href="#" class="footer-link">Forgot Password</a>
            </div>-->
        </div>
    </div>
</div>
@endsection
