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
            <div class="col-md-12">
                <h1 class="text-center">Daftar Surat Keluar</h1>
                <a href="{{ route('suratkeluar.create') }}" class="btn btn-primary mb-3">Tambah Surat Keluar Baru</a>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Kepala Surat</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">No. Surat</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Isi Surat</th>
                            <th scope="col">Nama Tanda Tangan</th>
                            <th scope="col">User Tanda Tangan</th>
                            <th scope="col" style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratkeluar as $suratkeluars)
                            <tr>
                                <td>{{ $suratkeluars->id }}</td>
                                <td>{{ $suratkeluars->kepalaSurat ? $suratkeluars->kepalaSurat->nama_kop : 'N/A' }}</td>
                                <td>{{ $suratkeluars->tanggal }}</td>
                                <td>{{ $suratkeluars->no_surat }}</td>
                                <td>{{ $suratkeluars->perihal }}</td>
                                <td>{{ $suratkeluars->tujuan }}</td>
                                <td>{{ $suratkeluars->isi_surat }}</td>
                                <td>{{ $suratkeluars->namatandatangan ? $suratkeluars->namatandatangan->nama_tandatangan : 'N/A' }}</td>
                                <td>{{ $suratkeluars->users ? $suratkeluars->users->id_user : 'N/A' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('suratkeluar.edit', $suratkeluars->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('suratkeluar.show', $suratkeluars->id) }}" class="btn btn-info btn-sm">Show</a>
                                    <form action="{{ route('suratkeluar.destroy', $suratkeluars->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus surat keluar ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $suratkeluar->links() }}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @endsection
