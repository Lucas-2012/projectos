<div class="col-md-6 col-lg-4">
                    
                    <a href="{{route('inscrever.feira', [$feira->id])}}"  alt="{{$feira->designacao}}" class="media-1">
                      <img src="/fotos/feira/{{$feira->cartaz_feira}}" alt="{{$feira->designacao}}" class="img-fluid" style = "width: 550px; height:450px;">
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