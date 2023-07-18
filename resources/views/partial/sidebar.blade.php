<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light text-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house-laptop fa-lg"></i></div>
                    Dashboard
                </a>
                <hr class="sidebar-divider my-1">

                <a class="nav-link collapsed" href="/" data-bs-toggle="collapse" data-bs-target="#collapseProduction" aria-expanded="false" aria-controls="collapseProduction">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gears fa-lg" href="/prod"></i></div>
                    Production
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProduction" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ms-3" href="{{ url('/prod/melting') }}">Melting</a>
                        <a class="nav-link ms-3" href="{{ url('/prod/casting') }}">Casting</a>
                        <a class="nav-link ms-3" href="">Machining</a>
                        <a class="nav-link ms-3" href="">Painting</a>
                        <a class="nav-link ms-3" href="">Assembling</a>
                        <a class="nav-link ms-3" href="">Final Inspection</a>
                        <a class="nav-link ms-3" href="{{ url('/prod/shipping') }}">Shipping</a>
                        <a class="nav-link ms-3" href="{{ url('/prod/warehouse') }}">Warehouse</a>
                        <a class="nav-link ms-3" href="{{ url('/prod/quality') }}">Quality</a>
                    </nav>
                </div>
                <hr class="sidebar-divider my-1">
                <a class="nav-link" href="{{ url('/adm/mp') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group fa-lg"></i></div>
                    Man Power
                </a>

                <hr class="sidebar-divider my-1">
                <a class="nav-link collapsed" href="/" data-bs-toggle="collapse" data-bs-target="#collapseAsakai" aria-expanded="false" aria-controls="collapseAsakai">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-person-chalkboard"></i></div>
                    Asakai Point
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAsakai" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ms-3" href="{{ url('/calenderEvent') }}"> Calender Of Event</a>
                        <a class="nav-link ms-3" href="{{ url('/BadNewsFirst') }}"> Bad News First</a>
                    </nav>
                </div>

                <hr class="sidebar-divider my-1">
                <a class="nav-link collapsed" href="/" data-bs-toggle="collapse" data-bs-target="#collapseFG" aria-expanded="false" aria-controls="collapseFG">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-truck-fast fa-lg"></i></div>
                    Create QR
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFG" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ms-3" href="{{ url('/qr/finishgood') }}">Finish Good</a>
                        <a class="nav-link ms-3" href="{{ url('/qr/fromsubcont') }}">From Subcont</a>
                    </nav>
                </div>
                <hr class="sidebar-divider my-1">
                <a class="nav-link" href="{{ url('/sto') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check fa-lg"></i></div>
                    Stock Opname
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small ">Welcome, </div>
            <span class="fw-bold">User</span>
            {{-- <span class="fw-bold">{{ Auth::User()->name }} </span> --}}
            <a class="float-end text-danger" href=""> <i class="fa-solid fa-right-from-bracket fa-lg "></i></a>
        </div>
    </nav>
</div>
