@extends('layouts.master')

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
										<img width="150px" height="180px" src="{{$karyawan->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 sizes="50x50" class="name">{{$karyawan->nama_depan}} {{$karyawan->nama_belakang}}</h3>
										<span class="online-status status-available">{{$karyawan->user->role}}</span>
										<div class="text-center"><a href="/karyawan/{{$karyawan->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
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
								<h4 class="heading">Info Karyawan</h4>
								<!-- AWARDS -->
								<div class="awards">
									<div class="row">
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
                                               <a href="/karyawan/{{$karyawan->id}}/inventaris" >
												<div class="hexagon">

													<span class="lnr lnr-list award-icon"></span>
												</button>
												</div>
												<span>Inventaris</span></a>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<a href="/karyawan/{{$karyawan->id}}/inventaris" >
												<div class="hexagon">

													<span class="lnr lnr-file-add award-icon"></span>

												</div>
												<span> Slip Gaji</span></a>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<a href="/karyawan/{{$karyawan->id}}/inventaris" >
												<div class="hexagon">
													<span class="lnr lnr-calendar-full award-icon"></span>
												</div>
												<span>Absensi</span></a>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<a href="/karyawan/{{$karyawan->id}}/inventaris" >
												<div class="hexagon">
													<span class="lnr lnr-sort-amount-asc award-icon"></span>
												</div>
												<span>Riwayat SP</span></a>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<a href="/karyawan/{{$karyawan->id}}/inventaris" >
												<div class="hexagon">
													<span class="lnr lnr-funnel award-icon"></span>
												</div>
												<span>Tunjangan</span></a>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<a href="/karyawan/{{$karyawan->id}}/inventaris" >
												<div class="hexagon">
													<span class="lnr lnr-paperclip award-icon"></span>
												</div>
												<span>Kelengkapan Berkas</span></a>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<a href="/karyawan/{{$karyawan->id}}/inventaris" >
												<div class="hexagon">
													<span class="lnr lnr-hourglass award-icon"></span>
												</div>
												<span>Riwayat Karir</span></a>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<a href="/karyawan/{{$karyawan->id}}/inventaris" >
												<div class="hexagon">
													<span class="lnr lnr-clock award-icon"></span>
												</div>
												<span>Masa Kerja</span></a>
											</div>
										</div>
									</div>

								</div>
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

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Inventaris</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="panel-body">
                 <table class="table table-bordered">
                   <thead>
                     <tr>
                       <td><b><center>KODE</center></b></td>
                       <td><b><center>NAMA PELAJARAN</center></b></td>
                       <td><b><center>alamat</center></b></td>
                       <td><b><center>NILAI</center></b></td>

                     </tr>
                   </thead>
                   <tbody>

                 <tr>
                   <td><center></center></td>
                   <td></td>
                   <td><center></center></td>
                   <td><center></center></td>
                 </tr>

                   </tbody>
                 </table>
               </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Judul modal</h4>
         </div>

         <div class="modal-body">
            Isi dari modal yang akan ditampilkan, letakkan di sini...

         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary">Aksi</button>
         </div>

      </div>
   </div>
</div>



@stop
