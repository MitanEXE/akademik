<!DOCTYPE html>
<html>
<head>
	<title>Data Kelas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		
			<img src="https://student.permataharapanku.sch.id/assets/images/sph.png" width="200px" height="90px" align="center">
		<h5>_____________________________________________________________</h5>
		<h6>Sekolah Permata Harapan</h5>
			<h5>Laporan Data Kelas</h5>
	</center>

 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Kelas</th>
				<th>Kelas</th>
				
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($kelas as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->kode_kelas}}</td>
				<td>{{$p->nama_kelas}}</td>

			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>