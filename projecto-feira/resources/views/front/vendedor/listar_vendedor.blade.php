@extends('layouts.front')
@section('title','Vendedores')
@section('conteudo')

<section class="site-section" id="work-section">
  <div class="container" style="margin-top:100px;">
    <div class="row mb-5">
      <div class="col-12 text-center" style="background-color: #f3ae34;">
        <h2 class="text-black h1 site-section-heading" style="padding-top: 10px;">Expositores | Vendedores</h2>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row" style="margin-left: 80px;">
      @if(count($vendedores) === 0)
        <div style="margin: auto;">
          <p class="text-black h3 float-center">Nenhum expositor disponível</p>
        </div>
      @else
        @foreach($vendedores as $vendedor)
          <div class="col-md-6 col-lg-4">
            <a href="{{route('vendedor.perfil', [$vendedor->id])}}"    alt="" class="media-1">
              <img src="/storage/fotos/vendedor/{{$vendedor->foto}}" alt="{{$vendedor->designacao}}" class="img-fluid">
                  <!-- "{{asset('assets/painel/images/img_1.jpg')}}" AB564F->cor vermelha-->
              <div class="media-1-content">
                <h2><b>Expositor(a):</b> {{$vendedor->name}}</h2>
                <span class="category"><b>Produtos</b>:{{$vendedor->produtos}}</span><br><br>
                
                <span class="category"><button href="#" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Ver perfil</button></span>
              </div>
            </a>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>
    


@endsection