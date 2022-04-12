@extends('layouts.sidebar')
@section('title','Cadastrar Categoria')
@section('content')
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrando Categoria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastro</li>
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
          <div class="col-md-7 float-left">
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
              <div class="card-header float-right" style="background-color: #6C757D; color: #ffffff">
                <h3 class="card-title" >Dados da Categoria</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <!------- Inicio do Form ----->
                
                <form role="form" method="POST" action="{{route('categoria.guardar')}}" enctype="multipart/form-data">
                  @csrf
                  <!--div class="row"-->
                    <div class="col-sm-7">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" name="nome" class="form-control" placeholder="nome do produto" required>
                      </div>
                    </div>
                    <!--div class="col-sm-6">
                      <div class="form-group">
                        <label>Data de inicio</label>
                        <input type="date" name="data_inicio" class="form-control" placeholder="dd/mm/aaa" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data término</label>
                        <input type="date" name="data_fim" class="form-control" placeholder="dd/mm/aaa" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Cartaz</label>
                        <input type="file" name="cartaz" class="form-control" required>
                      </div>
                    </div>
                    
                  </div-->
                  <div class="col-sm-7">
                        <div class="form-group">
                            
                            <button type="submit" class="btn btn-success float-center form-control">Cadastrar</button>
                        </div>
                    </div>
                </form>

              </div>
              <!-- /.card-body-- >
            </div>
            
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