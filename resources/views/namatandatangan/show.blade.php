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
                <h3 class="text-center my-4">Detail Nama Tanda Tangan</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_tandatangan">Nama Tanda Tangan</label>
                        <input type="text" id="nama_tandatangan" name="nama_tandatangan" class="form-control" value="{{ $namatandatangan->nama_tandatangan }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" class="form-control" value="{{ $namatandatangan->jabatan }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip" class="form-control" value="{{ $namatandatangan->nip }}" disabled>
                    </div>
                    <a href="{{ route('namatandatangan.index') }}" class="btn btn-md btn-dark">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection