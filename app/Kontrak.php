<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $fillable =
        [
            'karyawan_id',
            'tanggal_masuk',
            'tanggal_berakhir'
        ];

    public function karyawan()
    {
        return $this->belongsTo('App\Karyawan');
    }

    public function reminder()
    {
        return $this->hasOne('App\Reminder', 'kontrak_id');
    }

    public function kemajuan()
    {
        return $this->hasMany('App\Kemajuan', 'kontrak_id');
    }
}
