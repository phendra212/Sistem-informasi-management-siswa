@extends('layout.master')

@section('konten')


@if (session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Siswa</h6>

                    <div class="d-flex justify-content-end">

                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#exampleModal">
                            Tambah Data Siswa</button>
                    </div>


                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="table align-items-center mb-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>nama depan</th>
                                        <th>nama belakang</th>
                                        <th>nama ibu</th>
                                        <th>nama ayah</th>
                                        <th>jenis_kelamin</th>
                                        <th>agama</th>
                                        <th>alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_siswa as $siswa)
                                    <tr>
                                        <td> <a href="/siswa/{{$siswa->id}}/profile">{{$siswa -> nama_depan}}</a></td>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa -> nama_belakang}}</a></td>
                                        <td>{{$siswa -> nama_ibu}}</td>
                                        <td>{{$siswa -> nama_ayah}}</td>
                                        <td>{{$siswa -> jenis_kelamin}}</td>
                                        <td>{{$siswa -> agama}}</td>
                                        <td>{{$siswa -> alamat}}</td>
                                        <td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit</a>
                                            <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger"
                                                onclick="return confirm('Yakin data dihapus ?')">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/siswa/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama_depan">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" id="nama_depan"
                            placeholder="Masukkan Nama Depan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Belakang</label>
                        <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Masukkan Nama Belakang">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Ibu</label>
                        <input name="nama_ibu" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Masukkan Nama Ibu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Ayah</label>
                        <input name="nama_ayah" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Masukkan Nama Ayah">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Agama</label>
                        <select name="agama" class="form-control" id="exampleFormControlSelect1">
                            <option value="Hindu">Hindu</option>
                            <option value="Islam">Islam</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Kong Hu Cu">Kong Hu Cu</option>
                        </select>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>


    @endsection
