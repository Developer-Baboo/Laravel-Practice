<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: 15px; margin-right: 15px;">
    <a class="navbar-brand" href="#">E-SHOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('category') }}">Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('cart') }}">Cart
                    <span class="badge badge-pill bg-primary cart-count">0</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('wishlist') }}">Wishlist
                    <span class="badge badge-pill bg-success wishlist-count">0</span>
                </a>
            </li>
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div style="padding-left: 10px padding-right: 10px;" class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="{{ url('my_orders') }}">My Orders</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endauth
            <!-- Check if the user is a guest (not logged in) -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
