@extends('layout.master')

@section('konten')
    
        <h1>Edit Data Siswa</h1>
        @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="/siswa/{{$siswa -> id}}/update" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama_depan">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" id="nama_depan"
                            placeholder="Masukkan Nama Depan" value="{{$siswa -> nama_depan}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Belakang</label>
                        <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Masukkan Nama Belakang" value="{{$siswa -> nama_belakang}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Ibu</label>
                        <input name="nama_ibu" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Masukkan Nama Ibu" value="{{$siswa -> nama_ibu}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Ayah</label>
                        <input name="nama_ayah" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Masukkan Nama Ayah" value="{{$siswa -> nama_ayah}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                            <option value="Laki-laki" @if ($siswa -> jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if ($siswa -> jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Agama</label>
                        <select name="agama" class="form-control" id="exampleFormControlSelect1" value="{{$siswa -> agama}}">
                            <option value="Hindu" @if (($siswa -> agama == 'Hindu'))
                                selected
                            @endif>Hindu</option>
                            <option value="Islam" @if (($siswa -> agama == 'islam'))
                                selected
                            @endif>Islam</option>
                            <option value="Buddha" @if (($siswa -> agama == 'Buddha'))
                                selected
                            @endif>Buddha</option>
                            <option value="Kristen" @if (($siswa -> agama == 'Kristen'))
                                selected
                            @endif>Kristen</option>
                            <option value="Kong Hu Cu" @if (($siswa -> agama == 'Kong Hu Cu'))
                                selected
                            @endif>Kong Hu Cu</option>
                        </select>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1"
                                rows="3" >{{$siswa -> alamat}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>
    @endsection

