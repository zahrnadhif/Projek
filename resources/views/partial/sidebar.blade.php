<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light text-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading"></div> --}}
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house-laptop fa-lg"></i></div>
                    Dashboard
                </a>
                <hr class="sidebar-divider my-1">
                {{-- <div class="sb-sidenav-menu-heading"></div> --}}
                <a class="nav-link collapsed" href="{{ url('/index') }}" data-bs-toggle="collapse" data-bs-target="#collapseProduction" aria-expanded="false" aria-controls="collapseProduction">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gears fa-lg" href="/prod"></i></div>
                    Data Reject
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProduction" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                </div>

                <hr class="sidebar-divider my-1">
                <a class="nav-link" href="{{ url('/konsultasi') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group fa-lg"></i></div>
                    Konsultasi
                </a>

                <hr class="sidebar-divider my-1">
                <a class="nav-link" href="{{ url('/detail') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group fa-lg"></i></div>
                    Detail
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
