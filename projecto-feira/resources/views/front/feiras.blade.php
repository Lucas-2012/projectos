@extends('layouts.front')
@section('title','Feiras')
@section('conteudo')

<section class="site-section" id="work-section">
  <div class="container" style="margin-top:100px;">
    <div class="row mb-5">
      <div class="col-12 text-center" style="background-color: #f3ae34;">
        <h2 class="text-black h1 site-section-heading" style="padding-top: 10px;">Feiras</h2>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      
      @forelse($feiras as $feira)
      {{--dd($infeira[1]->user, $infeira[1]->feira)--}}
        @auth
     
          @if(Auth::user()->tipo === "feirante")
            @php $valeu = 0; @endphp
            
            @foreach($infeira->feiras as $naFeira)
              @if($feira->id == $naFeira->id)
                
                @include('front.partes.feiras.visitar') @php $valeu = 1; @endphp
                @break

              @endif
            @endforeach

            @if ($valeu == 0)
              @include('front.partes.feiras.entrar')
            @endif

          @else
            @include('front.partes.feiras.visitar')
          @endif

        @endauth

        @guest
          @include('front.partes.feiras.visitar')
        @endguest
        

      @empty
          <div style="margin: auto;">
            <p class="text-black h3 float-center">Nenhuma feira disponível</p>
          </div>   

      @endforelse
    </div>
  </div>
</section>
    


@endsection