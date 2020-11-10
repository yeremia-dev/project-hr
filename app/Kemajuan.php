<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kemajuan extends Model
{
    protected $fillable =
        [
            'kontrak_id',
            'isi_kemajuan',
            'tanggal_kemajuan'
        ];

    public function reminder()
    {
        return $this->hasOne('App\Reminder', 'kontrak_id');
    }

    public function kontrak()
    {
        return $this->belongsTo('App\Kontrak');
    }
}
