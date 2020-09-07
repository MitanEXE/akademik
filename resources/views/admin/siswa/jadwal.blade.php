@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Penjadwalan kelas {{$data[2][0]->nama_jurusan}} {{$data[2][0]->kode_kelas}}
                </div>

                <div class="card-body">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <td>Sesi</td>
                                <td>Pembelajaran</td>
                                <td>Guru</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($data[0] as $item)
                            <tr>
                                <td>{{$item->sesi}}</td>
                                <td>{{$item->nama_mapel}}</td>
                                <td>{{$data[1][$no++]->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
