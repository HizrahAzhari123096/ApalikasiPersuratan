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
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Form Edit Kepala Surat</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                <form action="{{ route('kepalasurat.update', $kepalasurat->id_kop) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="id_kop" class="form-label">ID KOP</label>
        <input type="text" name="id_kop" class="form-control @error('id_kop') is-invalid @enderror" placeholder="Enter ID Kepala Surat" value="{{ old('id_kop', $kepalasurat->id_kop) }}">
        @error('id_kop')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nama_kop" class="form-label">Nama KOP</label>
        <input type="text" name="nama_kop" class="form-control @error('nama_kop') is-invalid @enderror" placeholder="Enter Nama Kepala Surat" value="{{ old('nama_kop', $kepalasurat->nama_kop) }}">
        @error('nama_kop')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="alamat_kop" class="form-label">Alamat KOP</label>
        <input type="text" name="alamat_kop" class="form-control @error('alamat_kop') is-invalid @enderror" placeholder="Enter Alamat Kepala Surat" value="{{ old('alamat_kop', $kepalasurat->alamat_kop) }}">
        @error('alamat_kop')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nama_tujuan" class="form-label">Nama Tujuan</label>
        <input type="text" name="nama_tujuan" class="form-control @error('nama_tujuan') is-invalid @enderror" placeholder="Enter Nama Tujuan" value="{{ old('nama_tujuan', $kepalasurat->nama_tujuan) }}">
        @error('nama_tujuan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="id_user" class="form-label">ID User</label>
        <input type="text" name="id_user" class="form-control @error('id_user') is-invalid @enderror" placeholder="Enter ID User" value="{{ old('id_user', $kepalasurat->id_user) }}">
        @error('id_user')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection