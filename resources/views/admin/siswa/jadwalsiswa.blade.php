@extends('admin/layouts/default')
@extends('layouts.appc')

{{-- Page title --}}
@section('title')
    Jadwal
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
    <meta name="csrf-token" content="{{csrf_token()}}">

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    
       <div class="breadcrumb">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ Route::currentRouteName() }}">@yield('title')</a>
</div>

    </ol>
</section>
            <!-- Main content -->
            <section class="datagrid-panel">
    <div class="content">
        <div class="panel">
            <div class="content-header no-mg-top">
                <i class="fa fa-newspaper-o"></i>
                <div class="content-header-title">@yield('title')</div>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Penjadwalan kelas {{$data[2][0]->nama_jurusan}} {{$data[2][0]->kode_kelas}}
                </div>

                <div class="card-body">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <td>Sesi</td>
                                <td>Pembelajaran</td>
                                <td>Nama Guru</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($data[0] as $item)
                            <tr>
                                <td>{{$item->sesi}}</td>
                                <td>{{$item->nama_mapel}}</td>
                                <td>{{$data[1][$no++]->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
