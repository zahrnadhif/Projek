<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light text-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading"></div> --}}
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house fa-2xl"></i></i></div>
                    Dashboard
                </a>
                @if (Auth::user()->isEngineering())
                    <hr class="sidebar-divider my-1">
                    <a class="nav-link" href="{{ url('/index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines fa-2xl"></i></div>
                        Data Reject
                    </a>

                    <hr class="sidebar-divider my-1">
                    <a class="nav-link" href="{{ url('/gejala') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines fa-2xl"></i></div>
                        Data Gejala
                    </a>
                @elseif(Auth::user()->isForeman())
                    <hr class="sidebar-divider my-1">
                    <a class="nav-link" href="{{ url('/data/konsultasi') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines fa-2xl"></i></div>
                        Data Konsultasi
                    </a>
                @endif


                @if (Auth::user()->isEngineering())
                    <hr class="sidebar-divider my-1">
                    <a class="nav-link" href="{{ url('/aturan') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-link fa-2xl"></i></div>
                        Relasi Reject
                    </a>
                    <hr class="sidebar-divider my-1">
                    <a class="nav-link" href="{{ url('/data/konsultasi') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines fa-2xl"></i></div>
                        Data Riwayat
                    </a>
                @endif
                <hr class="sidebar-divider my-1">
                <a class="nav-link" href="{{ url('/data/perbaikan') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines fa-2xl"></i></div>
                    Data Perbaikan
                </a>
                {{-- <hr class="sidebar-divider my-1">
                <a class="nav-link" href="{{ url('/detail') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group fa-lg"></i></div>
                    Detail
                </a> --}}

                <hr class="sidebar-divider my-1">
                <a class="nav-link" href="{{ url('/logout') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket fa-2xl"></i></div>
                    Logout
                </a>

            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small ">Welcome, </div>
            <span class="fw-bold">User</span> --}}
        {{-- <span class="fw-bold">{{ Auth::User()->name }} </span> --}}
        {{-- <a class="float-end text-danger" href=""> <i class="fa-solid fa-right-from-bracket fa-lg "></i></a>
       </div> --}}
    </nav>
</div>

<script>
    window.addEventListener("DOMContentLoaded", (event) => {
        // Toggle the side navigation
        const sidebarToggle = document.body.querySelector("#sidebarToggle");
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener("click", (event) => {
                event.preventDefault();
                document.body.classList.toggle("sb-sidenav-toggled");
                localStorage.setItem(
                    "sb|sidebar-toggle",
                    document.body.classList.contains("sb-sidenav-toggled")
                );
            });
        }
    });
</script>
