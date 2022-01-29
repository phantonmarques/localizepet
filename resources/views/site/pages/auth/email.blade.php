@extends('site.templates.master')

@section('body-main')
    <main class="container text-center">
        <div class="row justify-content-md-center">
            <form class="form-signin col-xs-12 col-md-8 col-xl-4" action="{{ route('site.auth.password-reset') }}" method="post">
               {{ csrf_field() }}
    
               <h1 class="mg-bottom-3">Recuperar conta de usuário</h1>

               @if($errors->any() || session('error'))
                   <div class="row mt-3 w-100 align-self-center" id="message-error">
                       <div class="card card-error-message bg-danger" style="width: 100%;">
                           <div class="card-header">
                               <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Registrar uma conta falhou!</div>
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

               {{-- Email field --}}
               <div class="input-group mb-3">
                   <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                          value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                   <div class="input-group-append">
                       <div class="input-group-text">
                           <span class="fas fa-envelope {{ config('projetopet.classes_auth_icon', '') }}"></span>
                       </div>
                   </div>
                   @if($errors->has('email'))
                       <div class="invalid-feedback">
                           <strong>{{ $errors->first('email') }}</strong>
                       </div>
                   @endif
               </div>
       
               {{-- Send reset link button --}}
               <button type="submit" class="btn btn-block {{ config('projetopet.classes_auth_btn', 'btn-flat btn-primary') }}">
                   <span class="fas fa-share-square"></span>
                   Enviar link de recuperação de senha
               </button>    
        
            </form>
        </div>
        
    </main>
@endsection
