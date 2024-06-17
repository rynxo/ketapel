@extends('layouts.main')
@section('bagian', "Tambah Layanan")

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/saveLayanan" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-header">
      <h4>Tambah Pelanggan</h4>
    </div>
      <!-- form start -->
    <div class="card-body">
      <div class="form-group">
          <label for="layanan">Nama Layanan</label>
          <input type="text" name="nama" id="layanan" class="form-control">
      </div>
      <div class="form-group">
          <label for="info">Info Layanan</label>
          <textarea name="info" class="form-control" id="info" cols="30" rows="5"></textarea>
      </div>
      <div class="form-group">
          <label for="harga">Harga</label>
          <input type="number" step=".01" name="harga" id="harga" class="form-control">
      </div>
      <div class="form-group">
        <label for="InputGambar">Foto Layanan</label>
        <div class="input-group">
          <input type="file" name="foto" accept="image/*" class="form-control-file">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

</form>

@endsection
