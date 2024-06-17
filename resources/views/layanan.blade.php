@extends('layouts.main')
    
@section('bagian', 'Halaman Layanan')
@section('content')
<div class="card-header">
  @if (@session('alert'))
      <div class="alert alert-success col-3 alert-dismissible fade show" role="alert">
        <strong>{{ session('alert') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  @endif
  <div class="row justify-content-between align-items-center m-3">
    <h1 class="card-title">Halaman Layanan</h1>
    <a href="/talay" class="btn btn-primary">Tambah Layanan</a>
  </div>
</div>
<div class="card-body">
  <table id="example2" class="table table-bordered table-hover text-center">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Layanan</th>
        <th>Info Layanan</th>
        <th>Harga</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($ly as $no => $l)
      <tr>
        <td>{{ $no + 1 }}</td>
        <td>{{ $l->namaLayanan }}</td>
        <td>{{ $l->infoLayanan }}</td>
        <td>Rp. {{ number_format($l->harga, 0, ',', '.') }}</td>
        
        <td><img src="{{ asset('/storage/'.$l->fotoLayanan) }}" alt="{{ $l->fotoLayanan }}" height="200"></td>
        <td>
          <a href="#" class="btn btn-success m-1" data-toggle="modal" data-target="#modalEdit{{ $l->id }}"><i class="ion ion-edit"></i></a>
          <a href="#" class="btn btn-danger m-1" data-toggle="modal" data-target="#modalDelete{{ $l->id }}"><i class="ion ion-trash-b"></i></a>
        </td>
      </tr>

      <!-- Modal Edit Layanan -->
      <div class="modal fade" id="modalEdit{{ $l -> id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{ $l -> id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditLabel{{ $l->id }}">Edit Layanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form Edit Layanan -->
              <form action="/updateLayanan/{{ $l->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="namaLayanan">Nama Layanan</label>
                  <input type="text" class="form-control" id="namaLayanan" name="namaLayanan" required value="{{ $l->namaLayanan }}">
                </div>
                <div class="form-group">
                  <label for="infoLayanan">Info Layanan</label>
                  <textarea class="form-control" id="infoLayanan" name="infoLayanan" required rows="3">{{ $l->infoLayanan }}</textarea>
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" required value="{{ $l->harga }}">
                </div>
                <div class="form-group">
                  <label for="inputFoto">Foto Layanan</label>
                  <input type="file" name="foto" id="inputFoto" class="form-control-file" accept="image/*" >
                  <img src="{{ asset('/storage/'.$l->fotoLayanan) }}" width="100" height="100" alt="Foto Layanan" class="mt-2">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Delete Layanan -->
      <div class="modal fade" id="modalDelete{{ $l->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel{{ $l->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalDeleteLabel{{ $l->id }}">Konfirmasi Hapus Layanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus layanan ini?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <form action="/deleteLayanan/{{ $l->id }}" method="get">
                @csrf
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      @endforeach
    </tbody>
  </table>    
</div>
@endsection
