<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
  protected $table = 'potongan';
  protected $fillable = ['kode', 'pengurangan'];

  public function karyawan()
    {
    	return $this->belongsToMany(Karyawan::class)->withPivot(['id','periode','nominal','karyawan_id','potongan_id']);
    }
}
