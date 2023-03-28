<x-layout title="Create">
    <div class="container altezza-container">
        <div class="row justify-content-center text-center mt-5">
            <div class="col-12 col-md-6">
                <h1>Crea il tuo articolo</h1>
            </div>
        </div>
        
        <div class="row justify-content-center text-center mt-5">  
            <div class="col-12 col-md-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleName" class="form-label">Titolo Articolo</label>
                        <input type="text" class="form-control" id="exampleName" name="title" value="{{old('title')}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDescription" class="form-label">Descrizione Articolo</label>
                        <input type="text" class="form-control" id="exampleDescription" name="description" value="{{old('description')}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleCategory" class="form-label">Categortia Articolo</label>
                        <select name="category" id="exampleCategory">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputImg" class="form-label">Immagine Articolo</label>
                        <input type="file" class="form-control" id="exampleInputImg" name="img">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTag" class="form-label">Inserisci Tags</label>
                        <input type="text" class="form-control" id="exampleInputTag" placeholder="Separa i tags con la virgola" name="tags">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputBody" class="form-label">Corpo Articolo</label>
                        <textarea class="dflex-tel" name="body" id="exampleInputBody" cols="54" rows="10" placeholder="Scrivi il tuo articolo">{{old('body')}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>          
        </div>
    </div>
    
    
    
    
</x-layout>