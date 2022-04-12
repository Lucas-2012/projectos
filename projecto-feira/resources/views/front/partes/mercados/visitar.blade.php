<div class="col-md-6 col-lg-4">
    <a href="{{route('todos.vendedores', [$mercado->id])}}"  alt="{{$mercado->designacao}}" class="media-1">
        <img src="/fotos/mercado/{{$mercado->cartaz_mercado}}" alt="{{$mercado->designacao}}" class="img-fluid" style = "width: 550px; height:450px;">
        <div class="media-1-content">
            <h2>{{$mercado->designacao}}</h2>
            <span class="category">Local: {{$mercado->provincia}}</span><br>
            <span class="category">Endereço: {{$mercado->endereco}}</span><br>
            <span class="category">Data inicio: {{date('d-m-Y',strtotime($mercado->data_inicio))}}</span><br>
            <span class="category">Data término: {{date('d-m-Y',strtotime($mercado->data_fim))}}</span><br>
            <span class="category">
                <button href="{{route('todos.expositores', [$mercado->id])}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Visitar</button>
            </span><br>
        </div>
    </a>
</div>