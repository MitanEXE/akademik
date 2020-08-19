@extends('layouts.app')

{{-- Page title --}}
@section('title')
    Mata Pelajaran
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
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box">
                        <div class="content-box-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-primary" onclick="main_routes('create', '')"><i class="fa fa-pencil"></i> Add New @yield('title')</button>
                                </div>
                                <div class="col-md-6 form-inline justify-content-end">
                                    <select class="form-control mb-1 mr-sm-1 mb-sm-0" id="search-option"></select>
                                    <input class="form-control" id="search" placeholder="Search" type="text">
                                </div>
                            </div>
                        </div>
                        
                           <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="">Kode Mata Pelajaran</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Full Name
                                            : activate to sort column ascending" style="width: 300px;">Nama Mata Pelajaran</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending" style="width: 20px;">Ubah</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Delete
                                            : activate to sort column ascending" style="width: 20px;">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        

                                            @foreach ($mapel as $mapel)
                                                @if ($loop->index % 2 )
                                                    <tr role="row" class="even">
                                                @else 
                                                    <tr role="row" class="odd">
                                                @endif
                                                
                                                <td class="sorting_1">{!! $mapel->kode_mapel !!}</td>
                                                <td>{!! $mapel->nama_mapel !!}</td>
                                                <td>
                                                    <a class="edit" href="javascript:;" style="width: 20px;">Ubah</a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;" style="width: 20px;">Hapus</a>
                                                </td>
                                                </tr>
                                            @endforeach

                                    
                                        </tbody>
                                    </table>
                                    <div id="myselect">
                                    <select >
                                        <option  value=""></option>
                                    </select>
                                </div>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
<section class="form-panel"></section>

            <!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>

<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
  </div>
</div>
<script>
$(function () {
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
});
</script>
@stop
