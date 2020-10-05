@extends('layouts.app')


@section('title')
    Data Akademik Siswa
    @parent
@stop


@section('header_styles')

    <link href="{{ asset('assets/css/pages/form2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/form3.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/intl-tel-input/build/css/intlTelInput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>

@stop
@section('content')
    <section class="content-header">
 
       <div class="breadcrumb">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ Route::currentRouteName() }}">@yield('title')</a>
</div>
</ol>
</section>
  
    <!--section ends-->
   <section class="datagrid-panel">
    <div class="content">
        <div class="panel">
            <div class="content-header no-mg-top">
                <i class="fa fa-newspaper-o"></i>
                <div class="content-header-title">@yield('title')</div>
                
            </div>
                <br>
        <div class="row">
            <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                           
                        
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>

                    </div>
                    <div class="panel-body">
                        <form method="POST" name="FormTambahSiswa" onsubmit="return Validation()" enctype="multipart/form-data"
                              action="{{ route('tambahsiswa') }}">
                              {{ csrf_field() }}

</div>
</div>
                            <br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtUsername" class="control-label">Tingkat Pendidikan</label>

                                        <input type="text" name="iusername" id="iusername" class="form-control input-md" value="{{$data[2][0]->kode}} " readonly="readonly">
                                    </div>
                                </div>
                            
                           
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">Tanggal Masuk</label>

                                        <input type="text" name="ipassword" id="ipassword" class="form-control input-md" value="{{$data[0][0]->tanggal}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">Tahun Masuk</label>

                                        <input type="text" name="ipassword" id="ipassword" class="form-control input-md" value="{{$data[0][0]->tahun}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">Kelas</label>

                                        <input type="text" name="ipassword" id="ipassword" class="form-control input-md" value="{{$data[2][0]->nama_jurusan}} {{$data[2][0]->kode_kelas}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">Status</label>

                                        <input type="text" name="ipassword" id="ipassword" class="form-control input-md" value="{{$data[1][0]->status}}" readonly="readonly">
                                    </div>
                                </div>
                           <h1>*Keterangan : Anda hanya bisa melihat informasi tanpa bisa mengubah data pada tab Akademik.</h1>
                           
                               
                             

        <!--row ends-->
    </section>
    <!-- content -->

@stop

       
{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/intl-tel-input/js/intlTelInput.min.js') }}"
            type="text/javascript"></script>

    <script src="{{ asset('assets/js/pages/validationTambahUser.js') }}" type="text/javascript"></script>
   

    {{-- 
@stop
