<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">User</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('users.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">User_name</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Status/th>
                                    <th scope="col">Nama_petugas/th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datauser as $index => $user)
                                    <tr>
                                        <td class="text-center">{{ ++$index }}</td>
                                        <td>{{ $user->id}}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->password}}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ $user->nama_petugas }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $users->id) }}" method="POST">
                                                <a href="{{ route('users.show', $users->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('users.edit', $users->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Pengguna Belum Ada.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $users->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>