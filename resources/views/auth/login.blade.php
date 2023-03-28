<x-layout>
    
    <div class="container altezza-container">
        <div class="row justify-content-center text-center mt-h">
            <div class="col-12 col-md-6">
                <h1>Login</h1>
            </div>
        </div>
        
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-4">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Indirizzo Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Accedi</button>
                </form>
            </div>
        </div>
    </div>   
</x-layout>