<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan_pendapatan extends Model
{
  protected $table = 'karyawan_pendapatan';
  protected $fillable = ['id','karyawan_id', 'pendapatan_id','tunjangan','periode','nominal'];

  public function pendapatan()
    {
    	return $this->belongsToMany(Pendapatan::class)->withPivot(['id','kode','tunjangan']);
    }
}
