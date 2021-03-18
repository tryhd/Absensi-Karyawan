<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    //
    protected $table='absensi';
    protected $fillable =['id_pegawai','tanggal','masuk','keluar','keterangan','gaji'];

    public function getPegawai(){
        return $this->belongsTo('App\Pegawai', 'id_pegawai', 'id');
    }
}


