<x-layout>
    
    <div class="container altezza-container">
        <div class="row justify-content-center text-center mt-h">
            <div class="col-12 col-md-6">
                <h1>Registrati</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center mt-5">
          <div class="col-12 col-md-4">
              @if (session('message'))
              <div class="alert alert-warning text-center">
                  {{ session('message') }}
              </div>
              @endif
          </div>
      </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-4">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleName" class="form-label">Nome Utente</label>
                      <input type="text" class="form-control" id="exampleName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Indirizzo Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                      </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Conferma Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
                      </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                  </form>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
</x-layout>