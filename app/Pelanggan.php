<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'pelanggan';

    // Mendefinisikan kolom-kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'namaPelanggan',
        'id_layanan',
        'alamatPelanggan',
        'email',
        'noHp',
        'fotoRumah'
    ];
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan'); // Assuming 'layanan_id' is the foreign key
    }
}
