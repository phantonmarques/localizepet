@extends('site.templates.master')

@section('body-main')
    <main class="container text-center">
        <div class="row justify-content-md-center mt-4 mb-4">
            <div class="col-md-8 col-12">
                <div class="card">

                    <div class="card-header fw-bold font-monospace {{ isset($success) ? 'bg-success' :
                    ( isset($error) ? 'bg-danger' : 'bg-warning' ) }}">
                        {{ isset($error) ? 'Confirmação de cadastro' : 'Verifique seu e-mail' }}
                    </div>

                    <div class="card-body">
                        <img src="{{ asset('images/icons-svg/email.svg') }}" alt="E-mail" class="img-fluid icon-big mt-5">

                        @if(isset($success))

                            <p class="fw-bold fs-5 ps-md-5 pe-md-5 pb-md-0 p-3 mt-4">
                                Cadastro confirmado com sucesso!
                            </p>
                            <p>
                                <a class="link-dark" href="{{ route('site.auth.show-login') }}">Acessar sua conta</a>
                            </p>
                        @elseif(isset($error))

                            <p class="fw-bold fs-5 pt-md-5 ps-md-5 pe-md-5 pb-md-0 p-3 mt-4">
                                Pode ser que este código de confirmação de cadastro já tenha sido utilizado, expirado ou
                                é inválido.
                            </p>
                            <p class="fs-5 pt-md-0 ps-md-5 pe-md-5 p-3 mt-4">
                                Os códigos são válidos por 2 horas, passado este prazo, é necessário efetuar o login
                                novamente para reenviar um novo código ao e-mail cadastrado, caso não seja confirmado o
                                cadastro em até 3 dias, será necessário fazer o cadastro novamente.
                            </p>

                        @else

                            <p class="fs-5 p-5 mt-4">
                                Olá, sua conta está quase pronta. Para ativá-la é necessário que seja confirmado o seu
                                cadastro através do link disponibilizado via e-mail.
                            </p>
                            <p>
                                Sua conta não será ativada até que seu e-mail seja confirmado.
                            </p>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection