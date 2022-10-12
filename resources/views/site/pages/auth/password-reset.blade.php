@extends('site.templates.master')

@section('body-main')
    <main class="container mt-5 text-center">
        <div class="row justify-content-md-center">
            <form class="form-default col-xs-12 col-md-8 col-xl-6" action="{{ route('site.auth.password-reset') }}"
                  method="post">

                {{ csrf_field() }}
    
                <h1 class="mb-3">Recuperar conta de usuário</h1>

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

                {{-- Email field --}}
                <div class="input-group my-4">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

               {{-- Send reset link button --}}
                <div class="d-grid mt-2">
                    <button type="submit" class="btn btn-block btn-dark">
                        <span class="fas fa-share-square"></span>
                        Enviar link de recuperação de senha
                    </button>
                </div>

            </form>
        </div>
        
    </main>
@endsection
