@extends('layouts.front')
@section('title','Perfil')
@section('conteudo')


<section class="site-section bg-light" id="contact-section">
  <div class="container" style="margin-top:80px;">
        <div class="row mb-5">
        {{--<!-- <a href="{{route('todos.expositores')}}">voltar</a> -->--}}
          <div class="col-md-12 text-center" style="background-color: #f3ae34;">
            <h2 class="text-black h1 site-section-heading" style="padding-top: 10px;"><b class="category">Perfil de: {{$feirante->user->name}}</b></h2>
          </div>
        </div>
        <div class="row">
          
          <div class="col-md-4 col-xs-4 mb-3">
              <div class="p-3 mb-3 bg-white" style="width: 310px; height: 460px;">
                <img src="/storage/fotos/feirante/{{$feirante->user->foto}}" alt="{{$feirante->name}}" class="img-fluid" style="height: 415px;">
              </div>
          </div>
          <div class="col-md-6 mb-3" style="width: 655px; height: 500px; ">

            <div class="p-3 bg-white" >

              <iframe width="515" height="415" src="{{$feirante->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <!-- <img src="/storage/fotos/feirante/{{$feirante->foto}}" alt="{{$feirante->name}}" class="img-fluid" style="height:150px; width: 505px;"> -->

            </div>
          </div>
          
          <div class="col-xs-2 mb-3">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Província</p>
              <p class="mb-4"style="color:#f3ae34">{{$feirante->provincias($feirante->provincias_id)}}</p>

              <p class="mb-0 font-weight-bold">Telefone</p>
              <p class="mb-4"><a href="#" style="color:#f3ae34">+ 244 948 812 633</a></p>

              
              <a href="/storage/TabelaPreco/feirante/{{$feirante->preco}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red; margin:auto;" target="_blank">Preços</a>

            </div>
            
          </div>
        </div>
        
      </div>
    </section>
@endsection