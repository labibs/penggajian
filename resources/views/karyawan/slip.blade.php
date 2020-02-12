@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

@stop
@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container-fluid">
<div class="panel panel-profile">
<div class="clearfix">
<!-- LEFT COLUMN -->
<div class="profile-left">
<!-- PROFILE HEADER -->
<div class="profile-header">
<div class="overlay"></div>
<div class="profile-main">
	<h1 class="heading"><b><center>PAY SLIP</center></b></h1>
	<h3 class="heading"><b><center>PT. KALISHA UTAMA GHANI</center></b></h3>
	<img width="210px" height="200px" src="{{$karyawan->getAvatar()}}" class="img-circle" alt="Avatar">
	<h3 sizes="50x50" class="name">{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</h3>
	<span class="online-status status-available">{{$karyawan->nik}}</span>
</div>
<div class="profile-stat">
<div class="row">
<div class="col-md-3 stat-item"><center>
	Gender </center><span><center>{{$karyawan->jenis_kelamin}}</center></span>
</div>
<div class="col-md-6 stat-item">
	Jabatan <span>{{$karyawan->jabatan}}</span>
</div>
<div class="col-md-3 stat-item">
	Kantor <span>{{$karyawan->kantor}}</span>
</div>
</div>
</div>
</div>
<!-- END PROFILE HEADER -->
<!-- PROFILE DETAIL -->
<div class="profile-detail">
<div class="profile-info">
</div>
</div>
<!-- END PROFILE DETAIL -->
</div>
<!-- END LEFT COLUMN -->
<!-- RIGHT COLUMN -->
<div class="profile-right">
	<h4 class="heading"><b><center>DETAIL GAJI</center></b></h4>
  	<table class="table  ">
			<thead>
				<tr>
					<td><b>PENDAPATAN</b></td>
					<td align="right"><b>NOMINAL</b></td>
				</tr>
			</thead>
		<tbody>
				@foreach($karyawan->pendapatan as $pendapatan)
				<tr>
					<td>{{$pendapatan->tunjangan}}</td>
					<td align="right">{{formatRupiah($pendapatan->pivot->nominal)}}</td>
				</tr>
				@endforeach
				<tr>
					<td ><b><center>TOTAL PENDAPATAN</center></b></td>
					<td align="right"><b>{{formatRupiah($karyawan->tot_pendapatan())}}</b></td>
				</tr>
		</tbody>
  </table>
	<table class="table ">
		<thead>
			<tr>
			 <td><b>POTONGAN</b></td>
			 <td align="right"><b>TANGGAL</b></td>
			 <td align="right"><b>NOMINAL</b></td>
		</tr>
		</thead>
	<tbody>
		@foreach($karyawan->potongan as $potongan)
		<tr>
		 <td>{{$potongan->pengurangan}}</td>
		 <td align="right">{{$potongan->pivot->periode}}</td>
		 <td align="right">{{formatRupiah($potongan->pivot->nominal)}}</td>
		</tr>
		 @endforeach
		 <tr>
		  <td colspan="2"><b><center>TOTAL POTONGAN</center></b></td>
		  <td align="right"><b>{{formatRupiah($karyawan->tot_potongan())}}</b></td>
		</tr>
			</tbody>
		</table>
		<table class="table table-bordered ">
 			<thead>
 				<tr>
 					<td><center><b>GAJI BERSIH</b></center></td>
 					<td><center><b>{{formatRupiah(($karyawan->tot_pendapatan()-$karyawan->tot_potongan()))}}</b></center></td>
 				</tr>
 			</thead>
<!-- END AWARDS -->
<!-- TABBED CONTENT -->
<!-- END TABBED CONTENT -->
</div>
<!-- END RIGHT COLUMN -->
</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>

@stop
@section('footer')

<script src="bootstrap-editable/js/bootstrap-editable.js"></script>
<script >
$(document).ready(function() {
        $('.nominal').editable({
            mode: 'inline',
        });
});
          </script>



@stop
