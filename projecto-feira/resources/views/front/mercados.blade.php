@extends('layouts.front')
@section('title','Mercados')
@section('conteudo')

<section class="site-section" id="work-section">
  <div class="container" style="margin-top:100px;">
    <div class="row mb-5">
      <div class="col-12 text-center" style="background-color: #f3ae34;">
        <h2 class="text-black h1 site-section-heading" style="padding-top: 10px;">Mercados</h2>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      
      @forelse($mercados as $mercado)

        @auth
          @if(Auth::user()->tipo === "Vendedor")
            @php $valeu = 0; @endphp
            
            @foreach($vendedor_mercados as $noMercado)
            
              @if($noMercado->mercado === $mercado->id && $noMercado->user === Auth::user()->id)
                  
                @include('front.partes.mercados.visitar') @php $valeu = 1; @endphp
                @break
                  
              @endif
            @endforeach

            @if ($valeu == 0)
            
              @include('front.partes.mercados.entrar')
            @endif

          @else
            @include('front.partes.mercados.visitar')
          @endif
        @endauth

        @guest
          @include('front.partes.mercados.visitar')
        @endguest
        
      @empty
          <div style="margin: auto;">
            <p class="text-black h3 float-center">Nenhum mercado disponível</p>
          </div>   
      @endforelse
      
      
    </div>
  </div>
</section>
    


@endsection