<x-layout>
    <div class="container mb-h altezza-container">
        <div class="row justify-content-between mt-5">
            <div class="col-12 col-md-4">
                <img class="grandezza-da-tel h-detail" src="{{Storage::url($article->img)}}" alt="{{$article->title}}" width="420">
            </div>
            <div class="col-12 col-md-6">
               <div class="mb-5">
                    <h2>{{$article->title}}</h2>
               </div>
                <h4 class="mb-3">{{$article->description}}</h4>
                <p>{{$article->body}}</p>
                <p>Autore: {{$article->user->name}}</p>
                <p>Categoria: {{$article->category->name}}</p>


               @if (count($article->tags))
                @foreach ($article->tags as $tag)
                    <p class="fst-italic text-capitalize d-inline">{{$tag->name}}</p>
                @endforeach
               @endif
                   
               <div class="mt-3 da-telefono">
                   <a href="{{route('homepage')}}" class="btn btn-primary">Torna indietro</a>
               </div>
                @if (Auth::user() && Auth::user()->is_revisor)
                    <h4 class="mt-4">Sezione di revisione</h4>
                <a href="{{route('revisor.choice', ['choice'=>true, 'article'=>$article])}}" class="btn btn-success">Accetta</a>
                <a href="{{route('revisor.choice', ['choice'=>0, 'article'=>$article])}}" class="btn btn-warning">Rifiuta</a>
                <form method="POST" action="{{route('revisor.delete', compact('article'))}}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger mt-2" type="submit">Elimina</button>
                </form>
                               

                @endif
            </div>
        </div>
    </div>
</x-layout>