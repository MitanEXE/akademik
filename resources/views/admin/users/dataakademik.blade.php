@extends('layouts.app')


@section('title')
    Orang Tua / Wali
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
                                    <label for="txtUsername" class="control-label">Nama Ayah</label>

                                        <input type="text" name="iusername" id="iusername" class="form-control input-md" value="{{ $datapengguna->nama_ortu_wali }}" readonly="readonly">
                                    </div>
                                </div>
                            
                           
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">Nama Ibu</label>

                                        <input type="text" name="ipassword" id="ipassword" class="form-control input-md" value="{{ $datapengguna->nama_ibu }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">Kode Pos</label>

                                        <input type="text" name="ipassword" id="ipassword" class="form-control input-md" value="{{ $datapengguna->kode_pos }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">Alamat</label>

                                        <input type="text" name="ipassword" id="ipassword" class="form-control input-md" value="{{ $datapengguna->alamat_ortu }}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">No Telepon</label>

                                        <input type="text" name="ipassword" id="ipassword" class="form-control input-md" value="0{{ $datapengguna->no_hp_ortu }}" readonly="readonly">
                                    </div>
                                </div>
                           
                           
                               
                             

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
