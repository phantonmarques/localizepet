@extends('site.templates.master')

@section('body-main')
    <main class="container text-center">
        <div class="row justify-content-md-center">
            <form class="form-signin col-xs-12 col-md-8 col-xl-4" action="{{ route('site.auth.register.action') }}" method="post">
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
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                         value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
                    <div class="input-group-append">
                         <div class="input-group-text">
                              <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                         </div>
                    </div>
                    @if($errors->has('name'))
                         <div class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                         </div>
                    @endif
               </div>

               {{-- Email field --}}
               <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                         value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
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
                    <input type="password" name="password"
                         class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                         placeholder="{{ __('adminlte::adminlte.password') }}">
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

               {{-- Confirm password field --}}
               <div class="input-group mb-3">
                    <input type="password" name="password_confirmation"
                         class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                         placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                    <div class="input-group-append">
                         <div class="input-group-text">
                              <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
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
                    <input type="text" name="city" id="city" 
                         class="form-control typeahead {{ $errors->has('city') ? 'is-invalid' : '' }}"
                         placeholder="{{ __('adminlte::adminlte.city') }}">
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
                    <input type="text" name="phone"
                         class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                         placeholder="{{ __('adminlte::adminlte.phone_or_cell') }}">
                    <div class="input-group-append">
                         <div class="input-group-text">
                              <span class="fas fa-phone-alt"></span>
                         </div>
                    </div>
                    @if($errors->has('phone'))
                         <div class="invalid-feedback">
                              <strong>{{ $errors->first('phone') }}</strong>
                         </div>
                    @endif
               </div>

               {{-- Register button --}}
               <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-dark') }}">
                    <span class="fas fa-user-plus"></span>
                    {{ __('adminlte::adminlte.register') }}
               </button>   

               {{-- Register link --}}
               <div class="row">
                    <div class="col-12">
                        Já tem uma conta ? <a class="link_login" href="{{ route('site.auth.login') }}">
                                {{ __('adminlte::adminlte.sign_in') }}
                        </a>
                    </div>
                </div> 

                {{-- Password reset link --}}
                <div class="row">
                    <div class="col-12">
                        <a class="link_login" href="{{ route('site.auth.login') }}">
                            {{ __('adminlte::adminlte.be_a_partner') }}
                        </a>
                    </div>
                </div>       
        
            </form>
        </div>
        
    </main>
@endsection

@push('script-js')  
     <!-- jQuery CDN -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous"></script>
     <!-- Scripts -->
     <script type="text/javascript">
     console.log('oi');
          let path = "{{  route('site.search-city') }}";
          $('input.typeahead').typeahead({
               source: function(terms, process) {
                    return $.get(path, {terms:terms}, function(data) {
                         return process(data);
                    })
               }
          });
          $('input.typeahead').keypress(function( event ){		
		var suggest_a = $('input.typeahead');
		var qnts_a = suggest_a.length;
			
		if( 40==event.keyCode )//seta baixo
			active = active>=(qnts_a-1) ? 0 : active+1;
		else if( 38==event.keyCode )//seta cima
			active = ( active<=0 ) ? qnts_a-1 : active-1;
		
		
		
		var a = suggest_a.removeClass('active').eq( active ).addClass('active');	
		$( this ).val( a.text() );
	     });
          
     </script>
@endpush
