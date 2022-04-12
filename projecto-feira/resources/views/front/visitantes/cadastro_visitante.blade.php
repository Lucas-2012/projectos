@extends('layouts.front')
@section('title','cadastro')
@section('conteudo')
<section class="site-section bg-light" id="contact-section">
      <div class="container" style="margin-top:100px;">
        <div class="row mb-5">
        <div class="col-12 text-center" style="background-color: #f3ae34;">
            <h2 class="text-black h1 site-section-heading" style="padding-top: 10px;">Cadastrando-se</h2>
          </div>
        </div>
        <!-- Validation Errors -->
        
        <div class="row">
        
          <div class="col-md-12 mb-5">
            @if ($errors->all())
            <div class="alert alert-danger" role="alert">
              <x-auth-validation-errors class="mb-4 text-float-center" :errors="$errors" />
            </div>
            @endif
          <form action="{{route('guarda.visitante')}}" method="POST" class="p-5 bg-white" enctype="multipart/form-data">
            @csrf 
              <!--h2 class="h4 text-black mb-5">Contact Form</h2--> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Nome (Primeiro e o último)</label>
                  <input type="text" id="fname" name="name" class="form-control" placeholder="nome" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">E-mail</label> 
                  <input type="email" id="email" name="email" class="form-control" placeholder="email" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Palavra Passe</label> 
                  <input type="password" id="email" name="password" class="form-control" placeholder="password" required>
                </div>

                <div class="col-md-6">
                  <label class="text-black" for="email">Confirmar</label> 
                  <input type="password" id="email" name="confirm_password" class="form-control" placeholder="Confirmar password" required>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-6">
                  <label class="text-black" for="subject">Telefone</label> 
                  <input type="text" id="subject" name="telefone" class="form-control" required>
                </div>

                <div class="col-md-6">
                  <label class="text-black" for="lname">Província</label>
                  <select name="provincia" class="form-control" required>
                    <option class="form-control" value="">--escolher--</option>
                      @foreach($provincias as $provincia)
                        <option class="form-control" value="{{$provincia->id}}">{{$provincia->descricao}}</option>
                      @endforeach
                  </select>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <button type="submit" value="Cadastrar" class="btn btn-primary btn-md text-white float-rigth" style="background-color: #f3ae34; border:red; margin: 2px 50px 2px 450px;"> Cadastrar</button>
                </div>
              </div>

  
            </form>
          </div>

          </div>
      </div>
    </section>



@endsection