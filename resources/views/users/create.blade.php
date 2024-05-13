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
            <div class="container">

<div class="row">

    <div class="col-md-12">

        <h1>Tambah Pengguna</h1>

        <form action="{{ route('users.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="user_name">Username</label>

                <input type="text" name="user_name" id="user_name" class="form-control">

            </div>

            <div class="form-group">

                <label for="password">Password</label>

                <input type="password" name="password" id="password" class="form-control">

            </div>

            <div class="form-group">

                <label for="status">Status</label>

                <input type="text" name="status" id="status" class="form-control">

            </div>

            <div class="form-group">

                <label for="nama_petugas">Nama Petugas</label>

                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control">

            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>

        </form>

    </div>

</div>

</div>
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
