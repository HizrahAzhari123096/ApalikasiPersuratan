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
                <h3 class="text-center my-4">Detail Kepala Surat</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="id_kop" class="form-label">ID KOP</label>
                        <h5>{{ $kepalasurat->id_kop }}</h5>
                    </div>
                    <div class="mb-3">
                        <label for="nama_kop" class="form-label">Nama KOP</label>
                        <h5>{{ $kepalasurat->nama_kop }}</h5>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_kop" class="form-label">Alamat KOP</label>
                        <h5>{{ $kepalasurat->alamat_kop }}</h5>
                    </div>
                    <div class="mb-3">
                        <label for="nama_tujuan" class="form-label">Nama Tujuan</label>
                        <h5>{{ $kepalasurat->nama_tujuan }}</h5>
                    </div>
                    <a href="{{ route('kepalasurat.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection