@extends('layouts.sidebar')
@section('title','Editar Vendedor')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Vendedor</h1>
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
              <div class="card-header" style="background-color: #6C757D; color: #ffffff">
                <h3 class="card-title" >Dados do Vendedor</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">

                <!------- Inicio do Form ----->
                
                <form role="form" action="{{route('vendedor.update', $vendedor->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT') 
                <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Designação</label>
                        <input type="text" class="form-control" name="name" value="{{$vendedor->user->name}}" placeholder="nome" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" value="{{$vendedor->user->email}}" placeholder="email" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>País</label>
                        <select class="form-control" name="pais">
                          <!--option value="">--escolher o país--</option-->
                          @foreach($paises as $pais)
                            @if($pais->id === $vendedor->pais_id)
                              <option value="{{$pais->id}}">{{$pais->descricao}}</option>
                            @else
                              <option value="{{$pais->id}}">{{$pais->descricao}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Província</label>
                        <select class="form-control" name="provincia">
                          <!--option value="">--escolher a província--</option-->
                          
                          @foreach($provincias as $provincia)
                            @if($provincia->id === $vendedor->provincia_id)
                              <option value="{{$provincia->id}}">{{$provincia->descricao}}</option>
                            @else
                              <option value="{{$provincia->id}}">{{$provincia->descricao}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="{{$vendedor->telefone}}" placeholder="921 227 523" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="exampleInputFile" disabled>
                            <label class="custom-file-label" for="exampleInputFile">escolher foto</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Carregar</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <label>Quais as categorias de produtos que vendes?</label>
                  <div class="row">
                    @foreach($produtos as $produto)
                      <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            
                            <input type="checkbox" name="produtos[]" value="{{$produto->nome}}" id="checkboxSuccess3" >
                            <label for="checkboxSuccess3">
                              {{$produto->nome}}
                            </label>
                          </div>
                        </div>
                      </div>
                    @endforeach
                   
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <button type="submit" class="btn btn-success float-left">Cadastrar</button>
                      </div>
                    </div>
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