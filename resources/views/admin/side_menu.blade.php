<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <h3 class="menu-title">Admin</h3>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('admin') }}">Dashboard </a>
                </li>
                <li class="active">
                    <a href="{{ url('product') }}">Product </a>
                </li>
                <li class="active">
                    <a href="transaction">Transaction </a>
                </li>
                <li class="active">
                    <a href="{{ url('user') }}">User </a>
                </li>
                <li class="active">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link" href="{{ url('/') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
