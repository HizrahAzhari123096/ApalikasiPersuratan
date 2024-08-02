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
                <h3 class="text-center my-4">Data Nama Tanda Tangan</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('namatandatangan.create') }}" class="btn btn-md btn-info mb-3">Tambah</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Tanda Tangan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">NIP</th>
                                <th scope="col" style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($namatandatangan as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $item->id_tandatangan }}</td>
                                    <td>{{ $item->nama_tandatangan }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('namatandatangan.show', $item->id_tandatangan) }}" class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('namatandatangan.edit', $item->id_tandatangan) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('namatandatangan.destroy', $item->id_tandatangan) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <div class="alert alert-danger">
                                            Data Nama Tanda Tangan belum tersedia.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $namatandatangan->links() }} <!-- Pagination links -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
