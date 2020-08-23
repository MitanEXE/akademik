<div class="top-nav">
    <div class="top-nav-box">
        <div class="side-nav-mobile"><i class="fa fa-bars"></i></div>
        <div class="logo-wrapper">
            <div class="logo-box">
                <img alt="pongo" src="{{ asset('images/sph.png')}}">
                <a href="{{ route('home') }}">
                    <div class="logo-title">Academic</div>
                </a>
            </div>
        </div>
        <div class="top-nav-content">
            <div class="top-nav-box">
                <div class="global-search">
                    <form class="form-inline">
                        <button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i></button>
                        <input class="form-control mb-1 mr-sm-1 mb-sm-0" placeholder="Search projects..." type="text">
                    </form>
                </div>
<!--                 <div class="top-notification">
                    <div class="notification-icon">
                        <i class="fa fa-envelope-open"></i>
                    </div>
                    <div class="notification-icon">
                        <div class="notification-badge bounceInDown animated timer" data-from="0" data-to="21">21</div>
                        <i class="fa fa-comments"></i>
                        <div class="notification-wrapper animated bounceInUp">
                            <div class="notification-header">Notifications <span class="notification-count">3</span>
                            </div>
                            <div class="notification-body">
                                <a class="notification-list" href="">
                                    <div class="notification-image">
                                        <img alt="pongo" src="{{ asset('images/asparagus.jpg')}}">
                                    </div>
                                    <div class="notification-content">
                                        <div class="notification-text"><strong>Mark</strong> sent you a message</div>
                                        <div class="notification-time">1 minutes ago</div>
                                    </div>
                                </a>
                               
                            </div>
                            <div class="notification-footer">
                                <a href="">See all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="notification-icon">
                        <div class="notification-badge bounceInDown animated timer" data-from="0" data-to="3">3</div>
                        <i class="fa fa-bell"></i>
                        <div class="notification-wrapper animated bounceInUp">
                            <div class="notification-header">Notifications <span class="notification-count">3</span>
                            </div>
                            <div class="notification-body">
                                <a class="notification-list" href="">
                                    <div class="notification-image">
                                        <img alt="pongo" src="{{ asset('images/asparagus.jpg')}}">
                                    </div>
                                    <div class="notification-content">
                                        <div class="notification-text"><strong>Mark</strong> sent you a email</div>
                                        <div class="notification-time">1 minutes ago</div>
                                    </div>
                                </a>
                               ]
                            </div>
                            <div class="notification-footer">
                                <a href="">See all notifications</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="user-top-profile">
                    <div class="user-image">
                        <div class="user-on"></div>
                      @if(Auth::user()->picture)
                                    <img src="{!! url('/').'/uploads/users/'.Auth::user()->picture !!}" alt="img"
                                         class="img-circle img-bor"/>
                                @else
                                    <img src="{!! asset('assets/img/authors/avatar3.jpg') !!}"
                                         class="img-responsive img-circle" alt="User Image">
                                @endif
                    </div>
                    <div class="clear">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <ul class="user-top-menu animated bounceInUp">
                            <li {!! ((Request::is('home/users/')) && !(Request::is('home/users/create')) ? 'class="active" id="active"' : '') !!}>
                            <li><a href="">Profile <div class="badge badge-yellow pull-right">2</div></a></li>
                            <li><a href="">Settings</a></li>
                            <li><a href="">Change Password</a></li>
                            <li><a class="purchase" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-nav-mobile"><i class="fa fa-cog"></i></div>
    </div>
</div>
