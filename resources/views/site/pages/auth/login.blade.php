@extends('site.templates.master')

@section('body-main')
    <main class="container mt-5 text-center">
        <div class="row justify-content-md-center">
            <form class="form-default col-xs-12 col-md-8 col-xl-5" action="{{ route('site.auth.login') }}" method="post">

                {{ csrf_field() }}
    
                <h1 class="mb-3">Acesse sua conta</h1>

                @if ($errors->any() || session('error'))
                    <div class="row my-4" id="message-error">
                        <div class="card card-error-message bg-danger text-white">
                            <div class="card-header">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                Login falhou!
                            </div>
                            <div class="card-body">
                                <ul class="ps-4">
                                    @forelse($errors->all() as $message)
                                        <li class="card-text text-start">{{ $message }}</li>
                                    @empty
                                        <li class="card-text text-start">{!! session('error') !!}</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                @elseif (session('success'))
                    <div class="row my-4" id="message-success">
                        <div class="card card-error-message bg-success text-white">
                            <div class="card-header">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                            </div>
                            <div class="card-body">
                                <ul class="ps-4">
                                    <li class="card-text text-start">{{ session('success') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Email field --}}
                <div class="input-group mb-3">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
        
                {{-- Password field --}}
                <div class="input-group mb-3">
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           name="password" placeholder="Senha" required>
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Lembrar-me</label>
                        </div>
                    </div>
                </div>
        
                {{-- Login field --}}
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-grid mt-2">
                            <button type=submit class="btn btn-block btn-dark">
                                Entrar
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Register link --}}
                <div class="row">
                    <div class="col-12">
                        Não tem uma conta ? <a class="link-dark" href="{{ route('site.auth.show-register') }}">
                            Criar nova conta
                        </a>
                    </div>
                </div> 

                {{-- Password reset link --}}
                <div class="row">
                    <div class="col-12">
                        <a class="link-dark" href="{{ route('site.auth.password') }}">
                            Esqueci minha senha
                        </a>
                    </div>
                </div>       
        
            </form>
        </div>
    </main>
@endsection