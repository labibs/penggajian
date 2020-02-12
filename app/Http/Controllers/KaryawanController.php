<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\KaryawanExport;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
  public function index(Request $request)
     {

       if($request->has('cari')){
         $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
       }else {
         $data_karyawan = \App\Karyawan::all();

       }
         $no = 1;
         $kantor = \App\Kantor::all();
         $jabatan = \App\Jabatan::all();
         $user = \App\User::all();

     	return view('karyawan.index',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan,'user'=>$user,'no'=>$no]);
     }
     public function user(Request $request)
        {

          if($request->has('cari')){
            $data_user = \App\User::where('name','LIKE','%'.$request->cari.'%')->get();
          }else {
            $data_user = \App\User::all();

          }
            $no = 1;
            $kantor = \App\Kantor::all();
            $jabatan = \App\Jabatan::all();
            $user = \App\User::all();

        	return view('karyawan.d_user',['data_user'=>$data_user],['kantor'=>$kantor,'jabatan'=>$jabatan,'user'=>$user,'no'=>$no]);
        }
        public function jabatan(Request $request)
           {

             if($request->has('cari')){
               $data_jabatan = \App\Jabatan::where('nama','LIKE','%'.$request->cari.'%')->get();
             }else {
               $data_jabatan = \App\Jabatan::all();

             }
               $no = 1;

               $kantor = \App\Kantor::all();
               $user = \App\User::all();

           	return view('karyawan.d_jabatan',['data_jabatan'=>$data_jabatan],['kantor'=>$kantor,'no'=>$no]);
           }
           public function kantor(Request $request)
              {

                if($request->has('cari')){
                  $data_kantor = \App\Kantor::where('nama','LIKE','%'.$request->cari.'%')->get();
                }else {
                  $data_kantor = \App\Kantor::all();

                }
                  $no = 1;


                  $user = \App\User::all();

              	return view('karyawan.d_kantor',['data_kantor'=>$data_kantor],['no'=>$no]);
              }
     public function laporan_gaji(Request $request)
        {

          if($request->has('cari')){
            $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
          }else {
            $data_karyawan = \App\Karyawan::all();

          }
            $no = 1;
            $kantor = \App\Kantor::all();
            $jabatan = \App\Jabatan::all();
            $user = \App\User::all();

        	return view('karyawan.laporan_gaji',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan,'user'=>$user,'no'=>$no]);
        }

        public function potongan(Request $request)
           {
             if($request->has('cari')){
               $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
             }else {
               $data_karyawan = \App\Karyawan::all();
             }
               $no = 1;
               $kantor = \App\Kantor::all();
               $jabatan = \App\Jabatan::all();

           	return view('karyawan.potongan',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan,'no'=>$no]);
           }
           public function absensi(Request $request)
              {
                if($request->has('cari')){
                  $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
                }else {
                  $data_karyawan = \App\Karyawan::all();
                }
                  $kantor = \App\Kantor::all();
                  $jabatan = \App\Jabatan::all();

              	return view('karyawan.absensi',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan]);
              }
              public function kesejahteraan(Request $request)
                 {
                   if($request->has('cari')){
                     $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
                   }else {
                     $data_karyawan = \App\Karyawan::all();
                   }
                     $kantor = \App\Kantor::all();
                     $jabatan = \App\Jabatan::all();

                 	return view('karyawan.kesejahteraan',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan]);
                 }
     public function d_inventaris(Request $request )
     {
       $data_karyawan = \App\Karyawan::all();
       $mapel = \App\mapel::all();
        $pivoot = $data_karyawan->mapel()->get();


       //dd($pivoot);
       return view('karyawan.d_inventaris',['data_karyawan'=>$data_karyawan]);

     }
     function rupiah($angka)
     {
       $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	     return $hasil_rupiah;
     }
     public function homes(Request $request)
     {
       $kelamin_p = \App\Karyawan::whereJenisKelamin('Pria')->get();
       $kelamin_w = \App\Karyawan::whereJenisKelamin('Wanita')->get();
       //dd($kelamin_w);
       $data_karyawan = \App\Karyawan::all();

       return view('karyawan.homes',['data_karyawan'=>$data_karyawan],['kelamin_w'=>$kelamin_w,'kelamin_p'=>$kelamin_p]);
     }
     public function create(Request $request)
     {

       //insert ke tabel user
       $user = new \App\User;
       $user->role = $request->role;
       $user->name = $request->nama_depan;
       $user->email = $request->email;
       $user->password = bcrypt($request->password) ;
       $user->password1 =$request->password;
       $user->remember_token = bcrypt(60);
       $user->save();

       //insert ke tabel karyawan
       $request->request->add(['user_id' => $user->id]);
       $karyawan = \App\Karyawan::create($request->all());
       return redirect('/karyawan')->with('sukses','Data Berhasil di input');

     }
     public function create_jabatan(Request $request)
     {

       //insert ke tabel karyawan

       $jabatan = \App\Jabatan::create($request->all());
       return redirect('/jabatan')->with('sukses','Data Berhasil di input');
     }
     public function create_kantor(Request $request)
     {

       //insert ke tabel karyawan

       $kantor = \App\Kantor::create($request->all());
       return redirect('/kantor')->with('sukses','Data Berhasil di input');
     }
     public function delete_kantor($id)
     {
       $kantor = \App\Kantor::find($id);
       $kantor->delete($kantor);

       return redirect('/kantor')->with('sukses','Data Berhasil di Hapus');
     }
     public function delete_jabatan($id)
     {
       $jabatan = \App\Jabatan::find($id);
       $jabatan->delete($jabatan);

       return redirect('/jabatan')->with('sukses','Data Berhasil di Hapus');
     }
     public function edit($id)
     {
         $karyawan = \App\Karyawan::find($id);
         $kantor = \App\Kantor::all();
         $jabatan = \App\Jabatan::all();
         return view('karyawan/edit',['karyawan' =>$karyawan],['jabatan'=>$jabatan,'kantor'=>$kantor]);
     }
     public function editfoto($id)
     {
         $karyawan = \App\Karyawan::find($id);
         $kantor = \App\Kantor::all();
         $jabatan = \App\Jabatan::all();
         return view('karyawan/editfoto',['karyawan' =>$karyawan],['jabatan'=>$jabatan,'kantor'=>$kantor]);
     }
     public function update(Request $request,$id)
     {
       //dd($request->all());

       $karyawan = \App\Karyawan::find($id);

       $karyawan->update($request->all());
       if($request->hasFile('avatar')){
         $imag = $request->file('avatar');
         $namafile = 'foto-'. time().'.'. $imag->getClientOriginalExtension();
         $request->file('avatar')->move('images/',$namafile);
         $karyawan->avatar = $namafile;
         $karyawan->save();
       }
       $jabatan = \App\Jabatan::find($id);
       $kantor = \App\kantor::find($id);
       $user = \App\User::find($id);
       $user->name = $request->nama_depan;
       $user->save();

       return redirect('/karyawan')->with('sukses','Data Berhasil di Update');

     }
     public function delete($id)
     {
       $karyawan = \App\Karyawan::find($id);
       $karyawan->delete($karyawan);
       $karyawan = \App\User::find($id);
       $karyawan->delete($karyawan);
       return redirect('/karyawan')->with('sukses','Data Berhasil di Hapus');
     }

     public function profile($id)
     {
       $karyawan = \App\Karyawan::find($id);
       return view('karyawan.profile',['karyawan' =>$karyawan]);
     }
     public function slip($id)
     {
       $karyawan = \App\Karyawan::find($id);
       return view('karyawan.slip',['karyawan' =>$karyawan]);
     }
     public function pendapatan(Request $request)
        {
          if($request->has('cari')){
            $data_karyawan = \App\Karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
          }else {
            $data_karyawan = \App\Karyawan::all();

          }
            $no = 1;
            $kantor = \App\Kantor::all();
            $jabatan = \App\Jabatan::all();
            $pendapatan = \App\Pendapatan::all();


          //dd($karyawan);
        	return view('karyawan.Pendapatan',['data_karyawan'=>$data_karyawan],['kantor'=>$kantor,'jabatan'=>$jabatan,'pendapatan'=>$pendapatan,'no'=>$no]);
        }
     public function d_pendapatan(Request $request, $id)

     {

      $pendapatan1 = \App\Karyawan_pendapatan::whereBetween('periode',['2020-01-01','2020-01-30'])->get();
       $karyawan = \App\Karyawan::find($id);
       $tunjang = \App\Pendapatan::all();
       return view('karyawan.d_pendapatan',['karyawan' =>$karyawan ,'tunjang'=>$tunjang, 'pendapatan1'=>$pendapatan1]);

   }
     public function t_pendapatan(Request $request, $idkaryawan)
     {

       $karyawan = \App\Karyawan::find($idkaryawan);

       if($karyawan->pendapatan()->where('pendapatan_id', $request->pendapatan)->exists())
       {
         return redirect('karyawan/'.$idkaryawan.'/d_pendapatan')->with('eror','Data Pendapatan Sudah ada');
       }
       $karyawan->Pendapatan()->attach($request->pendapatan,['tunjangan'=>$request->tunjangan,'nominal'=>$request->nominal,'periode'=>$request->periode]);
       return redirect('karyawan/'.$idkaryawan.'/d_pendapatan')->with('sukses','Data Berhasil di masukan');


     }
     public function deletetunjangan($idkaryawan, $idpendaptan)
     {
       $karyawan = \App\Karyawan::find($idkaryawan);
       $karyawan->Pendapatan()->detach($idpendaptan);

       return redirect()->back()->with('sukses','Data Berhasil Di hapus');

     }
     public function d_potongan($id)
     {

       $karyawan = \App\Karyawan::find($id);

       //$nama = $karyawan->whereBetween('created_at',['2019-11-05','2019-11-05'])->get();
//$hasil = Materi::with('pendapatan')->where('id',1)->get();
       //$periodes = $karyawan->pendapatan()->where('pendapatan_id',2)->get();
       //dd($nama );
       $kurang = \App\Potongan::all();



       return view('karyawan.d_potongan',['karyawan' =>$karyawan ,'kurang'=>$kurang]);
     }
     public function t_potongan(Request $request, $idkaryawan)
     {

       $karyawan = \App\Karyawan::find($idkaryawan);

       $karyawan->Potongan()->attach($request->potongan,['nominal'=>$request->nominal,'periode'=>$request->periode]);
       return redirect('karyawan/'.$idkaryawan.'/d_potongan')->with('sukses','Data Berhasil di masukan');

       //if($request->has('awal', 'ahir'))
       //{
         //$karyawan->pendapatan()->pivot()->whereBetween('periode',[$request->awal,$request->ahir])->get();
       //}else
       //{
         //$karyawan = \App\Karyawan::find($idkaryawan);
       //}
     }
     public function deletepengeluaran($idkaryawan, $idpotongan)
     {
       $karyawan = \App\Karyawan::find($idkaryawan);
       $karyawan->Potongan()->detach($idpotongan);

       return redirect()->back()->with('sukses','Data Berhasil Di hapus');

     }
     public function export()
    {
        return Excel::download(new KaryawanExport, 'Karyawan.xlsx');
    }
    public function rentang()
   {
     $pendapatan1 = \App\Karyawan_pendapatan::whereBetween('periode',['2020-01-01','2020-01-30'])->get();
     dd($pendapatan1);

   }



}
