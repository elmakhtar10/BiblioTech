<!-- Fixed navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('reservation')}}">BiblioTech</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                @if(Auth::user()->profile_id == 2)
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('authors') ? 'active' : ''}}" aria-current="page" href="{{route('authors')}}">Auteurs</a>
                    </li>
                @endif

                @if(Auth::user()->profile_id == 2)
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('books.home') ? 'active' : ''}}" href="{{route('books.home')}}">Livres</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('reservation') ? 'active' : ''}}" href="{{route('reservation')}}">Reservation</a>
                </li>
                @if(Auth::user()->profile_id == 2)
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('subscribers') ? 'active' : ''}}" href="{{route('subscribers')}}">Abonnees</a>
                </li>
                @endif
                @if(Auth::user()->profile_id == 2)
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('historiques') ? 'active' : ''}}" href="{{route('historiques')}}">Historiques</a>
                </li>
                @endif
                @if(Auth::user()->profile_id == 2)
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('statistiques') ? 'active' : ''}}" href="{{route('statistiques')}}">Statistiques</a>
                </li>
                @endif


            </ul>

            <a href="{{ route('profile.picture') }}">
                @if(Auth::user() && Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                         alt="Photo de l'utilisateur"
                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; cursor: pointer;"
                         class="profile-pic">
                @else
                    <img src="{{ asset('storage/users/default.jpg') }}"
                         alt="Image par défaut"
                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; cursor: pointer;"
                         class="profile-pic">
                @endif
            </a>

            <form class="d-flex" method="post" action="{{route('logout')}}">
                @csrf
                <button type="submit" class="btn btn-danger">Deconnexion</button>
            </form>
        </div>
    </div>
</nav>
