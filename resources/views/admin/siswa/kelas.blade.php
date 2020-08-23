@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    Kelas
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
                                    <button id="sample_editable_1_new"  class="btn btn-primary"><i class="fa fa-pencil"></i> Add New @yield('title')</button>
                                </div>
                                <div class="col-md-6 form-inline justify-content-end">
                                    <select class="form-control mb-1 mr-sm-1 mb-sm-0" id="search-option"></select>
                                    <input class="form-control" id="search" placeholder="Search" type="text">
                                </div>
                            </div>
                            <br>
                              <div id="sample_editable_1_wrapper" class="">
                        </div>
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 88px;">ID Kelas</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Full Name
                                            : activate to sort column ascending" style="width: 222px;">Kelas</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending" style="width: 88px;">Ubah</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Delete
                                            : activate to sort column ascending" style="width: 125px;">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        

                                            @foreach ($kelas as $list)
                                                @if ($loop->index % 2 )
                                                    <tr role="row" class="even">
                                                @else 
                                                    <tr role="row" class="odd">
                                                @endif
                                                
                                                <td class="sorting_1">{!! $list->id_kelas !!}</td>
                                                <td>{!! $list->nama_kelas !!}</td>
                                                <td>
                                                    <a class="edit" href="javascript:;">Ubah</a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;">Hapus</a>
                                                </td>
                                                </tr>
                                            @endforeach

                                    
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/table_kelas.js') }}" ></script>
    
@stop
