<nav class="navbar navbar-expand-lg nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('homepage')}}">Storia Oggi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Homepage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link colore  " aria-current="page" href="{{route('work.with.us')}}">Lavora con noi</a>
        </li>
        @guest
        
        <li class="nav-item">
          <a class="nav-link colore " aria-current="page" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link colore " href="{{route('login')}}">Login</a>
        </li>
        
        @else
        @if(Auth::user()->is_writer)
        <li class="nav-item">
          <a class="nav-link colore " href="{{route('article.create')}}">Inserisci Annuncio</a>
        </li>
        @endif
        <li class="nav-item  dropdown">
          <a class="nav-link colore dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">           
            {{Auth::user()->name}}
            @if(Auth::user()->is_admin)
            @if (\App\Models\User::adminRequestsCount() >0 || \App\Models\Article::revisorArticlesCount() >0) 
            <span class="position-relative mx-4">
              <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger py-2">
              </span>
            </span>
           
            @endif
            @endif
          </a>
          
          
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.querySelector('#logout').submit();">Logout</a></li>
            <form action="{{route('logout')}}" method="POST" id="logout">@csrf</form>
            @if(Auth::user()->is_admin)
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('dashboard.admin')}}">Dashboard Amministratore
              @if (\App\Models\User::adminRequestsCount() >0)
                  
             
              <span class="position-relative mx-4">
                <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                  {{\App\Models\User::adminRequestsCount()}}
                  
                </span>
              </span>
              @endif
            </a></li>              
            @endif
            
            @if(Auth::user()->is_revisor)
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('dashboard.revisor')}}">Dashboard Revisore
              @if (\App\Models\Article::revisorArticlesCount() >0)
                  
             
              <span class="position-relative mx-4">
                <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                  {{\App\Models\Article::revisorArticlesCount()}}
                  
                </span>
              </span>
              @endif
            </a></li>
            @endif
                       
          </ul>
        </li>
      </ul>
    </div>
    @endguest
    <form class="d-flex" role="search" action="{{route('search')}}">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success" type="submit">Ricerca</button>        
    </form>
  </div>
</nav>
