<table class="table w-table">
    <thead>
      <tr class="">
        <th scope="col">#</th>
        <th scope="col">Tag</th>
        <th scope="col">Modifica/Elimina</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)           
        <tr>
            <th class="" scope="row">{{$loop->iteration}}</th>
            <td class="">{{$tag->name}}</td>

            <span>
            <td>
                <form method="POST" action="{{route('admin.tags.update', compact('tag'))}}">
                    @method('put')
                    @csrf
                    <input type="text" name="tag">
                    <div>
                        <button type="submit" class="btn btn-warning mb-2">Modifica</button>
                    </div>
                </form>
                       
                <form method="POST" action="{{route('admin.tags.delete', compact('tag'))}}">
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