<?php

namespace App\Http\Controllers;

use App\Layanan;
use App\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function kelogin()
    {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return view('auth.login');
        }
    }
    public function keregister()
    {
        return view('auth.register');
    }
    public function home()
    {
        $dapel = Pelanggan::orderBy('id', 'desc')->get();
        $japel = Pelanggan::count();
        $lay = Layanan::All();
        return view('home', ['dp' => $dapel, 'lay' => $lay, 'japel' => $japel]);
    }

    public function layanan()
    {
        $lay = Layanan::orderBy('id', 'desc')->get();
        return view('layanan', ['ly' => $lay]);
    }

    public function tapel()
    {
        $lay = Layanan::all();
        return view('tapel', compact('lay'));
    }

    public function talay()
    {
        return view('talay');
    }

    public function profil()
    {
        return view('profile');
    }

    public function ubahpw()
    {
        return view('ubah');
    }

    public function main()
    {
        return view('layouts/main');
    }

    public function tambahlayanan(Request $req)
    {
        $namafile = time() . '-' . $req->file('foto')->getClientOriginalName();

        $path = $req->file('foto')->storeAs('fotoLayanan', $namafile, 'public');

        Layanan::create([
            'namaLayanan' => $req->nama,
            'infoLayanan' => $req->info,
            'harga' => $req->harga,
            'fotoLayanan' => $path
        ]);
        return redirect('/layanan');
    }

    public function tambahpelanggan(Request $req)
    {
        $namafile = time() . '-' . $req->file('foto')->getClientOriginalName();

        $path = $req->file('foto')->storeAs('fotoRumah', $namafile, 'public');


        Pelanggan::create([
            'namaPelanggan' => $req->nama,
            'id_layanan' => $req->layanan,
            'alamatPelanggan' => $req->alamat,
            'noHp' => $req->nohp,
            'email' => $req->email,
            'fotoRumah' => $path
        ]);
        return redirect('/home');
    }

    public function editpelanggan($id)
    {
        $lay = Layanan::all();
        $ed = Pelanggan::find($id);
        return view('editpelanggan', ['pl' => $ed, 'l' => $lay]);
    }

    public function updateLayanan($id, Request $req)
    {
        $ly = Layanan::find($id);

        $ly->namaLayanan = $req->namaLayanan;
        $ly->infoLayanan = $req->infoLayanan;
        $ly->harga = $req->harga;

        // Periksa apakah foto baru telah diunggah
        if ($req->hasFile('foto')) {
            // Hapus file foto sebelumnya jika ada
            if ($ly->fotoLayanan) {
                Storage::disk('public')->delete($ly->fotoLayanan);
            }

            // Upload foto baru
            $namaFile = time() . '-' . $req->file('foto')->getClientOriginalName();
            $path = $req->file('foto')->storeAs('fotoLayanan', $namaFile, 'public');
            $ly->fotoLayanan = $path;
        }

        $ly->save();

        // Kembali ke halaman home dengan pesan sukses
        return redirect('/layanan')->with('alert', 'Data Berhasil Diubah');
    }

    public function updatepelanggan($id, Request $req)
    {
        $pl = Pelanggan::find($id);

        $pl->namaPelanggan = $req->nama;
        $pl->id_layanan = $req->layanan;
        $pl->email = $req->email;
        $pl->alamatPelanggan = $req->alamat;
        $pl->noHp = $req->nohp;

        // Periksa apakah foto baru telah diunggah
        if ($req->hasFile('foto')) {
            // Hapus file foto sebelumnya jika ada
            if ($pl->fotoRumah) {
                Storage::disk('public')->delete($pl->fotoRumah);
            }

            // Upload foto baru
            $namaFile = time() . '-' . $req->file('foto')->getClientOriginalName();
            $path = $req->file('foto')->storeAs('fotoRumah', $namaFile, 'public');
            $pl->fotoRumah = $path;
        }

        // Simpan perubahan pada data pelanggan
        $pl->save();

        // Kembali ke halaman home dengan pesan sukses
        return redirect('/home')->with('alert', 'Data Berhasil Diubah');
    }

    public function deletePelanggan($id)
    {
        $pl = Pelanggan::find($id);
        if ($pl->fotoRumah) {
            Storage::disk('public')->delete($pl->fotoRumah);
        }
        $pl->delete();
        return redirect('/home');
    }
    public function deleteLayanan($id)
    {
        $lay = Layanan::find($id);
        if ($lay->fotoLayanan) {
            Storage::disk('public')->delete($lay->fotoLayanan);
        }
        $lay->delete();
        return redirect('/layanan')->with('alert', 'Layanan Berhasil Dihapus');
    }
}
