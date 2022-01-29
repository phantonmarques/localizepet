@extends('site.templates.master')

@section('body-main')
    <main class="container text-center">
        <div class="row justify-content-md-center">
            <form class="form-signin col-xs-12 col-md-8 col-xl-4" action="{{ route('site.auth.register.action') }}" id="pp-form" method="post">
               {{ csrf_field() }}
    
               <h1>Criar conta de usuário</h1>
               <p>Você está criando uma conta de usuário. Caso seja</p>

               @if($errors->any() || session('error'))
                   <div class="row mt-3 w-100 align-self-center" id="message-error">
                       <div class="card card-error-message bg-danger" style="width: 100%;">
                           <div class="card-header"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Registrar uma conta falhou!</div>
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
        
               {{-- Name field --}}
               <div class="input-group mb-3 mg-top-3">
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required
                         value="{{ old('name') }}" placeholder="Nome completo" autofocus>
                    <div class="input-group-append">
                         <div class="input-group-text">
                              <span class="fas fa-user {{ config('projetopet.classes_auth_icon', '') }}"></span>
                         </div>
                    </div>
                    @if($errors->has('name'))
                         <div class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                         </div>
                    @endif
               </div>

               {{-- Username field --}}
               <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" required
                         value="{{ old('username') }}" placeholder="Nome de Usuário" autofocus>
                    <div class="input-group-append">
                         <div class="input-group-text">
                              <span class="fas fa-user {{ config('projetopet.classes_auth_icon', '') }}"></span>
                         </div>
                    </div>
                    @if($errors->has('username'))
                         <div class="invalid-feedback">
                              <strong>{{ $errors->first('username') }}</strong>
                         </div>
                    @endif
               </div>

               {{-- Email field --}}
               <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required
                         value="{{ old('email') }}" placeholder="E-mail">
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

               {{-- Password field --}}
               <div class="input-group mb-3">
                    <input type="password" name="password" required
                         class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                         placeholder="Senha">
                    <div class="input-group-append">
                         <div class="input-group-text">
                              <span class="fas fa-lock {{ config('projetopet.classes_auth_icon', '') }}"></span>
                         </div>
                    </div>
                    @if($errors->has('password'))
                         <div class="invalid-feedback">
                              <strong>{{ $errors->first('password') }}</strong>
                         </div>
                    @endif
               </div>

               {{-- Confirm password field --}}
               <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" required
                         class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                         placeholder="Repita a senha">
                    <div class="input-group-append">
                         <div class="input-group-text">
                              <span class="fas fa-lock {{ config('projetopet.classes_auth_icon', '') }}"></span>
                         </div>
                    </div>
                    @if($errors->has('password_confirmation'))
                         <div class="invalid-feedback">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                         </div>
                    @endif
               </div>

               {{-- City field --}}
               <div class="input-group mb-3">
                    <input type="text" name="city" id="city" required
                         class="form-control typeahead {{ $errors->has('city') ? 'is-invalid' : '' }}"
                         placeholder="Cidade">
                    <div class="input-group-append">
                         <div class="input-group-text">
                              <span class="fas fa-city"></span>
                         </div>
                    </div>
                    @if($errors->has('city'))
                         <div class="invalid-feedback">
                              <strong>{{ $errors->first('city') }}</strong>
                         </div>
                    @endif
               </div>
               {{-- Phone field --}}
               <div class="input-group mb-3">
                    <input type="text" name="contact" required
                         class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }} contact"
                         placeholder="Telefone ou celular">
                    <div class="input-group-append">
                         <div class="input-group-text">
                              <span class="fas fa-phone-alt"></span>
                         </div>
                    </div>
                    @if($errors->has('contact'))
                         <div class="invalid-feedback">
                              <strong>{{ $errors->first('contact') }}</strong>
                         </div>
                    @endif
               </div>

               {{-- Register button --}}
               <button type="submit" class="btn btn-block {{ config('projetopet.classes_auth_btn', 'btn-flat btn-dark') }}">
                    <span class="fas fa-user-plus"></span>
                    Registrar
               </button>   

               {{-- Register link --}}
               <div class="row">
                    <div class="col-12">
                        Já tem uma conta ? 
                        <a class="link_login" href="{{ route('site.auth.login') }}">
                              Entrar
                        </a>
                    </div>
                </div> 

                {{-- Password reset link --}}
                <div class="row">
                    <div class="col-12">
                        <a class="link_login" href="{{ route('site.auth.login') }}">
                              Seja um parceiro
                        </a>
                    </div>
                </div>       
        
            </form>
        </div>
        
    </main>
@endsection

@push('script-js')  
     <script type="text/javascript" src="{{ asset('assets\site\js\register.js') }}"></script>
@endpush
