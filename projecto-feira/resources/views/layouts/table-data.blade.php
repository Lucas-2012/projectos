<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{asset('open-iconic/font/css/open-iconic.css" rel="stylesheet')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet')}}">
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

  @yield('barralateral')
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
