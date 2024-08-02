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
                <h3 class="text-center my-4">Tambah Nama Tanda Tangan</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('namatandatangan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_tandatangan">Nama Tanda Tangan</label>
                            <input type="text" id="nama_tandatangan" name="nama_tandatangan" class="form-control" placeholder="Masukkan Nama Tanda Tangan" value="{{ old('nama_tandatangan') }}">
                            @error('nama_tandatangan')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan" class="form-control" placeholder="Masukkan Jabatan" value="{{ old('jabatan') }}">
                            @error('jabatan')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" id="nip" name="nip" class="form-control" placeholder="Masukkan NIP" value="{{ old('nip') }}">
                            @error('nip')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection