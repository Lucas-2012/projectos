
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perfil do Feirante</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('assets/dist/img/logo-feira.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Feira Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/storage/fotos/feirante/{{$feirante->user->foto}}"" class="img-circle elevation-2" alt="{{$feirante->user->name}}" >
        </div>
        <div class="info">
          <!-- <a href="#" class="d-block">{{$feirante->user->name}}</a> -->
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview"> 
                <a href="#" class="nav-link">
                  <p>{{ Auth::user()->name }}<!--i class="fas fa-angle-down right"></i--><span class="badge badge-info right"></span></p>
                </a>
                
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('dashboard.front')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                      <p></p>visitar o site</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <form method="POST" action="{{route('logout')}}" class="text-left" enctype="multipart/form-data">
                          @csrf
                          <a href="{{route('logout')}}" class="dropdown-item ai-icon" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            <span class="ml-2">Sair </span>
                          </a>
                        </form>
                  </li>

                </ul>
              </li>
          </ul>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Perfil do Utilizador
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

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
                       src="/storage/fotos/feirante/{{$feirante->user->foto}}"
                       alt="{{$feirante->user->name}}">
                </div>

                <h3 class="profile-username text-center">{{$feirante->user->name}}</h3>

                <p class="text-muted text-center">{{$feirante->user->tipo}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Feiras inscrita</b> <a class="float-right">{{count($feirante->feiras)}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Visitas na Loja</b> <a class="float-right">{{$feirante->visitas}}</a>
                  </li>
                  <!---li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li-->
                </ul>

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
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Feiras</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label>Nome:</label> <p>{{$feirante->user->name}}</p>
                          <label>E-mail: </label> <p>{{$feirante->user->email}}</p>
                          <label>Província: </label><p> {{$feirante->provincias($feirante->id)}}</p>
                        </div>
                        <div class="col-md-6">
                          <label>Telefone:</label> <p>{{$feirante->telefone}}</p>
                          <label>Data de inscrição: </label><p> {{$feirante->created_at}}</p>
                          <label>Categoria Produtos: </label> <p>{{$feirante->produtos}}</p>
                        </div>
                      </div>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    
                      <div class="row">
                        @forelse($feirante->feiras as $feira)
                          <div class="col-md-6 col-lg-4">
                      
                            <a href="{{route('todos.expositores', [$feira->id])}}"  alt="{{$feira->designacao}}" class="media-1">
                              <img src="/fotos/feira/{{$feira->cartaz_feira}}" alt="{{$feira->designacao}}" class="img-fluid" style = "width: 550px; height:450px;">
                              <div class="media-1-content">
                                <h2>{{$feira->designacao}}</h2>
                                <span class="category">Local: {{$feira->provincia}}</span><br>
                                <span class="category">Endereço: {{$feira->endereco}}</span><br>
                                <span class="category">Data inicio: {{date('d-m-Y',strtotime($feira->data_inicio))}}</span><br>
                                <span class="category">Data término: {{date('d-m-Y',strtotime($feira->data_fim))}}</span><br>
                                <span class="category">
                                  <button href="{{route('inscrever.feira', [$feira->id])}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Visitar</button>
                                </span><br>
                              </div>
                            </a>
                          </div>
                        @empty
                          <p>Não estás inscrito em nenhuma feira, por favor inscreva-se</p>
                        @endforelse
                      </div>
                    
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="POST" action="{{route('editarPerfil.feirante')}}">
                    @csrf
                      <div class="row">
                        
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label for="inputName" class="col-sm-5 col-form-label">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name" value="{{$feirante->user->name}}">
                          </div>
                        </div>
                        
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="inputName" class="col-sm-5 col-form-label">Telefone</label>
                              <input type="text" class="form-control" id="inputName" name="telefone" value="{{$feirante->telefone}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="inputEmail" class="col-sm-5 col-form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" value="{{$feirante->user->email}}">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="preco" class="col-sm-5 col-form-label">Preco</label>
                                <input type="file" class="form-control" id="preco" name="preco" value="{{$feirante->preco}}">
                            </div>
                          </div>
                      </div>
                        <input type="hidden" name="idFeirante" value="{{$feirante->id}}" />
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
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versão</b> 1.0
    </div>
    <strong>Copyright &copy; 2021 <a href="http://adminlte.io">conexaowebangola.com</a>.</strong> Todos os Direitos Reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
</body>
</html>