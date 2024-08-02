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
                <h1 class="text-center">Tambah Surat Masuk</h1>
                
                <a href="{{ route('suratmasuk.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Surat Masuk</a>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_surat" class="form-label">No. Surat</label>
                        <input type="text" class="form-control" id="no_surat" name="no_surat" required>
                    </div>
                    <div class="mb-3">
                        <label for="asal_surat" class="form-label">Asal Surat</label>
                        <input type="text" class="form-control" id="asal_surat" name="asal_surat" required>
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal" required>
                    </div>
                    <div class="mb-3">
                        <label for="disp1" class="form-label">Disp1</label>
                        <input type="text" class="form-control" id="disp1" name="disp1" required>
                    </div>
                    <div class="mb-3">
                        <label for="disp2" class="form-label">Disp2</label>
                        <input type="text" class="form-control" id="disp2" name="disp2" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_kop" class="form-label">Kepala Surat</label>
                        <select class="form-control" id="id_kop" name="id_kop" required>
                            @foreach($kepala_surat as $kepalaSurat)
                                <option value="{{ $kepalaSurat->id_kop }}">{{ $kepalaSurat->nama_kop }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_tandatangan" class="form-label">Nama Tanda Tangan</label>
                        <select class="form-control" id="id_tandatangan" name="id_tandatangan" required>
                            @foreach($namatandatangan as $tandatangan)
                                <option value="{{ $tandatangan->id_tandatangan }}">{{ $tandatangan->id_tandatangan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
