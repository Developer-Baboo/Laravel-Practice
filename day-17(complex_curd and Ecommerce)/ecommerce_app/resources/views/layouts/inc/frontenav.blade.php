<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">E-SHOP</a>
        {{-- <button id="mybtn">034224449445</button> --}}
        <div class="search-bar">
            <form action="{{ url('searchproduct') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" name="product_name" id="search_product" required class="form-control"
                        placeholder="Search Products" aria-describedby="basic-addon1">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="fas fa-home"></i> Home <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('category') }}">
                        <i class="fas fa-th"></i> Category
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('cart') }}">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <span class="badge badge-pill bg-primary cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('wishlist') }}">
                        <i class="fas fa-heart"></i> Wishlist
                        <span class="badge badge-pill bg-success wishlist-count">0</span>
                    </a>
                </li>

                @auth
                    @if (auth()->user()->is_verified == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div style="padding-left: 10px; padding-right: 10px;" class="dropdown-menu dropdown-menu-right"
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
                    @endif
                @endauth

                <!-- Check if the user is a guest (not logged in) -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"> <i class="fas fa-user-plus"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<script>
    function trackProductSearch() {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'productSearch',
            'searchTerm': document.getElementById('search_product').value
        });
    }
</script>
