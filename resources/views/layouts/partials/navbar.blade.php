<div class="sticky-top">
    <div class="top-navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <ul class="list-group list-group-horizontal">
                        <li><i class="fa fa-whatsapp"></i> <a href="https://wa.me/888XXXX888" class="top-nav-link">888XXXX888</a></li>
                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:sales@ecom.com" class="top-nav-link">sales@ecom.com</a></li>
                        <li><i class="fa fa-phone"></i> <a href="tel:999XXXX999" class="top-nav-link">999XXXX999</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-horizontal float-end">
                        <li>Follow Us:</li>
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-youtube"></i></li>
                        <li><i class="fa fa-twitter"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('shop-by-category') }}">Shop by Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown ms-md-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown ms-md-3 my-auto">
                            <a class="nav-btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-sign-in me-1 fs-6"></i> Login / Sign Up
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                @endif
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>
