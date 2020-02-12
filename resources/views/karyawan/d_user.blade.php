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
<div class="col-md-7">
<div class="panel">
<div class="panel-heading"></div>
<div class="panel-body">
 <table class="table ">
  <thead>
    <tr><td colspan="4">
      <h4><center><b>DATA USER</b></center></h4>
        </td>

        <td>
         <form class="left" method="GET" action="/user">
         <div class="input-group">
         <input name="cari" type="search"  value="" class="form-control" placeholder="Cari Nama Karyawan..." aria-label="Search">
          <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
         </div>
         </form>
        </td></tr>
        <tr>
        <td><b><center>NO</center></b></td>
        <td><b><center>NAMA </center></b></td>
        <td><b><center>ROLE</center></b></td>
        <td><b><center>EMAIL</center></b></td>
        <td><b><center>PASSWORD</center></b></td>


        </tr>
  </thead>
  <tbody>
   @foreach($data_user as $user)
        <tr>
        <td><center>{{$no++}}</center></td>
        <td>{{$user->name}} </td>
        <td><center>{{$user->role}}</center></td>
        <td><center>{{$user->email}}</center></td>
        <td><center>{{$user->password1}}</center></td>


        </tr>
   @endforeach
 </tbody>
 </table>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->


@stop
