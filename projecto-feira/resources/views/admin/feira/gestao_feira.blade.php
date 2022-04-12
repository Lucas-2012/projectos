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
            <h3><a href="{{route('feira.form.cad')}}" class="btn btn-primary"> Nova feira</a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Feira</li>
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
            <!--/div-->
          <div class="card">
            <div class="card-header" style="background-color: #343A40; color:aliceblue">
              <h3 class="card-title">Todas as Feiras</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Designação</th>
                  <th>Data inicio</th>
                  <th>Data fim</th>
                  <th>Horário</th>
                  <th>Província</th>
                  <th>Acção</th>
                </tr>
                </thead>
                
                  <tbody>
                  @foreach($feiras as $feira)
                  <tr>
                    <td>{{$feira->id}}</td>
                    <td>{{$feira->designacao}}</td>
                    <td>{{$feira->data_inicio}}</td>
                    <td>{{$feira->data_fim}}</td>
                    <td>{{$feira->horario}}</td>
                    <td>{{$feira->provincia}}</td>
                    
                    <td>
                      <a href="#" type="submit" class="btn btn-danger shadow btn-xs sharp" data-myid="{{$feira->id}}" data-toggle="modal" data-target="#eliminarModal" data-whatever="@mdo"><i class="fa fa-trash"></i></a>
                      <a href="{{route('feira.editar', $feira->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-edit"></i></a>
                    </td> <!------------------------------------------------- MODAL ELIMINAR ------------------------->
                    <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color: #343A40;">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Eliminar Feira</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" style="color: #FFFFFF;">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{route('feira.eliminar')}}" class="" enctype="multipart/form-data" id="formEliminar">
                            @csrf
                            @method('DELETE')
                                              
                              <input type="hidden" name="id" id="id" value="">
                              <p>Tens a certeza?</p>
                                              
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secundary" data-dismiss="modal">Não!</button>
                                  <button type="submit" class="btn btn-primary">Sim, Eliminar!</button>
                              </div>  
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fim do modal eliminar -->

                  </tr>
                  @endforeach
                  </tbody>
                
                <tfoot>
                <tr>
                  <th>#ID</th>
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