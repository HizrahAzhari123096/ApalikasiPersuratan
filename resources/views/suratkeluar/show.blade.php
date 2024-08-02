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
                <h1 class="text-center">Detail Surat Keluar</h1>

                <a href="{{ route('suratkeluar.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Surat Keluar</a>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{ $suratkeluar->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Kepala Surat</th>
                            <td>{{ $suratkeluar->kepalaSurat->nama_kop }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal</th>
                            <td>{{ $suratkeluar->tanggal }}</td>
                        </tr>
                        <tr>
                            <th scope="row">No. Surat</th>
                            <td>{{ $suratkeluar->no_surat }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Perihal</th>
                            <td>{{ $suratkeluar->perihal }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tujuan</th>
                            <td>{{ $suratkeluar->tujuan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Isi Surat</th>
                            <td>{{ $suratkeluar->isi_surat }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Tanda Tangan</th>
                            <td>{{ $suratkeluar->namatandatangan->nama_tandatangan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">User Tanda Tangan</th>
                            <td>{{ $suratkeluar->users->id_user }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-center mt-4">
                    <a href="{{ route('suratkeluar.edit', $suratkeluar->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('suratkeluar.destroy', $suratkeluar->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus surat keluar ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
