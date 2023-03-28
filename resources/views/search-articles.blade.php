<x-layout title="Homepage">
    <div class="container altezza-container h-footer-articles">
        <div class="row justify-content-center text-center mt-5">
            <div class="col-12 col-md-6">
                <h1>Risultati della ricerca {{$search}}</h1>
            </div>
        </div>
        
        <div class="row justify-content-center text-center mt-5">
            <div class="col-12 col-md-6">
                @if (session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $article) 
            <div class="col-12 col-md-4 spazio-tra-card">
                <div class="card grandezza_card" style="width: 18rem;">
                    <img src="{{Storage::url($article->img)}}" class="card-img-top grandezza_img" id="grandezza-telefono" alt="{{$article->title}}">
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
    </div>
    
    
    
    
</x-layout>