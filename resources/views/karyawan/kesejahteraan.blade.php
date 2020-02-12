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
                 <h3 class="panel-title"><b>DATA KESEJAHTERAAN</b></h3>
               </div>
               <div class="panel-body">
                 <table class="table table-bordered">
                   <thead>
                     <tr>
                       <td><b><center>NIK</center></b></td>
                       <td><b><center>NAMA KARYAWAN</center></b></td>
                       <td><b><center>JENIS KELAMIN</center></b></td>
                       <td><b><center>JABATAN</center></b></td>
                       <td><b><center>KANTOR</center></b></td>
                        <td><b><center>BERAS</center></b></td>
                     </tr>
                   </thead>
                   <tbody>
                     @foreach($data_karyawan as $karyawan)
                 <tr>
                   <td><a href="/karyawan/{{$karyawan->id}}/profile">{{$karyawan->nik}}</a></td>
                   <td>{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</td>
                   <td><center>{{$karyawan->jenis_kelamin}}</center></td>
                   <td><center>{{$karyawan->jabatan}}</center></td>
                   <td>{{$karyawan->kantor}}</td>
                   <td>{{$karyawan->gaji}}</td>
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
