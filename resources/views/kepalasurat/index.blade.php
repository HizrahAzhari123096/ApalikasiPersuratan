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
                <h3 class="text-center my-4">Data Kepala Surat</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('kepalasurat.create') }}" class="btn btn-primary mb-3">Tambah Kepala Surat Baru</a>
                    @if ($kepalasurat->isEmpty())
                        <p>Tidak ada data kepala surat.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID KOP</th>
                                        <th>Nama KOP</th>
                                        <th>Alamat KOP</th>
                                        <th>Nama Tujuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kepalasurat as $ks)
                                        <tr>
                                            <td>{{ $ks->id_kop }}</td>
                                            <td>{{ $ks->nama_kop }}</td>
                                            <td>{{ $ks->alamat_kop }}</td>
                                            <td>{{ $ks->nama_tujuan }}</td>
                                            <td>
                                            <a href="{{ route('kepalasurat.show', $ks->id_kop) }}" class="btn btn-sm btn-success">Show</a>
                                            <a href="{{ route('kepalasurat.edit', $ks->id_kop) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('kepalasurat.destroy', $ks->id_kop) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kepala surat ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $kepalasurat->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection