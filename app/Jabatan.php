<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  protected $table = 'jabatan';
  protected $fillable = ['id','kode','nama'];

  public function karyawan()
  {
    return $this->belongsToMany(Karyawan::class);
  }
}
