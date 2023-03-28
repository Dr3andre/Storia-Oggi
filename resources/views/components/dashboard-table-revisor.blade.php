<table class="table w-table">
    <thead>
      <tr>
        
        <th scope="col">Titolo Articolo</th>
        <th scope="col">Descrizione</th>    
        <th scope="col">Categoria</th>
        <th scope="col">Dettaglio</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)           
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->description}}</td>
            <td>{{$article->category->name}}</td>
            <td><a href="{{route('revisor.article.detail', compact('article'))}}" class="btn btn-success">Dettaglio</a></td>
        </tr>
        @endforeach
        
    </tbody>
  </table>

  