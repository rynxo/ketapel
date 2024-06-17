@extends('layouts.main')

@section('bagian', 'Halaman Utama')
@section('content')
<div class="card-header">
  <div class="row justify-content-between align-items-center m-3">
    <h1 class="card-title">Halaman Utama</h1>
    <h1 class="card-title">Jumlah Pelanggan : {{ $japel }} Pelanggan</h1>
    <a href="/tapel" class="btn btn-primary">Tambah Pelanggan</a>
  </div>
</div>
<div class="card-body">
  <table id="example2" class="table table-bordered table-hover text-center">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Layanan</th>
        <th>Alamat</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dp as $no => $p)
      <tr>
        <td>{{ $no + 1 }}</td>
        <td>{{ $p->namaPelanggan }}</td>
        <td>{{ $p->email }}</td>
        <td>{{ $p->noHp }}</td>
        <td>{{ $p->layanan->namaLayanan }}</td>
        <td>{{ $p->alamatPelanggan }}</td>
        <td><img src="{{ asset('/storage/'.$p->fotoRumah) }}" alt="{{ $p->fotoRumah }}" height="200"></td>
        <td>
          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalEdit{{ $p->id }}"><i class="ion ion-edit"></i></a>
          <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{ $p->id }}"><i class="ion ion-trash-b"></i></a>
        </td>
      </tr>

      <!-- Modal Edit Pelanggan -->
      <div class="modal fade" id="modalEdit{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{ $p->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditLabel{{ $p->id }}">Edit Pelanggan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form Edit Pelanggan -->
              <form action="/updatePelanggan/{{ $p->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="inputNama">Nama Pelanggan</label>
                  <input type="text" class="form-control" name="nama" id="inputNama" placeholder="Masukkan Nama Pelanggan" required value="{{ $p->namaPelanggan }}">
                </div>
                <div class="form-group">
                  <label for="inputEmail">Email Pelanggan</label>
                  <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Masukkan Email Pelanggan" required value="{{ $p->email }}">
                </div>
                <div class="form-group">
                  <label for="inputNoHP">Nomor Handphone</label>
                  <input type="text" class="form-control" name="nohp" id="inputNoHP" placeholder="Masukkan Nomor Handphone Aktif Pelanggan" required value="{{ $p->noHp }}">
                </div>
                <div class="form-group">
                  <label for="inputAlamat">Alamat Pelanggan</label>
                  <textarea class="form-control" id="inputAlamat" name="alamat" rows="3" placeholder="Masukkan Alamat Pelanggan" required>{{ $p->alamatPelanggan }}</textarea>
                </div>
                <div class="form-group">
                  <label for="inputLayanan">Jenis Layanan</label>
                  <select id="inputLayanan" name="layanan" class="form-control" required>
                    <option value="{{ $p->layanan->id }}">{{ $p->layanan->namaLayanan }}</option>
                    @foreach ($lay as $l)
                    <option value="{{ $l->id }}">{{ $l->namaLayanan }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputFoto">Foto Rumah Pelanggan</label>
                  <input type="file" name="foto" id="inputFoto" class="form-control-file" accept="image/*" >
                  <img src="{{ asset('/storage/'.$p->fotoRumah) }}" width="100" height="100" alt="Foto Rumah">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal Edit Pelanggan -->

      <!-- Modal Delete Pelanggan -->
      <div class="modal fade" id="modalDelete{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel{{ $p->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalDeleteLabel{{ $p->id }}">Konfirmasi Hapus Pelanggan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus Pelanggan ini?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <form action="/deletePelanggan/{{ $p->id }}" method="get">
                @csrf
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal Delete Pelanggan -->
      @endforeach
    </tbody>
  </table>    
</div>

@endsection
