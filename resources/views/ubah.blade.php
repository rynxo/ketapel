@extends('layouts.main')
    
@section('bagian', 'Halaman Ubah Password')
@section('content')
<div class="card-header">
  <div class="row justify-content-between align-items-center m-1">
    <h1 class="card-title">Halaman Ubah Password</h1>
    <a href="/ubahpassword" class="btn btn-primary">Ubah Password</a>
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
@endsection
