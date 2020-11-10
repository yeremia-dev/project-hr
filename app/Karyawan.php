<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'user_id',
        'nrp',
        'nama_lengkap',
        'status',
        'jabatan',
        'section',
        'departemen',
        'nama_nrp_atasan',
        'email',
        'no_hp'
    ];

    public function kontrak()
    {
        return $this->hasOne('App\Kontrak', 'karyawan_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
