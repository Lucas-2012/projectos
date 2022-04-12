@extends('layouts.sidebar')
@section('title','Cadastrar feira')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrando Feira</h1>
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
            
              <div class="card-header" style="background-color: #6C757D; color: #ffffff">
                <h3 class="card-title" >Dados da Feira</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <!------- Inicio do Form ----->
                
                <form role="form" method="POST" action="{{route('feira.guardar')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Designação</label>
                        <input type="text" name="nome_feira" class="form-control" placeholder="Tema da feira" required>
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
                        <input type="time" name="horario" class="form-control" required>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data de inicio</label>
                        <input type="date" name="data_inicio" class="form-control" placeholder="dd/mm/aaa" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data término</label>
                        <input type="date" name="data_fim" class="form-control" placeholder="dd/mm/aaa" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" name="endereco" class="form-control" placeholder="município, bairro, rua" required>
                      </div>
                    </div>
                    
                    <!--div class="col-sm-3">
                      <div class="form-group">
                        <label>Província</label>
                        <select class="form-control">
                          <option value="">--escolher a província</option>
                          <option value="Luanda">Luanda</option>
                          <option value="Bengo"> Bengo</option>
                          <option value="Huíla">Huíla</option>
                        </select>
                      </div>
                    </div-->
                    
                    
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Cartaz</label>
                          <input type="file" name="cartaz" class="form-control" required>
                        </div>
                      </div>
                    
                  </div>

                  <div class="form-group">
                    <a href="{{route('gest_feira')}}" class="btn btn-primary float-left">
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