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
        
            
            @if(Auth::check())
            
              @if(Auth::user()->tipo === "feirante")
                @forelse($feirante_feiras->feira as $feirante_feira)
                
                  @if($feirante_feira->feira)
                  
                    <div class="col-md-6 col-lg-4">
                      <a href="{{route('todos.expositores', [$feira->id])}}"  alt="{{$feira->designacao}}" class="media-1" >
                        <img src="/fotos/feira/{{$feira->cartaz_feira}}" alt="{{$feira->designacao}}" class="img-fluid" w height="5">
                        <div class="media-1-content">
                          <h2>{{$feira->designacao}}</h2>
                          <span class="category">Local: {{$feira->provincia}}</span><br>
                          <span class="category">Endereço: {{$feira->endereco}}</span><br>
                          <span class="category">Data inicio: {{date('d-m-Y',strtotime($feira->data_inicio))}}</span><br>
                          <span class="category">Data término: {{date('d-m-Y',strtotime($feira->data_fim))}}</span><br>
                          
                          <span class="category">

                            <button href="{{route('todos.expositores', [$feira->id])}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Visitar</button>

                          </span><br>
                        </div>
                      </a> 
                    </div>
                    @break
                  @else
                  <div class="col-md-6 col-lg-4">
                  
                    <a href="{{route('inscrever.feira', [$feira->id])}}"  alt="{{$feira->designacao}}" class="media-1">
                      <img src="/fotos/feira/{{$feira->cartaz_feira}}" alt="{{$feira->designacao}}" class="img-fluid" height="5px">
                      <div class="media-1-content">
                        <h2>{{$feira->designacao}}</h2>
                        <span class="category">Local: {{$feira->provincia}}</span><br>
                        <span class="category">Endereço: {{$feira->endereco}}</span><br>
                        <span class="category">Data inicio: {{date('d-m-Y',strtotime($feira->data_inicio))}}</span><br>
                        <span class="category">Data término: {{date('d-m-Y',strtotime($feira->data_fim))}}</span><br>
                        <span class="category">
                          <button href="{{route('inscrever.feira', [$feira->id])}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Entrar</button>
                        </span><br>
                      </div>
                      </a>
                    </div>
                    @break
                  @endif
                @empty
               
                  <div class="col-md-6 col-lg-4">
                    
                    <a href="{{route('inscrever.feira', [$feira->id])}}"  alt="{{$feira->designacao}}" class="media-1">
                      <img src="/fotos/feira/{{$feira->cartaz_feira}}" alt="{{$feira->designacao}}" class="img-fluid" width="550" height="500">
                      <div class="media-1-content">
                        <h2>{{$feira->designacao}}</h2>
                        <span class="category">Local: {{$feira->provincia}}</span><br>
                        <span class="category">Endereço: {{$feira->endereco}}</span><br>
                        <span class="category">Data inicio: {{date('d-m-Y',strtotime($feira->data_inicio))}}</span><br>
                        <span class="category">Data término: {{date('d-m-Y',strtotime($feira->data_fim))}}</span><br>
                        <span class="category">
                          <button href="{{route('inscrever.feira', [$feira->id])}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Entrar</button>
                        </span><br>
                      </div>
                      </a>
                  </div>
                @endforelse
              @else
              <div class="col-md-6 col-lg-4">
                <a href="{{route('todos.expositores', [$feira->id])}}"  alt="{{$feira->designacao}}" class="media-1">
                  <img src="/fotos/feira/{{$feira->cartaz_feira}}" alt="{{$feira->designacao}}" class="img-fluid" width="550" height="500">
                    <div class="media-1-content">
                      <h2>{{$feira->designacao}}</h2>
                      <span class="category">Local: {{$feira->provincia}}</span><br>
                      <span class="category">Endereço: {{$feira->endereco}}</span><br>
                      <span class="category">Data inicio: {{date('d-m-Y',strtotime($feira->data_inicio))}}</span><br>
                      <span class="category">Data término: {{date('d-m-Y',strtotime($feira->data_fim))}}</span><br>
                      <span class="category">
                        <button href="{{route('todos.expositores', [$feira->id])}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Visitar</button>
                      </span><br>
                    </div>
                  </a></div>
              @endif
            @else
            <div class="col-md-6 col-lg-4">
              <a href="{{route('todos.expositores', [$feira->id])}}"  alt="{{$feira->designacao}}" class="media-1">
                <img src="/fotos/feira/{{$feira->cartaz_feira}}" alt="{{$feira->designacao}}" class="img-fluid" width="550" height="500">
                <div class="media-1-content">
                    <h2>{{$feira->designacao}}</h2>
                    <span class="category">Local: {{$feira->provincia}}</span><br>
                    <span class="category">Endereço: {{$feira->endereco}}</span><br>
                    <span class="category">Data inicio: {{date('d-m-Y',strtotime($feira->data_inicio))}}</span><br>
                    <span class="category">Data término: {{date('d-m-Y',strtotime($feira->data_fim))}}</span><br>
                    <span class="category">
                      <button href="{{route('todos.expositores', [$feira->id])}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Visitar</button>
                    </span><br>
                </div>
              </a>
            </div>
            @endif
      @empty
          <div style="margin: auto;">
            <p class="text-black h3 float-center">Nenhuma feira disponível</p>
          </div>   

      @endforelse
      
      
    </div>
  </div>
</section>
    


@endsection