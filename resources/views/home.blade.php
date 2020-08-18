@extends('layouts.app')

@section('title','Dashboard')
@section('content')
<div class="breadcrumb">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ Route::currentRouteName() }}">@yield('title')</a>
</div>
<div class="top-banner">
    <div class="top-banner-title">Dashboard</div>
    <div class="top-banner-subtitle">Welcome back, Admin, <i class="fa fa-map-marker"></i>&nbsp;Batam</div>
</div>
<div class="content with-top-banner">
    <div class="content-header no-mg-top">
        <i class="fa fa-newspaper-o"></i>
        <div class="content-header-title">Information</div>
    </div>
    <div class="panel">
        <div class="row">
            <div class="col-md-3 card-wrapper">
                <div class="card">
                    <i class="fa fa-user-o"></i>
                    <div class="clear">
                        <div class="card-title">
                            @php
                            $users = DB::table('users')->count();
                            @endphp
                            <span class="timer" data-from="0" data-to="{{$users}}">{{$users}}</span>
                        </div>
                        <div class="card-subtitle">USERS</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 card-wrapper">
                <div class="card">
                    <i class="fa fa-star-o"></i>
                    <div class="clear">
                        <div class="card-title">
                            @php
                            $roles = DB::table('roles')->count();
                            @endphp
                            <span class="timer" data-from="0" data-to="{{ $roles }}">{{ $roles }}</span>
                        </div>
                        <div class="card-subtitle">ROLES</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 card-wrapper">
                <div class="card">
                    <i class="fa fa-map-marker"></i>
                    <div class="clear">
                        <div class="card-title">
                            <span class="timer" data-from="0" data-to="24">24</span>m
                        </div>
                        <div class="card-subtitle">LOCATION</div>
                    </div>
                </div>
                <div class="card-menu">
                    <ul>
                        <li><a href="">Today</a></li>
                        <li><a href="">7 Days</a></li>
                        <li><a href="">14 Days</a></li>
                        <li><a href="">Last Month</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 card-wrapper">
                <div class="card">
                    <i class="fa fa-suitcase"></i>
                    <div class="clear">
                        <div class="card-title">
                            0<span class="timer" data-from="0" data-to="8">08</span>:
                            <span class="timer" data-from="0" data-to="20">20</span>
                        </div>
                        <div class="card-subtitle">MEETING</div>
                    </div>
                </div>
                <div class="card-menu">
                    <ul>
                        <li><a href="">Today</a></li>
                        <li><a href="">7 Days</a></li>
                        <li><a href="">14 Days</a></li>
                        <li><a href="">Last Month</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="row">
            <div class="col-md-8 sm-max">
                <div class="content-header">
                    <i class="fa fa-signal"></i>
                    <div class="content-header-title">Line Chart</div>
                </div>
                <div class="content-box">
                    <div class="content-box-header">
                        <div class="header-menu active">Visitors</div>
                        <div class="header-menu">Comments (134)</div>
                        <select class="select-rounded pull-right">
                            <option>Today</option>
                            <option>7 Days</option>
                            <option>14 Days</option>
                            <option>Last Month</option>
                        </select>
                    </div>
                    <div class="line-chart-wrapper">
                        <div class="line-chart-label">LAST VISITORS</div>
                        <div class="line-chart-value">
                            <span class="timer" data-from="0" data-to="12501">12,501</span>
                        </div>
                        <canvas id="line-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content-header">
                    <i class="fa fa-newspaper-o"></i>
                    <div class="content-header-title">Donut Chart</div>
                </div>
                <div class="content-box">
                    <div class="donut-chart-wrapper">
                        <canvas width="120" height="120" id="donut-chart"></canvas>
                        <div class="donut-chart-label">
                            <div class="donut-chart-value">330</div>
                            <div class="donut-chart-title">Total Visitor</div>
                        </div>
                    </div>
                    <div class="donut-chart-legend">
                        <div class="legend-list">
                            <div class="legend-bullet green"></div>
                            <div class="legend-title">Australia</div>
                        </div>
                        <div class="legend-list">
                            <div class="legend-bullet red"></div>
                            <div class="legend-title">Nigeria</div>
                        </div>
                        <div class="legend-list">
                            <div class="legend-bullet yellow"></div>
                            <div class="legend-title">United States</div>
                        </div>
                        <div class="legend-list">
                            <div class="legend-bullet blue"></div>
                            <div class="legend-title">Japan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
