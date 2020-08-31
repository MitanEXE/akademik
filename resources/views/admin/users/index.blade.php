@extends('layouts.app')

{{-- Page title --}}
@section('title')
    Users List
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
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
                                    <a href="{{ URL::route('tambahuser') }}">
                                    <button class="btn btn-primary"><i class="fa fa-pencil"></i> Add New @yield('title')</button></a>
                                </div>
                                <div class="col-md-6 form-inline justify-content-end">
                                    <select class="form-control mb-1 mr-sm-1 mb-sm-0" id="search-option"></select>
                                    <input class="form-control" id="search" placeholder="Search" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="datagrid">
                                <thead>
                        <tr class="filters">
                            <th>No</th>
                            <th>Name</th>
                            <th>User E-mail</th>
                            <th>Status</th>
                            <th>Job</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                         @php
    $total = 0; 
    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td> @php
        $total++;
        @endphp</td>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>{!! $user->status !!}</td>
                            <td>{!! $user->job !!}</td>
                            <td>
                                <a href="{{ route('goupdateprofile', $user->id) }}">Edit<i class="livicon" data-name="edit"
                                    data-size="18" data-loop="true"
                                    data-c="#428BCA"
                                    data-hc="#428BCA"
                                    title="update user"></i></a>
                                
                              
                                     @if (($iduser != $user->id) && ($user->id != 1))
                                    <a href="{{ route('confirm-deleteuser', $user->id) }}" data-toggle="modal" data-target="#delete_confirm"><font color="red">Delete</font><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i></a>
                                    @endif
                              
                                           
                            </td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                            </table>
                        </div>
    <section class="form-panel"></section>




                        <div class="content-box-footer">
                            <div class="row">
                                <div class="col-md-3 form-inline">
                                    <select class="form-control" id="option"></select>
                                </div>
                                <div class="col-md-3 form-inline" id="info"></div>
                                <div class="col-md-6">
                                    <ul class="pagination pull-right" id="paging"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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