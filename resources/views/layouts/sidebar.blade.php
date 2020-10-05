<div class="wrapper">
    <aside class="side-nav">
        <div class="main-menu">
            <ul>
                <li class="">
                    <a href="{{ route('home') }}">
                        <i class="fa fa-bars"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- Print parent menu -->
                <li class="">
                    <a href="#">
                        <i class="fa fa-users">
                            <!-- fa fa-icon --></i>
                        <span>Data Pengguna</span>
                    </a>
                    <ul>
                        <!-- <li {!! (Request::is('home/users') || Request::is('home/users/create') || Request::is('home/users/*') || Request::is('home/deleted_users') ? 'class="active"' : '') !!}> -->
                        <!-- Print submenu -->
                       
                          <li><a href="{{ route('users.show2',Auth::user()->id)}}">Profile Saya</a></li>
                          @if (Auth::user()->job =="Admin" && "Guru")
                        <li><a href="{{ route('users') }}">List User</a></li>
                        
                      @endif
                        <!-- End of Print submenu -->
                    </ul>
                </li>
                @if (Auth::user()->job =="Admin" && "Guru")
                <li class="">
                    <a href="#">
                        <i class="fa fa-vcard">
                            <!-- fa fa-icon --></i>
                        <span>Data Siswa</span>
                    </a>
                    <ul>
                        <!-- Print submenu -->
                        
                        <li><a href="{{ route('listsiswa') }}">Daftar Siswa</a></li>
                        <li><a href="{{ URL::to('akademik/kelas') }}">Daftar Kelas</a></li>
                        
                    
                        
                        <!-- End of Print submenu -->
                    </ul>
                </li>
                @endif
                @if (Auth::user()->job =="Admin" && "Guru")
                 <li class="">
                    <a href="#">
                        <i class="fa fa-folder">
                            <!-- fa fa-icon --></i>
                        <span>Data Nilai</span>
                    </a>

                    <ul><li><a href="{{ URL::to('akademik/absen') }}">Absensi</a></li>
                        <!-- Print submenu -->
                        <li><a href="{{ URL::to('akademik/mapel') }}">Mata Pelajaran</a></li>
                        <li><a href="{{ URL::to('akademik/nilai') }}">Nilai Siswa</a></li>
                    <li><a href="{{ route('tambahnilaikelas') }}">All Nilai</a></li>
                  

                        <!-- End of Print submenu -->
                    </ul>
                </li>
                @endif
                 @if (Auth::user()->job =="Admin" && "Guru")
                 <li class="">
                    <a href="#">
                        <i class="fa fa-database">
                            <!-- fa fa-icon --></i>
                        <span>Data Akademik</span>
                    </a>

                    <ul>
                         <li><a href="{{ URL::to('akademik/blok') }}">Blok</a></li>
                        <li><a href="{{ URL::to('akademik/sesi') }}">Sesi</a></li>
                        <!-- Print submenu -->
                        <li><a href="{{ URL::to('akademik/semester') }}">Semester</a></li>
                        <li><a href="{{ URL::to('akademik/tahunajaran') }}">Tahun Ajaran</a></li>
                        <li><a href="{{ URL::to('akademik/jurusan') }}">Jurusan</a></li>
                       
                  

                        <!-- End of Print submenu -->
                    </ul>
                </li>
                @endif
            
                @if (Auth::user()->job =="Siswa" && "Orang Tua")
                 <li class="">
                    <a href="">
                        <i class="fa fa-folder">
                            <!-- fa fa-icon --></i>
                        <span>Data Nilai</span>
                    </a>

                    <ul><li {!! (Request::is('home/nilai') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ route('lihatnilaisiswa') }}">
                    Lihat Nilai
                </a>
            </li>
                  @endif
            @if (Auth::user()->job =="Admin" && "Siswa")
                 <li class="">
                    <a href="">
                        <i class="fa fa-rocket">
                            <!-- fa fa-icon --></i>
                        <span>Jadwal</span>
                    </a>

                    <ul><li {!! (Request::is('home/nilai') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ route('jadwal') }}">
                    Lihat jadwal
                </a>
                <a href="{{ URL::to('akademik/jurusan/add') }}">
                    Tambah Jadwal
                </a>
            </li>
                  @endif

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
