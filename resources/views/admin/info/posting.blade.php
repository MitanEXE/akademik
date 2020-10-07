@extends('admin/layouts/default')
@extends('layouts.appc')
{{-- Page title --}}
@section('title')
Absensi
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- page level css -->
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    
@stop

{{-- Page content --}}
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($posts as $row)
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5><a href="{{ url('/post/' . $row->slug) }}" style="text-decoration: none">{{ \Str::limit($row->title, 100) }}</a></h5>
                                        <p>{!! $row->content !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')

        <script src="{{ asset('assets/js/kelasabsen.js') }}" ></script>

@stop