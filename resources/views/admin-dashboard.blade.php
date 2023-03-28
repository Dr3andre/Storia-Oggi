<x-layout title="Admin Dashboard">
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6 text-center">
            <h1>Benvenuto Amministratore</h1>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6 text-center">
            <h2>Richieste Utenti</h2>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6 ">
            <x-dashboard-table :userRequests="$userRequests"/>
        </div>
    </div>

                {{-- categorie --}}

    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6 text-center">
            <h2>Gestisci le Categorie</h2>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6 ">
            @if (session('messageCategory'))
                <div class="alert alert-success">
                    {{ session('messageCategory') }}
                </div>
            @endif
            <x-dashboard-category-table :categories="$categories"/>
        </div>
    </div>
            {{--fine categorie --}}


            {{-- tags --}}
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6 text-center">
            <h2>Gestisci i Tags</h2>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6 ">
            @if (session('messageTag'))
                <div class="alert alert-success">
                    {{ session('messageTag') }}
                </div>
            @endif
            <x-dashboard-tags-table :tags="$tags"/>
        </div>
    </div>
              {{--fine tags --}}


</div>

</x-layout>