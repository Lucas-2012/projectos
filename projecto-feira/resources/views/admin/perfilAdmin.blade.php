@extends('layouts.sidebar')
@section('title','Perfil Admin')
@section('content')

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perfil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perfil do utilizador</li>
            </ol>
          </div>
          @if ($errors->all()) 
                
                <div class="alert alert-success" role="alert">
                  @foreach ($errors->all() as $error)
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4>{{$error}}</h4>
                  @endforeach 
                </div>
                
              @endif
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('assets/dist/img/avatar.png')}}"
                       alt="{{$admin->name}}">
                </div>

                <h3 class="profile-username text-center">{{$admin->name}}</h3>

                <p class="text-muted text-center">{{$admin->tipo}}</p>

                <a href="#" class="btn btn-primary btn-block"><b>   </b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- </div> -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
     
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Dados</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Mercados</a></li> -->
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                <!---------------------- DADOS DO ADMIN ----------------------->
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label>Nome:</label> <p>{{$admin->name}}</p>
                          <label>E-mail: </label> <p>{{$admin->email}}</p>
                        </div>
                        <div class="col-md-6">
                          <label>Telefone:</label> <p>{{$admin->telefone}}</p>
                          <label>Data de inscrição: </label><p> {{$admin->created_at}}</p>
                          <label>Categoria Produtos: </label> <p>{{$admin->produtos}}</p>
                        </div>
                      </div>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  

                  <!------------------------- EDITAR OS DADOS --------------------->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="POST" action="{{route('editarPerfil.admin')}}">
                    @csrf
                    @method('PUT') 
                      <div class="row">
                        
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label for="inputName" class="col-sm-5 col-form-label">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name" value="{{$admin->name}}">
                          </div>
                        </div>
                                           
                        
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="inputEmail" class="col-sm-5 col-form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" value="{{$admin->email}}">
                            </div>
                          </div>
                          
                      </div>
                        <input type="hidden" name="idVendedor" value="{{$admin->id}}" />
                      <div class="row">
                        <div class="col-sm-6">
                              <div class="form-group">
                                <label for="password" class="col-sm-5 col-form-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Nova senha">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="condirmar" class="col-sm-15 col-form-label">Confirmar password</label>
                                  <input type="password" class="form-control" id="confirmar" name="confirmar" placeholder="confirmar a nova senha...">
                              </div>
                            </div>
                        <!-- </div> -->
                      </div>
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" style="margin: auto;">Actualizar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            <!-- </div> -->
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection