@extends('layouts.master')

@section('content')

<div class="main">
<div class="main-content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="panel">
<div class="panel-heading">
	<h3 class="panel-title">Edit Data Karyawan</h3>
</div>
<div class="panel-body">
  @if(session('sukses'))
<div class="alert alert-warning alert-dismissible" role="alert">
  {{session('sukses')}}
</div>
  @endif
  @if(session('sukses'))
<div class="alert alert-warning" role="alert">
 {{session('sukses')}}
</div>
 @endif
<div class="row">
<div class="col-lg-12">
<form action="/karyawan/{{$karyawan->id}}/update" method="POST" enctype="multipart/form-data">
 {{csrf_field()}}
<div class="form-group">
  <label for="exampleInputEmail1">NIK</label>
  <input name="nik" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIK" value="{{$karyawan->nik}}">
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Nama Depan</label>
  <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Depan" value="{{$karyawan->nama_depan}}">
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Nama Belakang</label>
  <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Belakang" value="{{$karyawan->nama_belakang}}">
</div>
<div class="form-group">
  <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
  <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
    <option value="Pria" @if($karyawan->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
    <option value="Wanita" @if($karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
  </select>
</div>
<div class="form-group">
<label for="karyawan">Jabatan</label>
<select name="jabatan" class="form-control" id="jabatan" >
  @foreach($jabatan as $jb)
<option value="{{$jb->nama}}" @if($karyawan->jabatan == $jb->nama) selected @endif>{{$jb->nama}}</option>
  @endforeach
  </select>
</div>
<div class="form-group">
<label for="karyawan">Kantor</label>
<select name="kantor" class="form-control" id="kantor" >
 @foreach($kantor as $kt)
<option value="{{$kt->nama}}" @if($karyawan->kantor == $kt->nama) selected @endif>{{$kt->nama}}</option>
 @endforeach
</select>
</div>
<div class="form-group">
<label for="exampleFormControlSelect1">Pilih Agama</label>
<select name="agama" class="form-control" id="exampleFormControlSelect1">
  <option value="Islam" @if($karyawan->jenis_kelamin == 'Islam') selected @endif>Islam</option>
  <option value="Kristen" @if($karyawan->jenis_kelamin == 'Kristen') selected @endif>Kristen</option>
  <option value="Hindu" @if($karyawan->jenis_kelamin == 'Hindu') selected @endif>Hindu</option>
  <option value="Budha" @if($karyawan->jenis_kelamin == 'Budha') selected @endif>Budha</option>
  <option value="Lainya" @if($karyawan->jenis_kelamin == 'Lainya') selected @endif>Lainya</option>
</select></div>
<div class="form-group">
<label for="exampleFormControlSelect1">Pilih Pendidikan</label>
<select name="pendidikan" class="form-control" id="exampleFormControlSelect1">
  <option value="SLTP">SLTP</option>
  <option value="SLTA">SLTA</option>
  <option value="DIII">DIII</option>
  <option value="SI">SI</option>
  <option value="SII">SII</option>
  <option value="SIII">SIII</option>
</select>
</div>
<div class="form-group">
  <label for="exampleFormControlTextarea1">Alamat</label>
  <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$karyawan->alamat}}</textarea>
</div>
<div class="form-group">
  <label for="exampleFormControlTextarea1">Avatar</label>
  <input type="file" name="avatar" class="form-control">
</div>
<button type="submit" class="btn btn-warning">Update</button>
</form>
</div>
</div>
</div>
</div>

@stop

@section('content1')
      <h1></h1>
      @if(session('sukses'))
      <div class="alert alert-success" role="alert">
       {{session('sukses')}}
       </div>
      @endif
		<div class="row">
      <div class="col-lg-12">

			<form action="/karyawan/{{$karyawan->id}}/update" method="POST">
          {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Depan</label>
    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Depan" value="{{$karyawan->nama_depan}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Belakang</label>
    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Belakang" value="{{$karyawan->nama_belakang}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
      <option value="Pria" @if($karyawan->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
      <option value="Wanita" @if($karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">agama</label>
    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Agama" value="{{$karyawan->agama}}">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$karyawan->alamat}}</textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Avatar</label>
    <input type="file" name="avatar" class="form-control">
  </div>

     <button type="submit" class="btn btn-warning">Update</button>
        </form>
        </div>
		</div>
</div>
@endsection
