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
        <h1 class="text-center">Daftar Surat Masuk</h1>
        <a href="{{ route('suratmasuk.create') }}" class="btn btn-primary mb-3">Tambah Surat Masuk</a>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kepala Surat</th>
                    <th>Tanggal</th>
                    <th>No. Surat</th>
                    <th>Asal Surat</th>
                    <th>Perihal</th>
                    <th>Disp1</th>
                    <th>Disp2</th>
                    <th>Nama Tanda Tangan</th>
                    <th>Image</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suratmasuk as $index => $sm)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $sm->kepalaSurat->nama_kop }}</td>
                        <td>{{ $sm->tanggal }}</td>
                        <td>{{ $sm->no_surat }}</td>
                        <td>{{ $sm->asal_surat }}</td>
                        <td>{{ $sm->perihal }}</td>
                        <td>{{ $sm->disp1 }}</td>
                        <td>{{ $sm->disp2 }}</td>
                        <td>{{ $sm->namaTandaTangan->nama_tandatangan }}</td>
                        
                        <td><img src="{{ asset('storage/' . $sm->image) }}" alt="Image" width="50"></td>
                        <td>
                            <a href="{{ route('suratmasuk.edit', $sm->no_surat) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('suratmasuk.show', $sm->no_surat) }}" class="btn btn-sm btn-success">Show</a>
                            <form action="{{ route('suratmasuk.destroy', $sm->no_surat) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $suratmasuk->links() }}
    </div>
    @endsection
