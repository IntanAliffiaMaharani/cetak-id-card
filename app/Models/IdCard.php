<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdCard extends Model
{
    protected $fillable = [

        'tanggal',

        'status',

        'lokasi',

        'np',

        'nama',

        'nomor_nota',

        'operator',

        'gagal_cetak'

    ];
}