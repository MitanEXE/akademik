@extends('admin/layouts/default')
@extends('layouts.appc')

{{-- Page title --}}
@section('title')
    Cek Jadwal
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
                <div class="card-header">
                	<form action="{{ route('Jadwal.store') }}" method="post">
                         @csrf
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
 					<button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Generate @yield('title')</button>
                </form>


 					<div class="card-body">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <td align="center">Sesi</td>
                                <td align="center">Pembelajaran</td>
                                <td align="center">Guru</td>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td align="center">-</td>
                                <td align="center">-</td>
                                <td align="center">-</td>
                            </tr>
                            <tr>
                                <td align="center">-</td>
                                <td align="center">-</td>
                                <td align="center">-</td>
                            </tr>
                        
                        </tbody>
                    </table>
                    <br>
                </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
