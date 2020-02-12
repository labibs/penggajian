<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
  protected $table = 'pendapatan';
  protected $fillable = ['kode', 'tunjangan'];

  public function karyawan()
    {
    	return $this->belongsToMany(Karyawan::class)->withPivot(['id','periode','nominal','karyawan_id','pendapatan_id']);
    }
  public function karyawan_pendapatan()
    {
    	return $this->belongsToMany(Karyawan_pendapatan::class)->withPivot(['id','karyawan_id','pendapatan_id','tunjangan','periode','nominal']);
    }

}
