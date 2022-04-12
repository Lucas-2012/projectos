@extends('layouts.front')
@section('title','contacto')
@section('conteudo')


<section class="site-section bg-light" id="contact-section">
      <div class="container" style="margin-top:100px;">
        <div class="row mb-5">
        <div class="col-12 text-center" style="background-color: #f3ae34;">
            <h2 class="text-black h1 site-section-heading" style="padding-top: 10px;">Contacte-nos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 mb-5">

            

            <form action="{{route('dashboard.enviar_contacto')}}" method="POST" class="p-5 bg-white">
              @csrf
              <!--h2 class="h4 text-black mb-5">Contact Form</h2--> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Nome</label>
                  <input type="text" id="fname" name="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Sobrenome</label>
                  <input type="text" id="lname" name="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">E-mail</label> 
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Assunto</label> 
                  <input type="subject" id="subject" name="assunto" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Mensagem</label> 
                  <textarea name="message" id="message" name="mensagem" cols="30" rows="7" class="form-control" placeholder="escreva aqui a sua mensagem..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Enviar" class="btn btn-primary btn-md text-white" style="background-color: #f3ae34; border: red; ">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Endereço</p>
              <p class="mb-4">Kilamba, bloco A1, Luanda-Angola</p>

              <p class="mb-0 font-weight-bold">Telefone</p>
              <p class="mb-4"><a href="#">+ 244 948 812 633</a></p>

              <p class="mb-0 font-weight-bold">E-mail</p>
              <p class="mb-0"><a href="#">info@feiraonline.com</a></p>

            </div>
            
          </div>
        </div>
      </div>
    </section>
  


@endsection