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
  <tr><td colspan="6">
  <h4><center><b>DATA POTONGAN</b></center></h4>
  </td>
  <td >
    <form class="center" method="GET" action="/potongan">
    <div class="input-group">
   <input name="cari" type="search"  value="" class="form-control" placeholder="Cari Nama Karyawan..." aria-label="Search">
   <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
   </div>
   </form>
   </td>
   <tr>
     <td><b><center>NO</center></b></td>
     <td><b><center>NIK</center></b></td>
     <td><b><center>NAMA KARYAWAN</center></b></td>
     <td><b><center>JENIS KELAMIN</center></b></td>
     <td><b><center>JABATAN</center></b></td>
     <td><b><center>KANTOR</center></b></td>
     <td><b><center>POTONGAN</center></b></td>
   </tr>
 </thead>
 <tbody>
       @foreach($data_karyawan as $karyawan)
   <tr>
     <td><center>{{$no++}}</center></td>
     <td><center><a href="/karyawan/{{$karyawan->id}}/d_potongan">{{$karyawan->nik}}</a></center></td>
     <td>{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</td>
     <td><center>{{$karyawan->jenis_kelamin}}</center></td>
     <td><center>{{$karyawan->jabatan}}</center></td>
     <td><center>{{$karyawan->kantor}}</center></td>
     <td><center>{{formatRupiah($karyawan->tot_potongan())}}</center></td>
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
