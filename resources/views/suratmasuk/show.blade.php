<!-- resources/views/suratmasuk/show.blade.php -->
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
        <h1 class="text-center">Detail Surat Masuk</h1>
        
        <a href="{{ route('suratmasuk.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Surat Masuk</a>

        <div class="card">
            <div class="card-header">
                Detail Surat Masuk
            </div>
            <div class="card-body">
                <p><strong>Kepala Surat:</strong> {{ $suratmasuk->kepalaSurat->nama_kop }}</p>
                <p><strong>Tanggal:</strong> {{ $suratmasuk->tanggal }}</p>
                <p><strong>No. Surat:</strong> {{ $suratmasuk->no_surat }}</p>
                <p><strong>Asal Surat:</strong> {{ $suratmasuk->asal_surat }}</p>
                <p><strong>Perihal:</strong> {{ $suratmasuk->perihal }}</p>
                <p><strong>Disp1:</strong> {{ $suratmasuk->disp1 }}</p>
                <p><strong>Disp2:</strong> {{ $suratmasuk->disp2 }}</p>
                <p><strong>Nama Tanda Tangan:</strong> {{ $suratmasuk->namaTandaTangan->nama_tandatangan }}</p>
                <p><strong>Image:</strong> <img src="{{ asset('storage/' . $suratmasuk->image) }}" alt="Image" width="100"></p>
            </div>
        </div>
    </div>
    @endsection
