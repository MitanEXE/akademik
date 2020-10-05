@extends('admin/layouts/default')
@extends('layouts.appc')
{{-- Page title --}}
@section('title')
Pilih Kelas Siswa
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">

                <!--section starts-->
             
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Pilih Kelas</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success" id="hidepanel6">
                            <div class="panel-heading">
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
                                <form role="form" action="{{route ('goinputnilaikelas') }}" method="POST">
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

                                    <div class="form-group">
                                        <label>Mata Pelajaran</label>
                                        <select class="form-control" id="mapel" name="mapel" >
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
    <script type="text/javascript">
      function getkelas() {
      var ProgramKeahlian = document.getElementById("ProgramKeahlian").value;
      var pilihan = null;
      switch(ProgramKeahlian) {
        case "Rekayasa Perangkat Lunak (RPL)":
        pilihan = "1";
        break;
        case "Accounting (ACC)" : 
        pilihan = "2";
        break;
        case "Marketing (MKT)" : 
        pilihan = "3";
        break;
        case "Sekolah Menengah Pertama (SMP)" : 
        pilihan = "4";
        break;
        case "Sekolah Dasar (SD)" : 
        pilihan = "5";
        break;
      }

      // clear daftar
      var listkelas = document.getElementById("listkelas");
      while (listkelas.firstChild) {
          listkelas.removeChild(listkelas.firstChild);
      }


      $.ajax({
        url:'../kelas/listkelas/' + pilihan,
        type:'GET',
        dataType: 'json',
        success: function( json ) {
          $.each(json, function(i, value) {
            $('#listkelas')
            .append($('<option selected>' + value["kode_kelas"] + '</option>')
              .attr('value', value["id_kelas"]));
          });
        }
      });

      var mapel = document.getElementById("mapel");
      while (mapel.firstChild) {
          mapel.removeChild(mapel.firstChild);
      }
      
      $.ajax({
        url:'../mapel/listkodemapel/',
        type:'GET',
        dataType: 'json',
        success: function( json ) {
          $.each(json, function(i, value) {
            $('#mapel')
            .append($('<option >' + value["kode_mapel"] + ' - ' + value["nama_mapel"] + '</option>')
              .attr('value', value["kode_mapel"]));
          });
        }
      });
    }
    </script>    
@stop