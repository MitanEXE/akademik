@extends('admin/layouts/default')
@extends('layouts.appc')
{{-- Page title --}}
@section('title')
Data Nilai Siswa
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />

    <!--  penambahan show modal -->
    <link href="{{ asset('assets/vendors/modal/css/component.css') }}" rel="stylesheet" />

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
            <!-- Main content -->
            <section class="datagrid-panel">
    <div class="content">
        <div class="panel">
            <div class="content-header no-mg-top">
                <i class="fa fa-newspaper-o"></i>
                <div class="content-header-title">@yield('title')</div>
            </div>
            <!--section ends-->
            
                <!-- row-->
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
<br>
<br>
<br>
                         
                                <table class="table table-striped table-bordered" id="table2">
                                    <thead>
                                    <tr>
                                        <th style="width: 20px;"></th>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--- responsive model -->
                <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <form action="{{ route('tambahnilai') }}" autocomplete="on" method="post" role="form">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Tambah Nilai</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <label>No</label>
                                                    <input readonly="readonly" id="idsiswa" name="idsiswa" type="text" placeholder="No Siswa" class="form-control " value="ID">
                                                </p>
                                                <p>
                                                    <label>Nama Siswa</label>
                                                    <input readonly="readonly" id="namasiswa" name="namasiswa" type="text" placeholder="Nama Siswa" class="form-control disable">
                                                </p>
                                                <p>
                                                    <label>Kode Mata Pelajaran</label>
                                                    <select class="form-control" id="kodemapel" name="kodemapel">
                                                        
                                                    </select>
                                                </p>
                                                <p>
                                                    <label>Nilai </label>
                                                    <input id="name3" name="nilai" type="text" placeholder="Nilai" class="form-control">
                                                </p>
                                                <p>
                                                    <label>Keterangan </label>
                                                    <select id="keterangan" name="keterangan" class="form-control">
                                                        <option value="Ulangan Harian">Ulangan Harian</option>
                                                        <option value="Ujian Semester">Ujian Semester</option>
                                                    </select>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
                <!-- END modal-->

            </section>


            @if (Session::has('message'))
               <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
    @stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/table_lihatnilai.js') }}" ></script>


    <!-- show modal js  -->
    <script src="{{ asset('assets/vendors/modal/js/classie.js') }}" ></script>
    <script src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}" ></script>
@stop
