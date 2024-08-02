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
<body style="background: white">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Tambah Kepala Surat</h1>
                
                <a href="{{ route('kepalasurat.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Kepala Surat</a>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kepalasurat.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_kop" class="form-label">Nama Kepala Surat</label>
                        <input type="text" class="form-control" id="nama_kop" name="nama_kop" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_kop" class="form-label">Alamat Kepala Surat</label>
                        <input type="text" class="form-control" id="alamat_kop" name="alamat_kop" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_tujuan" class="form-label">Nama Tujuan</label>
                        <input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_user" class="form-label">User</label>
                        <select class="form-control" id="id_user" name="id_user" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id_user }}">{{ $user->id_user }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    @endsection