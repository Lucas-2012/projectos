@extends('layouts.sidebar')
@section('title','Gerir Feira')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><a href="{{route('mercado.form.cad')}}" class="btn btn-primary"> Novo mercado</a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mercado</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
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

          <div class="card">
            <div class="card-header" style="background-color: #343A40; color:aliceblue">
              <h3 class="card-title">Todos os Mercados</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Designação</th>
                  <th>Data inicio</th>
                  <th>Data fim</th>
                  <th>Horário</th>
                  <th>Província</th>
                  <th>Acção</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mercados as $mercado)
                  <tr>
                    
                    <td>{{$mercado->designacao}}</td>
                    <td>{{$mercado->data_inicio}}</td>
                    <td>{{$mercado->data_fim}}</td>
                    <td>{{$mercado->horario}}</td>
                    <td>{{$mercado->provincia}}</td>
                    
                    <td>
                      <a href="#" type="submit" class="btn btn-danger shadow btn-xs sharp" data-myid="{{$mercado->id}}" data-toggle="modal" data-target="#eliminarModal" data-whatever="@mdo"><i class="fa fa-trash"></i></a>
                      <a href="{{route('mercado.editar', $mercado->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-edit"></i></a>
                    </td> 
                    @include('admin.mercado.modalEliminar')
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Designação</th>
                  <th>Data inicio</th>
                  <th>Data fim</th>
                  <th>Horário</th>
                  <th>Província</th>
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