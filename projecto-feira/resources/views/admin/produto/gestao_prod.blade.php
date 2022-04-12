@extends('layouts.sidebar')
@section('title','Gerir Categoria')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><a href="{{route('categoria.form.cad')}}" class="btn btn-primary"> Nova categoria</a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categoria</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!--div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <!--div class="card-body">
              
            </div>
            <!-- /.card-body -->
          <!--/div-->
          <!-- /.card -->

          <div class="card">
            <div class="card-header" style="background-color: #343A40; color:aliceblue">
              <h3 class="card-title">Todos as Categorias</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#id</th>
                  <th>Descricção</th>
                  <!--th>Data fim</th>
                  <th>Exemplo</th-->
                  <th>Acção</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produtos as $produto)
                  <tr>
                    
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>X</td>
                    
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#id</th>
                  <th>Descricção</th>
                  <th>Acção</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 
@endsection
<!--/body>
</html>