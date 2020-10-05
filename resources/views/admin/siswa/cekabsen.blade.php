@extends('admin/layouts/default')
@extends('layouts.appc')

{{-- Page title --}}
@section('title')
    Absen
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
            

                <div class="card-body">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <center>
                            <tr>
                                <td >No</td>
                                <td>Nama</td>
                                <td>Kelas</td>
                                <td>Keterangan</td>
                                <td>Tanggal Absensi</td>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($siswa as $item)
                            <tr>
                                <td >{{$no++}}</td>
                                <td >{{$item->name}}</td>
                                <td >{{$item->nama_jurusan}}-{{$item->kode_kelas}}</td>
                                <td>{{$item->ket_absensi}}</td>
                                <td>{{$item->tgl_absensi}}</td>
                              
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
