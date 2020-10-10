@extends('site.templates.master')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('body-main')
    <main class="container text-center">
        <div class="row justify-content-md-center">
            <form class="form-signin col-xs-12 col-md-8 col-xl-4" action="{{ route('site.auth.login.action') }}" method="post">
                {{ csrf_field() }}
    
                <h1 class="mg-bottom-3">Acesse sua conta</h1>

                @if($errors->any() || session('error'))
                    <div class="row mt-3 w-100 align-self-center" id="message-error">
                        <div class="card card-error-message bg-danger" style="width: 100%;">
                            <div class="card-header"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Login falhou!</div>
                            <div class="card-body">
                                <ul style="padding-left: 15px;">
                                    @forelse($errors->all() as $message)
                                        <li class="card-text">{{ $message }}</li>
                                    @empty
                                        <li class="card-text">{!! session('error') !!}</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
        
                {{-- Email or Username field --}}
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }} ou {{ __('adminlte::adminlte.username') }}" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
        
                {{-- Password field --}}
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="{{ __('adminlte::adminlte.password') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="icheck-greensea">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">{{ __('adminlte::adminlte.remember_me') }}</label>
                        </div>
                    </div>
                </div>
        
                {{-- Login field --}}
                <div class="row">
                    <div class="col-12">
                        <button type=submit class="btn btn-block btn-dark">
                            {{ __('adminlte::adminlte.sign_in') }}
                        </button>
                    </div>
                </div>

                {{-- Register link --}}
                <div class="row">
                    <div class="col-12">
                        Não tem uma conta ? <a class="link_login" href="{{ route('site.auth.register') }}">
                                {{ __('adminlte::adminlte.register_a_new_membership') }}
                        </a>
                    </div>
                </div> 

                {{-- Password reset link --}}
                <div class="row">
                    <div class="col-12">
                        <a class="link_login" href="{{ route('site.auth.password') }}">
                            {{ __('adminlte::adminlte.i_forgot_my_password') }}
                        </a>
                    </div>
                </div>       
        
            </form>
        </div>
        
    </main>
@endsection