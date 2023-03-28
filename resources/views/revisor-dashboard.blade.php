<x-layout title="Dashboard Revisore">
    <div class="container altezza-container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6 text-center">
                <h1>Benvenuto Revisore</h1>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-12 col-md-6 text-center">
                <h2>Articoli da pubblicare</h2>
            </div>
        </div>
    
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-md-6 ">
                <x-dashboard-table-revisor :articles="$articles"/>
            </div>
        </div>
    </div>
</x-layout>
    