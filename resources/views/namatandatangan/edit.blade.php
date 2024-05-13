
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">nama tanda tangan</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    <form action="{{ route('namatandatangan.update', $datanamatandatangan->id) }}" method="POST">

                          @csrf
                          @method('PUT')
                          <div class="form-group">
                                <label for="exampleInputEmail1">id</label>
                                <input type="text" name="id" class="form-control" placeholder="Enter ID nama tanda tangan" value="{{ old('id', $datanamatandatangan->id) }}">
                                @error('id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama_tandatangan</label>
                                <input type="text" name="nama_tandatangan" class="form-control" placeholder="Enter nama tanda tangan"value="{{ old('nama_tandatangan', $datanamatandatangan->namatandatangan) }}">
                                @error('nama_tandatangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">jabatan</label>
                                <input type="text" name="jabatan" class="form-control" placeholder="Enter jabatan"value="{{ old('jabatan', $datanamatandatangan->jabatan) }}">
                                @error('jabatan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">nip</label>
                                <input type="text" name="nip" class="form-control" placeholder="Enter nip"value="{{ old('nip', $datanamatandatangan->nip) }}"> 
                                @error('nip')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>


                              <br/>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
           
                        
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
