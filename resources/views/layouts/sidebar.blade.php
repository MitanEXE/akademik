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
                        <li><a href="{{ route('users') }}">List User</a></li>
                        <!-- End of Print submenu -->
                    </ul>
                </li>
                <li class="">
                    <a href="">
                        <i class="fa fa-user">
                            <!-- fa fa-icon --></i>
                        <span>Siswa</span>
                    </a>
                    <ul>
                        <!-- Print submenu -->
                        <li><a href="{{ route('listsiswa') }}">List Siswa</a></li>
                        <!-- End of Print submenu -->
                    </ul>
                </li>
                 <li class="">
                    <a href="">
                        <i class="fa fa-book">
                            <!-- fa fa-icon --></i>
                        <span>Mapel</span>
                    </a>
                    <ul>
                        <!-- Print submenu -->
                        <li><a href="{{ URL::to('akademik/mapel') }}">List Mapel</a></li>
                        <!-- End of Print submenu -->
                    </ul>
                </li>

                 <li class="">
                    <a href="">
                        <i class="fa fa-vcard">
                            <!-- fa fa-icon --></i>
                        <span>Kelas</span>
                    </a>
                    <ul>
                        <!-- Print submenu -->
                        <li><a href="{{ URL::to('akademik/kelas') }}">List Kelas</a></li>
                        <!-- End of Print submenu -->
                    </ul>
                </li>
                <li class="">
                    <a href="">
                        <i class="fa fa-folder">
                            <!-- fa fa-icon --></i>
                        <span>Nilai</span>
                    </a>
                    <ul>
                        <!-- Print submenu -->
                        <li><a href="{{ URL::to('akademik/nilai') }}">List Nilai</a></li>
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
