<x-layout title="Lavora con noi">
    <div class="container altezza-container">
        <div class="row justify-content-center text-center mt-5">
            <div class="col-12 col-md-6">
                <h1>Lavora con noi</h1>
            </div>
        </div>
        
        <div class="row justify-content-center">       
            <div class="col-12 col-md-4">
                <form method="POST" action="{{route('work.with.us.submit')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleTitle" class="form-label">Nome Utente</label>
                        <input type="text" class="form-control @error('userName') is-invalid @enderror" id="exampleTitle" name="userName" value="{{Auth::user() ? Auth::user()->name : ''}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDescription" class="form-label">Email Utente</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleDescription" name="email" value="{{Auth::user() ? Auth::user()->email : ''}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleCategory" class="form-label">Scegli il ruolo</label>
                            <select name="role" id="exampleCategory" class="form-select @error('role') is-invalid @enderror">
                                <option value="">----</option>
                                <option value="admin">Amministratore</option>
                                <option value="revisor">Revisore</option>
                                <option value="writer">Autore</option>                           
                            </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleBody" class="form-label">Scrivi la tua motivazione</label>
                        <textarea name="message" id="exampleBody" class="form-control @error('message') is-invalid @enderror" cols="54" rows="8"></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
    
</x-layout>