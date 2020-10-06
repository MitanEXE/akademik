@extends('layouts.app')
@extends('layouts.appc')

@section('title')
    Kelola Jadwal
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
                            <i class="livicon" data-name="search" data-size="16" data-loop="true" data-c="#fff"
                               data-hc="white"></i>
                        
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>

                    </div>
                    <div class="panel-body">
                        <form method="POST" name="FormTambahJadwal" onsubmit="return Validation()" enctype="multipart/form-data"
                              action="{{ route('editdatamapel') }}">
                              {{ csrf_field() }}

</div>
</div>
                            <br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="txtUsername" class="control-label">Kode Mapel</label>
<input hidden type="text" id="idsiswa" name="id_mapel" value="{{$mapel->id_mapel}}"></input>
                                            <input type="text" name="ikodemapel" id="iusername" class="form-control input-md" value="{{$mapel->kode_mapel}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="txtUsername" class="control-label">Nama Mapel</label>

                                            <input type="text" name="inamamapel" id="iusername" class="form-control input-md" value="{{$mapel->nama_mapel}}">
                                        </div>
                                    </div>
                               <div class="col-md-12">
                                    <div class="form-group">
                             <label for="txtStatus" class="control-label">Pemimbing : </label>
                                    <select id="mapel" name="user" class="form-control">
                                        
                                        @foreach ($listuser as $listuser)
                                            <option value="{{ $listuser->id }}">
                                                {{ $listuser->name }}</option>
                                         @endforeach 
                                     </select>
                                    </div>
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
<script>
         $("#phone").intlTelInput();
     </script>

      <script type="text/javascript">
         function Validation() {


            // get variable from HTML
            var username = document.FormTambahSiswa.iusername;
            var password = document.FormTambahSiswa.ipassword;
            var Name = document.FormTambahSiswa.inama;
            var tempatlahir = document.FormTambahSiswa.itempatlahir;
            var tgllahir = document.FormTambahSiswa.itanggallahir;
            var Email = document.FormTambahSiswa.iemail;
            var Address1 = document.FormTambahSiswa.ialamat;
            var Phone = document.FormTambahSiswa.inohp;


            // validation username

            if (username.value == "") {
                alert("Username Harus diisi");
                username.focus();
                return false;

            }

            // end validation username

            // validation password

            if (password.value == "") {
                alert("Password Harus Diisi");
                password.focus();
                return false;

            }

            // end validation password


            // name validation
            if (Name.value == "") {
                alert("Masukan Nama Anda");
                Name.focus();
                return false;

            }

            if (Name.value != "") {
                var ck_name = /^[A-Za-z ]{3,50}$/;
                if (!ck_name.test(Name.value)) {
                    alert("Nama tidak boleh mengandung angka dan tidak lebih dari 30 karakter");
                    Name.focus();
                    return false;
                }
            }
            // name validation end


            // tempat lahir validation
            if (tempatlahir.value == "") {
                alert("Tempat Lahir harus diisi");
                tempatlahir.focus();
                return false;

            }

            if (tempatlahir.value != "") {
                var ck_tempatlahir = /^[A-Za-z ]{3,50}$/;
                if (!ck_tempatlahir.test(tempatlahir.value)) {
                    alert("Tempat Lahir tidak boleh mengandung angka dan tidak lebih dari 30 karakter");
                    tempatlahir.focus();
                    return false;
                }
            }
            // tempat lahir validation end

            // Tanggal lahir validation
            if (tgllahir.value == "") {
                alert("Isi Tanngal lahir Anda");
                tgllahir.focus();
                return false;

            }

            // Tangagl lahir validation end


            //email validation
            if (Email.value == "") {
                alert("Masukan Email anda, jika tidak mempunyai email inputkan a@a.com");
                Email.focus();
                return false;
            }


            var x = document.forms["FormTambahSiswa"]["iemail"].value;
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                alert("Alamat Email Tidak Valid");
                Email.focus();
                return false;
            }
            //address validation

            if (Address1.value == "") {
                alert("Masukan alamat anda!");
                Address1.focus();
                return false;
            }
            //address validation


            // phone validation
            if (Phone.value != "") {
                var ck_phone = /^[0-9 ]{5,12}$/;
                if (!ck_phone.test(Phone.value)) {
                    alert("Masukan Nomor Handphone Yang benar contoh : 089694201527");
                    Phone.focus();
                    return false;
                }
            }
            //Mobile Validation Completed
            return true;
            }
    </script>
    {{-- <script>
         $("#phone").intlTelInput();
     </script>
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
