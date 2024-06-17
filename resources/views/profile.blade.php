@extends('layouts.main')
    
@section('bagian', 'Halaman Profil')
@section('content')
<div class="card-header">
  @if (@session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('info') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  @endif
  <div class="row justify-content-between align-items-center m-1">
    <h1 class="card-title">Halaman Profil</h1>
    <button  class="btn btn-primary" data-toggle="modal" data-target="#repassModal">Ubah Password</button>
  </div>
</div>
<div class="card-body">
  <div class="row">
    <div class="col-6">
      <div class="">
        <h6>
          Nama Pengguna
        </h6>
        <h2 class="ml-1">
          {{ Auth::user()->name }}
        </h2>
      </div>
    </div>
    <div class="col-6">
      <div class="">
        <h6>
          Email Pengguna
        </h6>
        <h2 class="ml-1">
          {{ Auth::user()->email }}
        </h2>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="repassModal" tabindex="-1" role="dialog" aria-labelledby="repassModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="repassModalLabel">Ganti Kata Sandi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/repass" method="post">
          @csrf
          <div class="form-group col-md-9">
            <label for="password1">Masukkan Kata Sandi Baru</label>
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password Baru" required>
          </div>
          <div class="form-group col-md-9">
            <label for="password2">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Masukkan Konfirmasi Password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Ganti</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
