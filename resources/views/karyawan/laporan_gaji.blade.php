@extends('layouts.master')

@section('content')

<div class="main">
<div class="main-content">
<div class="container-fluid">
  @if(session('sukses'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{session('sukses')}}
</div>
  @endif
<div class="row">
<div class="col-md-12">
<div class="panel">
<div class="panel-heading">
</div>
<div class="panel-body">
 <table class="table ">
 <thead>
 <tr><td colspan="7">
  <h4><center><b>LAPORAN GAJI</b></center></h4></td>
  <td><center>
<a href="/gaji/export" class="btn btn-primary">Export</a></center>
  </td>
    <td>
      <form class="left" method="GET" action="/laporan_gaji">
        <div class="input-group">
          <input name="cari" type="search"  value="" class="form-control" placeholder="Cari Nama Karyawan..." aria-label="Search">
          <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
        </div>
      </form>
    </td></tr>
    <tr>
      <td><b><center>NO</center></b></td>
      <td><b><center>NIK</center></b></td>
      <td><b><center>NAMA </center></b></td>
      <td><b><center>GENDER</center></b></td>
      <td><b><center>JABATAN</center></b></td>
      <td><b><center>KANTOR</center></b></td>
      <td><b><center>PENDAPATAN</center></b></td>
      <td><b><center>POTONGAN</center></b></td>
      <td><b><center>GAJI</center></b></td>
    </tr>
  </thead>
<tbody>
        @foreach($data_karyawan as $karyawan)
    <tr>
      <td><center>{{$no++}}</center></td>
      <td>{{$karyawan->nik}}</td>
      <td>{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</td>
      <td><center>{{$karyawan->jenis_kelamin}}</center></td>
      <td><center>{{$karyawan->jabatan}}</center></td>
      <td>{{$karyawan->kantor}}</td>
      <td>{{formatRupiah(($karyawan->tot_pendapatan()))}}</td>
      <td>{{formatRupiah(($karyawan->tot_potongan()))}}</td>
      <td><center>{{formatRupiah(($karyawan->tot_pendapatan()-$karyawan->tot_potongan()))}}</center></td>
    </tr>
        @endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
<div>
</div>
</div>

@stop
