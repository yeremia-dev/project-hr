<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable =
        [
            'kontrak_id',
            'tanggal_pengingat',
            'batasan_pengingat',
            'is_confirm'
        ];

    public function kontrak()
    {
        return $this->belongsTo('App\Kontrak');
    }
}
