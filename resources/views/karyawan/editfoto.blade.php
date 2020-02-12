@extends('layouts.master')

@section('content')

<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit Profile</h3>
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
