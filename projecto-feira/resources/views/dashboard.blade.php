@extends('layouts.front')
@section('conteudo')

<div class="site-blocks-cover overlay" style="background-image: url({{asset('assets/painel/images/img-inicial.png')}});" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">

      <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
        <div class="row justify-content-center mb-4">
          <div class="col-md-8 text-center">
            <h1>Oferecemos Produtos de Qualidade <span class="typed-words"> em nossa Plataforma</span></h1>
            <p class="lead mb-5">Participe agora! <!--a href="#" target="_blank">Colorlib</a--></p>
            <div><a  href="{{route('register')}}" class="btn btn-primary btn-md text-white" style="background-color: #f3ae34; border:red;">Inscrever-se</a></div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>  

<section class="site-section" >
  <div class="container">
    <div class="row">
    
      <div class="col-md-6 col-lg-6">
              <!--data-fancybox="gallery"-->
        <a href="{{route('dashboard.feiras')}}" class="media-1" >
          <div class="media-1-content" style="background-color: #f3ae34;">
            <img src="{{asset('assets/painel/images/feira.png')}}" alt="Image" class="img-fluid">
                
                  <!--h2 style="color:black;">FEIRAS</h2>
                  <span class="category" style="color:black;">Encontre produtos de qualidade com melhor preço!</span><br-->
            @if(Auth::check())
              <span class="category" style="color:black;"><a href="{{route('dashboard.feiras')}}" class="btn btn-primary btn-md text-white"style="background-color: #AB564F; border: red; margin: auto 5px 10px 200px;">Visitar</a></span>
            @else
              <span class="category"><a href="{{route('register')}}" class="btn btn-primary btn-md text-white" style="background-color: #AB564F; border: red; margin: auto 5px 10px 170px;">Inscrever-se</a></span><br>
            @endif
          </div>
        </a>
      </div>
            
          <!--div class="col-md-3 col-lg-6"-->
      <div class="col-md-6 col-lg-6">
        <a href="{{route('dashboard.mercados')}}" class="media-1" >
          <div class="media-1-content" style="background-color: #f3ae34;">
            <img src="{{asset('assets/painel/images/mercados.png')}}" alt="Image" class="img-fluid" width="150%" height="150%">
                
                  <!--h2 style="color:black;">Mercados</h2>
                  <span class="category" style="color:black;">Encontre produtos de qualidade com melhor preço!</span><br-->
                  @if(Auth::check())
                    <span class="category"><a href="{{route('dashboard.mercados')}}" class="btn btn-primary btn-md text-white"style="background-color: #AB564F; border: red; margin: auto 5px 10px 200px;">Visitar</a></span>
                  @else
                    <span class="category"><a href="{{route('register')}}" class="btn btn-primary btn-md text-white" style="background-color: #AB564F; border: red; margin: auto 5px 10px 170px;">Inscrever-se</a></span><br>
                  @endif
                </div>
              </a>
            </div>
        </div>
      </div>
    </section>

    <div class="site-section" id="about-section">
      <div class="container">
        <div class="row mb-5">
          
          <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade">
            <img src="{{asset('assets/painel/images/qs.png')}}" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-6 order-md-1" data-aos="fade">

            <div class="row">

              <div class="col-12">
                <div class="text-left pb-1">
                  <h2 class="text-black h1 site-section-heading">Quem somos</h2>
                </div>
              </div>
              <div class="col-12 mb-4">
                <p>O site Feira Online Angola, faz parte de uma serie de sites, criados pelo Marketeiro Walter Matias e sua organização com mesmo nome Walter Matias Consultores.</p>

                <p>Fundada em 2015 em Luanda a Walter Matias consultores e a Cesangola Lda, desenvolvem soluções de outsourcing marketing para empresas</p>

                <p>O site de directório, está enquadrado na classe de sites de promoção de venda por via da exposição de lojas, fornecedores e consultores, que ajudam todos intervenientes na cadeia de valor encontrarem e negociarem entre si a possível compra com a nossa intervenção ou intervenção directa dos envolvidos</p>
              </div>
              
            </div>
          </div>
          
        </div>
      </div>
    </div>
  
    
  


    <section class="site-section testimonial-wrap" style="margin: auto;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="text-black h1 site-section-heading text-center">Testemunhos</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              
              <blockquote class="mb-5">
                <p>&ldquo;Produtos de qualidade e plataforma confiável.&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="{{asset('assets/painel/images/person_3.jpg')}}" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Manuel Neto</p>
              </figure>
            </div>
          </div>
          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Produtos de qualidade e plataforma confiável..&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="{{asset('assets/painel/images/person_2.jpg')}}" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Rosa Lussala</p>
              </figure>
              
            </div>
          </div>

          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Produtos de qualidade e plataforma confiável.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="{{asset('assets/painel/images/person_4.jpg')}}" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Enock Afonso</p>
              </figure>

              
            </div>
          </div>

          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Produtos de qualidade e plataforma confiável.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="{{asset('assets/painel/images/person_5.jpg')}}" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Lucas Lourenço</p>
              </figure>

            </div>
          </div>

        </div>
    </section>

    @endsection