@extends('layouts.main')
@section('bagian', "Tambah Pelanggan")
    
@section('content')
<div class="card-header">
  <h4>Tambah Pelanggan</h4>
</div>
  <!-- form start -->
  <div class="card-body">
    <form action="/save" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputNama">Nama Pelanggan</label>
          <input type="nama" class="form-control" name="nama" id="inputNama" placeholder="Masukkan Nama Pelanggan" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email Pelanggan</label>
          <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Masukkan Email Pelanggan" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputAlamat">Alamat Pelanggan</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="5" placeholder="Masukkan Alamat Pelanggan" required></textarea>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="inputNoHP">Nomor Handphone</label>
            <input type="text" class="form-control" name="nohp" id="inputNoHP" placeholder="Masukkan Nomor Handphone Aktif Pelanggan" required>
          </div>
          <div class="form-group">
            <label for="inputState">Jenis Layanan</label>
            <select id="inputState" name="layanan" class="form-control" required>
              <option value="">Pilih Layanan</option>
              @foreach ($lay as $l)
              <option value="{{ $l->id }}">{{ $l->namaLayanan }}</option>
              @endforeach
              {{-- <option value="Gaming">Paket Gaming</option>
              <option value="Keluarga">Paket Keluarga</option>
              <option value="Hemat">Paket Hemat</option> --}}
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="InputGambar">Foto Rumah Pelanggan</label>
        <div class="input-group">
          <input type="file" name="foto" accept="image/*" class="form-control-file">
        </div>
      </div>
      <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
    </form>
  </div>
@endsection