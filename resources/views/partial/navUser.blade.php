<nav class="navbar navbar-expand-lg navbar-light bg-light pb-2 shadow">
    <a class="navbar-brand mb-2" href="#">
        <img src="{{ url('/img/nusametal.png') }}" width="200" height="45">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto ">
            <li class="nav-item active">
                <a class="nav-link  ms-2" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link  ms-2" href="{{ url('/riwayat') }}">Riwayat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  ms-2" href="{{ url('/dataRelasi') }}">Data</a>
            </li>
            {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="{{ url('/index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Data Reject
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"href="{{ url('/gejala/gejala') }}">Data Gejala</a>
            <a class="dropdown-item" href="#">Data Alternatif Reject</a>
          </div>
        </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link  ms-2" href="{{ url('/formKonsultasi') }}">Konsultasi</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link  ms-2" href="{{ url('/login') }}">Login</a>
            </li>
        </ul>

    </div>
</nav>
