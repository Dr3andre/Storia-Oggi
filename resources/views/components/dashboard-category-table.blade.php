<table class="table w-table">
    <thead>
      <tr class="">
        <th scope="col">#</th>
        <th scope="col">Nome Categoria</th>
        <th scope="col">Modifica/Elimina</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)           
        <tr>
            <th class="" scope="row">{{$loop->iteration}}</th>
            <td class="">{{$category->name}}</td>
            <span>
            <td>  
                <form method="POST" action="{{route('admin.category.update', compact('category'))}}">
                    @method('put')
                    @csrf
                    <input type="text" name="category">
                    <div>
                        <button type="submit" class="btn btn-warning mb-2">Modifica</button>
                    </div>
                </form>

                <form method="POST" action="{{route('admin.category.delete', compact('category'))}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </td>
        </span>
            
            
        </tr>
        @endforeach
        
    </tbody>
  </table>