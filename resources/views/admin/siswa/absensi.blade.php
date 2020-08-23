@extends('admin/layouts/default')

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
                
                            <br>
                            <div class="panel-body">
                                <div>Silakan Pilih Program Keahlian dan Kelas</div>
                                <br>
                                <form role="form" action="{{route ('absenkelas') }}" method="POST">
                                        {{ csrf_field() }} 
                                      <div class="form-group">
                                        <label>Program Keahlian</label>
                                        <select class="form-control" id="ProgramKeahlian" name="ProgramKeahlian" onchange="getkelas();">
                                            <option value="-1"></option>
                                            <option >Rekayasa Perangkat Lunak (RPL)</option>
                                            <option >Accounting (ACC)</option>
                                            <option >Marketing (MKT)</option>
                                            <option >Sekolah Menengah Pertama (SMP)</option>
                                            <option >Sekolah Dasar (SD)</option>
                                          
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" id="listkelas" name="listkelas" >
                                        </select>
                                      </div>
                                    <button type="submit" class="btn btn-primary" role="button">Lanjutkan</button>
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
    <script src="{{ asset('assets/js/absensi.js') }}"></script>

    
@stop