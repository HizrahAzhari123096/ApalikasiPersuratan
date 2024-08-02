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
        <div class="col-md-6">
            <div>
                <h3 class="text-center my-4">Tambah Pengguna</h3>
                <hr>
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control" id="status" name="status" required>
                </div>

                <div class="mb-3">
                    <label for="nama_petugas" class="form-label">Nama Petugas</label>
                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection