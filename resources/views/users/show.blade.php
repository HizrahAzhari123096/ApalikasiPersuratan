@extends('template.app')

@section('content')
<div class="section-header">
    <h1>Halaman User</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dasbor</a></div>
        <div class="breadcrumb-item"><a href="#">Manajemen</a></div>
        <div class="breadcrumb-item">Daftar User</div>
    </div>
</div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Detail User</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ID: {{ $user->id_user }}</h5>
                        <p class="card-text">Username: {{ $user->user_name }}</p>
                        <p class="card-text">Status: {{ $user->status }}</p>
                        <p class="card-text">Nama Petugas: {{ $user->nama_petugas }}</p>
                    </div>
                </div>
                <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
    @endsection