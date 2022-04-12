@extends('layouts.sidebar')
@section('title','Editar Mercado')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editando Mercado</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Editar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              @if ($errors->all()) 
                @foreach ($errors->all() as $error)
                  <div class="alert alert-success" role="alert">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4>{{$error}}</h4>
                  </div>
                @endforeach 
              @endif
              <div class="card-header" style="background-color: #6C757D; color: #ffffff">
                <h3 class="card-title" >Dados do Mercado</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <!------- Inicio do Form ----->
                
                <form role="form" method="POST" action="{{route('mercado.update', $mercado->id)}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Designação</label>
                        <input type="text" name="nome_mercado" value="{{$mercado->designacao}}" class="form-control" placeholder="nome do mercado" required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Província</label>
                        <select class="form-control" name="provincia">
                          <option value="">--escolher a província</option>
                          @foreach($provincias as $provincia)
                            <option value="{{$provincia->descricao}}">{{$provincia->descricao}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Horário</label>
                        <input type="time" name="horario" value="{{$mercado->horario}}" class="form-control" required>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data de inicio</label>
                        <input type="date" name="data_inicio" value="{{$mercado->data_inicio}}" class="form-control" placeholder="dd/mm/aaa" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data término</label>
                        <input type="date" name="data_fim" value="{{$mercado->data_fim}}" class="form-control" placeholder="dd/mm/aaa" required>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Endereço</label>
                          <input type="text" name="endereco" value="{{$mercado->endereco}}" class="form-control" placeholder="município, bairro, rua" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Cartaz</label>
                          <input type="file" name="cartaz" class="form-control" required>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                  <a href="{{route('mercado.todos')}}" class="btn btn-primary float-left">
                      << Voltar
                    </a>
                    <button type="submit" class="btn btn-success float-right">Cadastrar</button>
                  </div>
                </form>

              </div>
              <!-- /.card-body-- >
            </div-->
            
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection