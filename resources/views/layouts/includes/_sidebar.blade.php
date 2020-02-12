
<div id="sidebar-nav" class="sidebar">
  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 95%;"><div class="sidebar-scroll" style="overflow: hidden; width: auto; height: 95%;">
    <nav>
      <ul class="nav">
        <li><a href="/home" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        @if(auth()->user()->role == 'karyawan')
        <li><a href="/karyawan/{{auth()->user()->id}}/slip" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
        @elseif(auth()->user()->role == 'accounting')
        <li><a href="/karyawan/{{auth()->user()->id}}/slip" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
       <li><a href="/potongan" class="active" ><i class="lnr lnr-shirt"></i> <span>Data Potongan</span></a></li>
       @elseif(auth()->user()->role == 'direktur')
       <li><a href="/laporan_gaji" class="" ><i class="lnr lnr-printer"></i> <span>Laporan Gaji</span></a></li>
         @else(auth()->user()->role == 'hrd')
         <li><a href="/karyawan/{{auth()->user()->id}}/slip" class=""><i class="lnr lnr-license"></i> <span>Slip Gaji</span></a></li>
         <li><a href="/laporan_gaji" class="" ><i class="lnr lnr-printer"></i> <span>Laporan Gaji</span></a></li>
         <li>
        <a href="#subPages" data-toggle="collapse" class="" aria-expanded="true"><i class="lnr lnr-file-empty"></i> <span>Master Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
        <div id="subPages" class="collapse " aria-expanded="true" style="">
        	<ul class="nav">
        <li><a href="/karyawan" class="" ><i class="lnr lnr-users"></i> <span>Data Karyawan</span></a></li>
        <li><a href="/pendapatan" class=""><i class="lnr lnr-plus-circle"></i> <span>Data Pendapatan</span></a></li>
        <li><a href="/potongan" class="" ><i class="lnr lnr-circle-minus"></i> <span>Data Potongan</span></a></li>
        <li><a href="/user" class="" ><i class="lnr lnr-user"></i> <span>Data User</span></a></li>
        <li><a href="/jabatan" class="" ><i class="lnr lnr-mustache"></i> <span>Data Jabatan</span></a></li>
        <li><a href="/kantor" class="" ><i class="lnr lnr-apartment"></i> <span>Data Kantor</span></a></li>
         @endif
      </ul>
    </nav>
  </div>
  <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 572px;"></div>
  			<div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
  		</div>

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="assets/vendor/toastr/toastr.min.js"></script>
  <script src="assets/scripts/klorofil-common.js"></script>

</div>
