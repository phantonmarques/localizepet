@extends('adminlte::page')

@section('title', 'Projeto Pet')

@section('content_header')
     <div class="row">
          <div class="col-sm-12">
               <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Inicial</a></li>
                         <li class="breadcrumb-item"><a href="#">Usuários</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Visualizar Usuário</li>
                    </ol>
               </nav>
          </div>
     </div>
     
@stop

@section('content')
<div class="row">
     <div class="col-md-3">
          
          <!-- Profile Image -->
          <div class="card card-default card-outline">
               <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
               </div>
               <div class="card-body box-profile">
                    <div class="text-center">
                         <img class="brand-image img-fluid img-circle" src="https://apexensino.com.br/wp-content/uploads/2019/02/iStock-1017296544-1024x683-1024x640.jpg" alt="User profile picture">
                    </div>
                    
                    {{-- <h3 class="profile-username text-center">Nina Mcintire</h3> --}}
                    
                    @foreach ($user->roles as $role)
                    <p class="text-muted text-center text-bold">{{ $role->name }}</p>
                    @endforeach
                    
                    
                    <ul class="list-group list-group-unbordered mb-3">
                         <li class="list-group-item">
                              <b>Anúncios</b> <a class="float-right">1,322</a>
                         </li>
                         <li class="list-group-item">
                              <b>Visitas</b> <a class="float-right">543</a>
                         </li>
                    </ul>       
               </div>
               <!-- /.card-body -->
          </div>
          <!-- /.card -->
     </div>
     <!-- /.col -->
     <div class="col-md-9">
          <div class="card">
               <div class="card-header p-2">
                    <ul class="nav nav-pills">
                         <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Detalhes</a></li>
                         <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Atividades</a></li>
                    </ul>
               </div><!-- /.card-header -->

               {{-- 
            
            $table->integer('city_id')->unsigned()->nullable();
            $table->string('site')->nullable();
            $table->string('profile_photo')->nullable();
            $table->boolean('approved'); --}}
               <div class="card-body">
                    <div class="tab-content">
                         <div class="active tab-pane" id="detail">
                              <div class="row justify-content-around">
                                   <div class="col-sm-5">
                                        <strong><i class="fas fa-user"></i> Nome</strong>
                                        <p><a href="#">{{ $user->name }}</a></p>
                                   </div>
                                   <div class="col-sm-5">
                                        <strong><i class="fas fa-phone-alt"></i> Telefone/Celular</strong>
                                        <p>{{ formatPhone($user->contact) }}</p>
                                   </div>
                              </div>

                              <div class="row justify-content-around">
                                   <div class="col-sm-5">
                                        <strong><i class="far fa-envelope"></i> E-mail</strong>
                                        <p>{{ $user->email }}</p>
                                   </div>
                                   <div class="col-sm-5">
                                        <strong><i class="far fa-envelope"></i> E-mail Verificação</strong>
                                        <p>{{ $user->email_verified_at ? 'Verificado' : 'Pendente' }}</p>
                                   </div>
                                   
                              </div>

                              <div class="row justify-content-around">
                                   <div class="col-sm-5">
                                        <strong><i class="fas fa-pager"></i> Site</strong>
                                        <p>{{ $user->site }}</p>
                                   </div>
                                   <div class="col-sm-5">
                                        <strong><i class="fas fa-unlock-alt"></i> Status</strong>
                                        <p>{{ $user->approved ? 'Aprovado' : 'Pendente' }}</p>
                                   </div>
                              </div>

                              <div class="row justify-content-around">
                                   <div class="col-sm-5">
                                        <strong><i class="fas fa-city"></i> Cidade</strong>
                                        <p>{{ $user->city->name_visible }}</p>
                                   </div>
                                   <div class="col-sm-5">
                                        <strong><i class="fas fa-city"></i> Estado</strong>
                                        <p>{{ $user->city->state->name_visible }}</p>
                                   </div>
                              </div>

                              <div class="row justify-content-around">
                                   <div class="col-sm-5">
                                        <strong><i class="far fa-calendar-alt"></i> Data de Criação</strong>
                                        <p>{{ $user->created_at ? $user->created_at->format('d/m/Y') : null }}</p>
                                   </div>
                                   <div class="col-sm-5">
                                        <strong><i class="far fa-calendar-alt"></i> Data de Atualização</strong>
                                        <p>{{ $user->updated_at ? $user->updated_at->format('d/m/Y') : null }}</p>
                                   </div>
                              </div>

                              <div class="row justify-content-around">
                                   <div class="col-sm-5">
                                        <strong><i class="far fa-calendar-alt"></i> Data de Exclusão</strong>
                                        <p>{{ $user->deleted_at ? $user->deleted_at->format('d/m/Y') : null }}</p>
                                   </div>
                                   <div class="col-sm-5">
                                        
                                   </div>
                              </div>
                              
                         </div>
                         <!-- /.tab-pane -->
                         <div class="tab-pane" id="activity">
                              <!-- The timeline -->
                              <div class="timeline timeline-inverse">
                                   <!-- timeline time label -->
                                   <div class="time-label">
                                        <span class="bg-danger">
                                             10 Feb. 2014
                                        </span>
                                   </div>
                                   <!-- /.timeline-label -->
                                   <!-- timeline item -->
                                   <div>
                                        <i class="fas fa-envelope bg-primary"></i>
                                        
                                        <div class="timeline-item">
                                             <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                             
                                             <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                                             
                                             <div class="timeline-body">
                                                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                  quora plaxo ideeli hulu weebly balihoo...
                                             </div>
                                             <div class="timeline-footer">
                                                  <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                             </div>
                                        </div>
                                   </div>
                                   <!-- END timeline item -->
                                   <!-- timeline item -->
                                   <div>
                                        <i class="fas fa-user bg-info"></i>
                                        
                                        <div class="timeline-item">
                                             <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                                             
                                             <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                             </h3>
                                        </div>
                                   </div>
                                   <!-- END timeline item -->
                                   <!-- timeline item -->
                                   <div>
                                        <i class="fas fa-comments bg-warning"></i>
                                        
                                        <div class="timeline-item">
                                             <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
                                             
                                             <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                                             
                                             <div class="timeline-body">
                                                  Take me to your leader!
                                                  Switzerland is small and neutral!
                                                  We are more like Germany, ambitious and misunderstood!
                                             </div>
                                             <div class="timeline-footer">
                                                  <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                             </div>
                                        </div>
                                   </div>
                                   <!-- END timeline item -->
                                   <!-- timeline time label -->
                                   <div class="time-label">
                                        <span class="bg-success">
                                             3 Jan. 2014
                                        </span>
                                   </div>
                                   <!-- /.timeline-label -->
                                   <!-- timeline item -->
                                   <div>
                                        <i class="fas fa-camera bg-purple"></i>
                                        
                                        <div class="timeline-item">
                                             <span class="time"><i class="far fa-clock"></i> 2 days ago</span>
                                             
                                             <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                                             
                                             <div class="timeline-body">
                                                  <img src="https://placehold.it/150x100" alt="...">
                                             </div>
                                        </div>
                                   </div>
                                   <!-- END timeline item -->
                                   <div>
                                        <i class="far fa-clock bg-gray"></i>
                                   </div>
                              </div>
                         </div>
                         <!-- /.tab-pane -->
                         
                    </div>
                    <!-- /.tab-content -->
               </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
     </div>
     <!-- /.col -->
</div>
@stop

@section('js')
     <script src="{{  asset('assets/panel/js/crud/create.js') }}"></script>
@stop

@section('css')
     <link rel="stylesheet" href="{{  asset('assets/panel/css/crud/create.css') }}">
@endsection

@section('footer')
     <strong>
          Copyright © 2021
     </strong>
     <div class="float-right d-none d-sm-inline-block">
          Desenvolvido por <b>@DanielMarques</b>
     </div>
@endsection