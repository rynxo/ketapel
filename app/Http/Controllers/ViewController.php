<?php

namespace App\Http\Controllers;

use App\Layanan;
use App\Pelanggan;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function beranda()
    {
        $layanan = Layanan::All();
        $pelanggan = Pelanggan::count();
        return view('beranda', ['ly' => $layanan, 'pl' => $pelanggan]);
    }

    public function cariLayanan(Request $req)
    {
        $cari = $req->cari;

        if (!empty($cari)) {
            $data = Layanan::where('namaLayanan', 'LIKE', "%$cari%")
                ->orWhere('harga', 'LIKE', "%$cari%")
                ->orWhere('infoLayanan', 'LIKE', "%$cari%")
                ->get();
        }

        return redirect()->route('beranda', ['#layanan'])->with('ly', $data);
    }
}
