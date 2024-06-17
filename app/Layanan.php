<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    // Tabel Layanan
    protected $table = 'layanan';

    protected $fillable = [
        'namaLayanan',
        'infoLayanan',
        'harga',
        'fotoLayanan'
    ];
}
