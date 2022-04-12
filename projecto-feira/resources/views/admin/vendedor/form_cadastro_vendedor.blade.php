@extends('layouts.sidebar')
@section('title','Cadastrar vendedor')
@section('content') 
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrando Vendedor</h1>
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
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header" style="background-color: #6C757D; color: #ffffff">
                <h3 class="card-title" >Dados do Vendedores</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <!------- Inicio do Form ----->
                
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Designação</label>
                        <input type="text" class="form-control" placeholder="nome" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" placeholder="seu e-mail" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>País</label>
                        <select class="form-control">
                          <option value="">--escolher o país--</option>
                          <option value="Angola">Angola</option>
                          <option value="Namíbia">Namíbia</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Província</label>
                        <select class="form-control">
                          <option value="">--escolher a província--</option>
                          <option value="Luanda">Luanda</option>
                          <option value="Windhook">Windhook</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" placeholder="921 227 523" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">escolher foto</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Carregar</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">Cadastrar</button>
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