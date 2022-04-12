<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{asset('open-iconic/font/css/open-iconic.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contacto</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>
  <!-- /.navbar -->

 <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('assets/dist/img/feira-logo.png')}}" alt="FEIRA logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">FEIRA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
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
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Perfil</p>
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
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <!--i class="nav-icon fas fa-tachometer-alt"></i-->
              <p>
                Página inicial
                <!--i class="right fas fa-angle-left"></i-->
              </p>
            </a>
            
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Feira
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('gest_feira')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir feira</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Feirantes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('feirante.todos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir feirantes</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Mercados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('mercado.todos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir mercados</p>
                </a>
              </li>            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Vendedores
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('vendedor.todos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir vendedores</p>
                </a>
              </li>            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Visitante
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visitante.todos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir visitante</p>
                </a>
              </li>            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Categorias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categoria.todas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir categoria</p>
                </a>
              </li>
              
            </ul>
          </li>
             
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  @yield('content')

    <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
    <strong>Copyright &copy; 2021 <a href="#">Feira Online</a>.</strong> Todos os direitos reservados | Desenvolvido pela  <strong><a href="https://www.conexaowebangola.com">Conexão Web</a></strong>
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
<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<!-------------- SCRIPT PARA O MODAL ELIMINAR------->
<script type="text/javascript">
               
    $('#eliminarModal').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget)
        var id = button.data('myid')
  
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
})

</script>

<!-------------- SCRIPT PARA O MODAL EDITAR------->
<script type="text/javascript">
               
    $('#editarModal').on('show.bs.modal', function(event){

        var button       = $(event.relatedTarget)
        var id           = button.data('myid')
        var name         = button.data('myname')
        var email        = button.data('myemail')
        var designacao   = button.data('mydesignacao')
        var telefone     = button.data('mytelefone')
        var morada       = button.data('mymorada')
        var nif          = button.data('mynif')
        var pais         = button.data('mypais')
        var municipio    = button.data('mymunicipio')
        var provincia    = button.data('myprovincia')
        var foto_interna = button.data('myfoto_interna')
        var foto_externa = button.data('myfoto_externa')
        var descricao    = button.data('mydescricao')
        var link         = button.data('mylink')
        var proprietario = button.data('myproprietario')
        var imagem       = button.data('myimagem')
        var categoria    = button.data('mycategoria')
               

        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #designacao').val(designacao);
        modal.find('.modal-body #telefone').val(telefone);
        modal.find('.modal-body #morada').val(morada);
        modal.find('.modal-body #provincia').val(provincia);
        modal.find('.modal-body #municipio').val(municipio);
        modal.find('.modal-body #pais').val(pais);
        modal.find('.modal-body #nif').val(nif);
        modal.find('.modal-body #link').val(link);
        modal.find('.modal-body #descricao').val(descricao);
        modal.find('.modal-body #proprietario').val(proprietario);
        modal.find('.modal-body #foto_externa').val(foto_externa);
        modal.find('.modal-body #foto_interna').val(foto_interna);
        modal.find('.modal-body #imagem').val(imagem);
        modal.find('.modal-body #categoria').val(categoria);

    })

</script>   
    
</body>
</html>
