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
          <h3><a href="{{route('feirante.form.cad')}}" class="btn btn-primary"> Novo Feirante</a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Feirante</li>
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
              <h3 class="card-title">Todos os Feirante</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>Província</th>
                  <th>Acção</th>
                </tr>
                </thead>
                <tbody>
                @foreach($feiantes as $feirante)
                <tr>
                  <td>{{$feirante->id}}</td>
                  <td>{{$feirante->user->name}}</td>
                  <td>{{$feirante->user->email}}</td>
                  <td>{{$feirante->telefone}}</td>
                  @foreach($provincias as $provincia)
                    @if($provincia->id === $feirante->provincias_id)
                      <td>{{$provincia->descricao}}</td>
                    @endif
                  @endforeach
                  <td>

                  <a href="#" type="submit" class="btn btn-success shadow btn-xs sharp" data-myid="{{$feirante->id}}" data-toggle="modal" data-target="#addVideoModal" data-whatever="@mdo"><i class="fa fa-trash"></i></a>
                  <a href="#" type="submit" class="btn btn-danger shadow btn-xs sharp" data-myid="{{$feirante->id}}" data-toggle="modal" data-target="#eliminarModal" data-whatever="@mdo"><i class="fa fa-trash"></i></a>
                  <a href="{{route('feirante.editar', $feirante->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-edit"></i></a>
                        <!--button type="button" class="btn btn-info">ver</button-->
                        <!--button type="button" class="btn btn-danger">apagar</button-->
                        <!--button type="button" class="btn btn-success">editar</button-->
                      <!--/div-->
                  </td>
                  @include('admin.feirante.modalEliminar')
                  @include('admin.feirante.modalAddVideo')
            
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#ID</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
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