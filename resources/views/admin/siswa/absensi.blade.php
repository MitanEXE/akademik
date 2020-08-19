@extends('layouts.app')

{{-- Page title --}}
@section('title')
    Absensi
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <ol class="breadcrumb">
       <div class="breadcrumb">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ Route::currentRouteName() }}">@yield('title')</a>
</div>

    </ol>
</section>
          <section class="datagrid-panel">
    <div class="content">
        <div class="panel">
            <div class="content-header no-mg-top">
                <i class="fa fa-newspaper-o"></i>
                <div class="content-header-title">@yield('title')</div>
            </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success" id="hidepanel6">
                           <div class="row">
                <div class="col-md-12">
                    <div class="content-box">
                        <div class="content-box-header">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="share" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div>Silakan Pilih Program Keahlian dan Kelas</div>
                                <form role="form" action="{{route ('absenkelas') }}" method="POST">
                                        {{ csrf_field() }} 
                                    <div class="form-group">
                                        <label>Program Keahlian</label>
                                        <select class="form-control" id="ProgramKeahlian" name="ProgramKeahlian" onchange="getkelas();">
                                            <option value="-1"></option>
                                            <option >Rekaya Perangkat Lunak (RPL)</option>
                                            <option >Marketing (MKT)</option>
                                            <option >Akuntansi (AK)</option>
                                    
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" id="listkelas" name="listkelas" >
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-responsive btn-default" role="button">Lanjutkan</button>
                                    <button type="reset" class="btn btn-responsive btn-default">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
    <script src="{{ asset('assets/js/absensi.js') }}" ></script>

    
@stop