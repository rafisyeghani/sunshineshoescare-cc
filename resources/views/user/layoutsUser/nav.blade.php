<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo align-self-center">
            <img src="{{ Vite::asset('/resources/images/Logo-sn.png') }}" class="d-block" style="width: 230px; height: auto;">
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="navbar-nav ms-auto d-flex justify-content-end">
                <ul class="nav navbar-nav d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/shopUser') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/aboutUser') }}">About</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="btn btn-outline-warning rounded-pill fw-normal text-black" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="btn btn-outline-warning rounded-pill fw-normal text-black" href="{{ url('/register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Close Header -->
