@extends('site.templates.master')

@section('body-main')
    <main class="container">
        <div class="row justify-content-md-center">
            <form class="form-default col-xs-12 col-md-8 col-xl-5" action="{{ route('site.auth.register') }}"
                  id="pet-form" method="POST" autocomplete="off">

                {{ csrf_field() }}
    
                <h1 class="text-center">Criar conta de usuário</h1>
                <p class="text-center">
                    Você está criando uma conta simples de usuário, preencha corretamente os campos para efetuar seu
                    cadastro.
                </p>

                @if ($errors->any() || session('error'))
                    <div class="row my-4" id="message-error">
                        <div class="card card-error-message bg-danger text-white">
                            <div class="card-header">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                Recuperar conta falhou!
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
                @endif
        
                {{-- Name field --}}
                <div class="my-3">
                    <label for="name">
                        Nome
                        <span class="asterisk-required">*</span>
                    </label>
                    <div class="input-group">
                        <input type="text" name="name" id="name" minlength="6" maxlength="100"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            value="{{ old('name') ?? '' }}" placeholder="Informe seu nome" autofocus required />

                        <span class="input-group-text"><i class="fas fa-user"></i></span>

                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Email field --}}
                <div class="my-3">
                    <label for="email">
                        E-mail
                        <span class="asterisk-required">*</span>
                    </label>
                    <div class="input-group">
                        <input type="email" name="email" id="email" maxlength="50" placeholder="Informe seu e-mail"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            value="{{ old('email') ?? '' }}" autofocus required />

                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Password field --}}
                <div class="my-3">
                    <label for="password">
                        Senha
                        <span class="asterisk-required">*</span>
                    </label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" autocomplete="nope"
                            class="form-control without-paste {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="Informe sua senha" autofocus required />

                        <span class="input-group-text"><i class="fas fa-lock"></i></span>

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Confirm password field --}}
                <div class="my-3">
                    <label for="password_confirmation">
                        Confirme a senha
                        <span class="asterisk-required">*</span>
                    </label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control without-paste {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                            autocomplete="nope" placeholder="Informe novamente a senha" autofocus required />

                        <span class="input-group-text"><i class="fas fa-lock"></i></span>

                        @if($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div id="password-info" class="mb-3">
                    <span>A senha deve atender aos seguintes requisitos:</span>
                    <ul>
                        <li id="letter" class="invalid-check">
                            Pelo menos <strong>uma letra minúscula</strong>
                        </li>
                        <li id="capital" class="invalid-check">
                            Pelo menos <strong>uma letra maiúscula</strong>
                        </li>
                        <li id="number" class="invalid-check">
                            Pelo menos <strong>um número</strong>
                        </li>
                        <li id="length" class="invalid-check">
                            Ter no mínimo <strong>8 caracteres</strong>
                        </li>
                        <li id="confirmed" class="invalid-check">
                            <strong>Confirmar</strong> a senha
                        </li>
                    </ul>
                </div>

                {{-- Register button --}}
                <div class="d-grid mt-2">
                    <button type="submit" class="btn btn-block text-center btn-dark">
                        <span class="fas fa-user-plus"></span>
                        Registrar
                    </button>
                </div>

                {{-- Register link --}}
                <div class="row text-center mt-3">
                    <div class="col-12">
                        Já tem uma conta ?
                        <a class="link-dark" href="{{ route('site.auth.login') }}">
                            Entrar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('style-css')
    <link rel="stylesheet" href="{{ asset('css/site/user/create.css') }}">
@endpush

@push('script-js')  
     <script type="text/javascript" src="{{ asset('js/site/user/create.js') }}"></script>
@endpush