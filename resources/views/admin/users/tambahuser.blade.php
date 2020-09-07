@extends('layouts.app')
@extends('layouts.appc')
{{-- Page title --}}
@section('title')
    Tambah Pengguna
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/css/pages/form2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/form3.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/intl-tel-input/build/css/intlTelInput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>

@stop
@section('content')
    <section class="content-header">
    <ol class="breadcrumb">
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
                            <i class="livicon" data-name="search" data-size="16" data-loop="true" data-c="#fff"
                               data-hc="white"></i>
                        
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>

                    </div>
                    <div class="panel-body">
                        <form method="POST" name="FormTambah" onsubmit="return Validation()" enctype="multipart/form-data"
                              action="{{ route('createuser') }}">
                              {{ csrf_field() }}

</div>
</div>
                            <br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtUsername" class="control-label">Username</label>

                                        <input type="text" name="iusername" id="iusername" class="form-control input-md">
                                    </div>
                                </div>
                            
                           
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">Password</label>

                                        <input type="password" name="ipassword" id="ipassword" class="form-control input-md">
                                    </div>
                                </div>
                           
                           
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtJabatan" class="control-label">Jabatan : </label>
                                      <br>
                                    <select id="ijabatan" name="ijabatan" onchange="getnamasiswa();" class="form-control">
                                            <option value="Guru">Guru</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                        </select>

                                        <label hidden id="labelsiswa" for="txtnamasiswa" class="control-label">Nama Siswa : </label>
                                        <select hidden id="listsiswa" name="listsiswa" >
                                        </select>

                                    </div>

                                
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtStatus" class="control-label">Status Akun : </label>
                                    <br>
                                     
                                        <select id="istatus" name="istatus" class="form-control">
                                            <option value="nonaktif">Non-Aktif</option>
                                            <option value="aktif">Aktif</option>
                                          
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="txtName" class="control-label">Nama</label>

                                        <input type="text" name="inama" id="inama" class="form-control input-md">
                                    </div>
                                </div>
                          
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtEmail" class="control-label">Email</label>
                                    <input type="text" name="iemail" id="iemail" class="form-control input-md"
                                           >
                                </div>
                            </div>
                       


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtTempatLahir" class="control-label">Tempat Lahir</label>
                                    <input type="text" name="itempatlahir" id="itempatlahir" class="form-control input-md"
                                            >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtDate" class="control-label">Tanggal Lahir</label>
                                    <input type="date" name="itanggallahir" id="itanggallahir" class="form-control input-md"
                                            >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtAlamat" class="control-label">Alamat</label>
                                    <input type="text" name="ialamat" id="ialamat"
                                           class="form-control input-md" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtjeniskelamin" class="control-label">Jenis Kelamin</label>
                                    <select id="ijeniskelamin" name="ijeniskelamin" class="form-control">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                          
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtPhone" class="control-label">No HP</label>                             
                                    <input type="text" name="inohp" id="inohp" class="form-control input-md"
                                            >
                                </div>
                            </div>
        
                         <div class="col-md-12 mar-10">
                                <div class="col-xs-12 col-md-12">
                                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Simpan"
                                           class="btn btn-primary btn-block btn-md btn-responsive">
                                </div>
                                <br>
                                <div class="col-xs-12 col-md-12">
                                    <input type="reset" value="Batal"
                                           class="btn btn-success btn-block btn-md btn-responsive">
                                </div>
                            </div>
                        </form>
                    </div>
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
    <script src="{{ asset('assets/js/tambahuser.js') }}" ></script>

    {{-- <script>
         $("#phone").intlTelInput();
     </script>
     --}}
@stop
