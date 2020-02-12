<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
  protected $table = 'karyawan';
    protected $fillable = ['nik','nama_depan', 'nama_belakang', 'jenis_kelamin','kantor','jabatan','agama','pendidikan','alamat','gaji','avatar','user_id'];

    public function getAvatar()
    {
      if(!$this->avatar)
      {
        return asset('images/default.png');
      }
      return asset('images/'.$this->avatar);
    }
    public function jabatan()
    {
    	return $this->belongsToMany(Jabatan::class)->withTimeStamps();
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function pendapatan()
    {
      return $this->belongsToMany(Pendapatan::class)->withPivot(['id','periode','nominal','karyawan_id','pendapatan_id'])->withTimeStamps();

    }
    public function tot_pendapatan()
    {
      $total =0;
      $hitung =0;
      foreach ($this->Pendapatan as $pendapatan){
      $total +=$pendapatan->pivot->nominal;
      $hitung++;
    }
    return $total;
    }

    public function potongan()
    {
      return $this->belongsToMany(Potongan::class)->withPivot(['id','periode','nominal','karyawan_id','potongan_id'])->withTimeStamps();

    }
    public function tot_potongan()
    {
      $total_p =0;
      $hitung_p =0;
      foreach ($this->Potongan as $potongan){
      $total_p +=$potongan->pivot->nominal;
      $hitung_p++;
    }
    return $total_p;
    }
    public function no_urut()
    {
      $no=0;
      $no++;
    }
    public function nama_lengkap()
    {
      return $this->nama_depan.' '.$this->nama_belakang;
    }
}
