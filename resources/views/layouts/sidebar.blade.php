<div class="wrapper">
    <aside class="side-nav">
        <div class="main-menu">
            <ul>
                <li class="">
                    <a href="">
                        <i class="fa fa-bars"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- Print parent menu -->
                <li class="">
                    <a href="">
                        <i class="fa fa-users">
                            <!-- fa fa-icon --></i>
                        <span>Users</span>
                    </a>
                    <ul>
                        <!-- Print submenu -->
                        <li><a href="">Edit User</a></li>
                        <!-- End of Print submenu -->
                    </ul>
                </li>
            </ul>
        </div>
        <div class="side-banner">
            <div class="banner-content">
                <a class="purchase" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        </div>
    </aside>
