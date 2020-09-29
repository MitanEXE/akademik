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
                            @php
                            $kelas = DB::table('kelas')->count();
                            @endphp
                            <span class="timer" data-from="0" data-to="{{ $kelas }}">{{ $kelas }}</span>
                        </div>
                        <div class="card-subtitle">CLASS</div>
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
                            <span class="timer" data-from="0" data-to="{{ date('h') }}"></span>:
                            <span class="timer" data-from="0" data-to="{{ date('i') }}"></span>
                        </div>
                        <div class="card-subtitle">CLOCK</div>
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
            <div class="col-md-4">
                <div class="content-header">
                    <i class="fa fa-newspaper-o"></i>
                    <div class="content-header-title">Donut Chart</div>
                </div>
                @php
                $a = DB::select("select count(gender) as gender from users where gender = 'laki-laki'", [1]);
                $b = DB::select("select count(gender) as gender from users where gender = 'perempuan'", [1]);
                @endphp
                <div class="content-box">
                    <div class="donut-chart-wrapper">
                        <canvas width="120" height="120" id="myChart"></canvas>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    labels: ['Laki-laki','Perempuan'],
                                    datasets: [{
                                        label: '# of Votes',
                                        data: [<?= $a[0]->gender;?>,<?= $b[0]->gender;?>],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 0
                                    }]
                                },
                            });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
