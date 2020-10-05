@extends('layouts.app')


@section('title')
    Tambah Jadwal
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
                        <form method="POST" name="FormTambahJadwal" onsubmit="return Validation()" enctype="multipart/form-data"
                              action="{{ route('tambahjadwal') }}">
                              {{ csrf_field() }}

</div>
</div>
                            <br>
                                
                               <div class="col-md-12">
                                    <div class="form-group">
                             <label for="txtStatus" class="control-label">Mapel : </label>
                                    <select id="mapel" name="mapel" class="form-control">
                                        
                                        @foreach ($listmapel as $listmapel)
                                            <option value="{{ $listmapel->id_mapel }}">{{ $listmapel->nama_mapel }}</option>
                                         @endforeach 
                                     </select>
                                    </div>
                                </div>
                            

                            <div class="col-md-12">
                                    <div class="form-group">
                             <label for="txtStatus" class="control-label">Sesi : </label>
                                    <select id="sesi" name="sesi" class="form-control">
                                        
                                        @foreach ($listsesi as $listsesi)
                                            <option value="{{ $listsesi->id_sesi }}">{{ $listsesi->sesi }}</option>
                                         @endforeach 
                                     </select>
                                    </div>
                                </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                             <label for="txtStatus" class="control-label">Semester : </label>
                                    <select id="semester" name="semester" class="form-control">
                                        
                                        @foreach ($listsemester as $listsemester)
                                            <option value="{{ $listsemester->id_semester }}">{{ $listsemester->semester }}</option>
                                         @endforeach 
                                     </select>
                                    </div>
                                </div>
                            

                            <div class="col-md-12">
                                    <div class="form-group">
                             <label for="txtStatus" class="control-label">Tahun Ajaran : </label>
                                    <select id="tahunajaran" name="tahunajaran" class="form-control">
                                        
                                        @foreach ($listtahunajaran as $listtahunajaran)
                                            <option value="{{ $listtahunajaran->id_tahun }}">{{ $listtahunajaran->tahun_ajaran }}</option>
                                         @endforeach 
                                     </select>
                                    </div>
                                </div>
                    
                        <div class="col-md-12">
                                    <div class="form-group">
                             <label for="txtStatus" class="control-label">Blok : </label>
                                    <select id="blok" name="blok" class="form-control">
                                        
                                        @foreach ($listblok as $listblok)
                                            <option value="{{ $listblok->id_blok }}">{{ $listblok->blok }}</option>
                                         @endforeach 
                                     </select>
                                    </div>
                                </div>
                            

                            <div class="col-md-12">
                                    <div class="form-group">
                             <label for="txtStatus" class="control-label">Kelas : </label>
                                    <select id="kelas" name="kelas" class="form-control">
                                        
                                        @foreach ($listkelas as $listkelas)
                                        <option value="{{ $listkelas->id_kelas }}">{{ $listkelas->kode_kelas }}</option>
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
     --}}
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
    <script src="{{ asset('assets/js/tambahuser.js') }}" ></script>

    {{-- 
@stop
