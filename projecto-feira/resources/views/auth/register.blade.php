@extends('layouts.front')
@section('title','Registar')
@section('conteudo')

<section class="site-section" id="work-section">
  <div class="container" style="margin-top:100px;">
    <div class="row mb-5">
      <div class="col-12 text-center" style="background-color: #f3ae34;">
        <h2 class="text-black h1 site-section-heading" style="padding-top: 10px;">Inscrever-se como?</h2>
      </div>
    </div>
  </div>
  <div class="container" >
   
    <div class="row" style="width: 1000px; display: flex; flex-direction: row; justify-content: center; align-items: center;">
      
        <div class="col-md-4 col-lg-2  align-items-center" >
              
            <!--a href="{{asset('assets/dist/img/feirante1.png')}}"    alt="feirante" class="media-1" -->
                <img src="{{asset('assets/dist/img/feirante1.png')}}" alt="visitante" class="img-fluid media-1 " width="300"><br>
                  <!-- "{{asset('assets/painel/images/img_1.jpg')}}" -->
                <div class="media-1-content">
                    <a href="{{route('form.visitante')}}" class="btn btn-primary btn-md float-auto" style="background-color: #f3ae34; border:red; margin-top: -50px; margin-left: -5px" > Visitante</a>
                </div>
            <!--/a-->
        </div>
      
        <div class="col-md-4 col-lg-2  align-items-center" >
              
            <!--a href="{{asset('assets/dist/img/feirante1.png')}}"    alt="feirante" class="media-1" -->
                <img src="{{asset('assets/dist/img/feirante1.png')}}" alt="feirante" class="img-fluid media-1" width="300"><br>
                  <!-- "{{asset('assets/painel/images/img_1.jpg')}}" -->
                <div class="media-1-content">
                    <a href="{{route('feirante.form')}}" class="btn btn-primary btn-md float-center" style="background-color: #f3ae34; border:red; margin-top: -50px; margin-left: -5px;" > Feirante</a>
                    
                </div>
            <!--/a-->
        </div>
        <div class="col-md-4 col-lg-2  align-items-center">
              
            <!--a href="{{asset('assets/dist/img/feirante1.png')}}"    alt="feirante" class="media-1" -->
                <img src="{{asset('assets/dist/img/feirante1.png')}}" alt="feirante" class="img-fluid media-1" width="300"><br>
                  <!-- "{{asset('assets/painel/images/img_1.jpg')}}" -->
                <div class="media-1-content">
                    <a href="{{route('form.vendedor')}}" class="btn btn-primary btn-md float-center" style="background-color: #f3ae34; border:red; margin-top: -50px; margin-left: -5px;" > Vendedor</a>
                </div>
            <!--/a-->
        </div>
    </div>
  </div>
</section>
@endsection