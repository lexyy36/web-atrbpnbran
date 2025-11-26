<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['pegawai_id','tanggal','status'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
