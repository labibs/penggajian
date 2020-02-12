<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
  protected $table = 'kantor';
  protected $fillable = ['id','kode', 'nama','alamat'];

  public function karyawan()
  {
    return $this->belongsToMany(Karyawan::class);
  }
}
