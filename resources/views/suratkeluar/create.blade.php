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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Tambah Surat Keluar</h1>
                
                <a href="{{ route('suratkeluar.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Surat Keluar</a>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('suratkeluar.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal" required>
                    </div>
                    <div class="mb-3">
                        <label for="tujuan" class="form-label">Tujuan</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi_surat" class="form-label">Isi Surat</label>
                        <textarea class="form-control" id="isi_surat" name="isi_surat" rows="3" required></textarea>
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
                                <option value="{{ $tandatangan->id_tandatangan }}">{{ $tandatangan->nama_tandatangan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_user" class="form-label">User Tanda Tangan</label>
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
