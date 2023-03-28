<x-layout title="Homepage">
    <div class="container">
        <div class="row justify-content-center text-center mt-h">
            <div class="col-12 col-md-6">
                <h1>Storia Oggi</h1>
            </div>
        </div>
        
        <div class="row justify-content-center text-center mt-5">
            <div class="col-12 col-md-6">
                @if (session('message'))
                <div class="alert alert-light text-center">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>

        {{-- Inizio Card --}}
        <div class="row">
            @foreach ($articles as $article) 
            <div class="col-12 col-md-4 spazio-tra-card">
                <div class="card grandezza_card" style="width: 18rem;">
                    <img src="{{Storage::url($article->img)}}" class="card-img-top grandezza_img" alt="{{$article->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->description}}</p>
                        <p>Autore:<a class="text-decoration-none" href="{{route('user.articles', ['user'=>$article->user->id])}}">{{$article->user->name}}</a></p>
                        
                        
                        <p>Categoria:<a class="text-decoration-none" href="{{route('category.articles', ['category'=>$article->category->id])}}">{{$article->category->name}}</a></p>
                        
                        
                        <div class="grandezza-descrizione">
                            <p class="over-flow">Descrizione: {{$article->body}}</p>                                                                           
                        </div>                  
                        <div class="d-flex justify-content-center">                         
                            <a href="{{route('article.detail', ['id'=>$article->id])}}" class="btn btn-primary">Vai al Dettaglio</a>                          
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
        {{-- Fine Card --}}




        
        <div class="row justify-content-center bg-white bordi mb-5" id="h-dicosatrattiamo">
            <div class="col-12 col-md-6">
                <h5 class="card-title text-center mt-4">Di cosa trattiamo</h5>
                <p class="card-text text-center">Storia Oggi, si occupa di scrivere e far scrivere articoli, riguardanti storie/avvenimenti di epoche passate.
                    Chiunque potrà pubblicare articoli, previa richiesta su Lavora con noi, una volta accettata la richiesta comunque gli articoli verrano prima
                    visionati per assicurarci che le foto non siano fuori luogo e che gli articoli siano in linea con la categoria.
                </p>
            </div>

            <div class="bg-color-div mt-2"> </div>

            <div class="row">
            <div class="col-12 col-md-6 bg-white bordi" id="h-dicosatrattiamo">
                <h5 class="card-title text-center mt-2">Fondatore</h5>
                <div class="d-flex justify-content-center mb-3">
                    <img class="h-img mb-2" src="/storage/img/Foto.jpg" alt="Foto del fondatore">
                </div>
            </div>
            <div class="col-12 col-md-6 bg-white">
                <p class="card-text text-center mt-5">Andrea Poddighe: sono appassionato di storia e attualmente studio programmazione per diventare Full-Stack Developer.</p>
            </div>
            </div>
        </div>
    </div>  
    
    
    



    
    
</x-layout>