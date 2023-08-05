@extends('layouts.template')

<body>
    <div class="text-center p-5 fw-bold fs-3">
        INPUT DATA SISWA
    </div>
    <div class="container mb-4 col-md-5 mx-auto ">

       @include('layouts.komponen.notif')

        <form action="{{ url('siswa') }}" method="post" name="proses">
            @csrf
            <div class="row">
                <div class="mb-4 col-4">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="name" class="form-control" value="{{Session::get('nisn')}}" id="nisn" name="nisn"
                        placeholder="Masukkan NISN">

                </div>
                <div class="mb-4 col-8  ">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="name" class="form-control" value="{{Session::get('nama')}}" id="nama" name="nama"
                        placeholder="Masukkan Nama">

                </div>
                <div class="mb-5 ">
                    <label for="hobi" class="form-label">Hobi</label>
                    <input type="name" class="form-control"value="{{Session::get('hobi')}}" id="hobi" name="hobi"
                        placeholder=" Masukkan Hobi">
                </div>
            </div>
            <div class="mb-4 ">
                <label for="kompetensi" class="form-label">Kompetensi</label>
                <select class="form-select" aria-label="Default select example" id="kompetensi" name="kompetensi">
                    <option selected>Pilih Kompetensi Jurusan</option>
                    <option value="SIJA">SIJA</option>
                    <option value="TMPO">TMPO</option>
                    <option value="KGSP">KGSP</option>
                    <option value="TME">TME</option>
                    <option value="TFLM">TFLM</option>
                    <option value="TEDK">TEDK</option>
                    <option value="KJIJ">KJIJ</option>
                </select>
            </div>
            <div class="mb-4 ">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat lengkap">{{Session::get('alamat')}}</textarea>
            </div>
            <div class="mb-5 ">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="name" class="form-control" value="{{Session::get('telepon')}}"id="telepon" name="telepon"
                    placeholder="Masukkan nomor telepon">

            </div>

            <div class="d-grid gap-2 d-md-block">
                <button type="submit" class="btn btn-primary " name="submit" value="submit">Submit</button>
                <input class="btn btn-danger" type="reset" value="Reset">
                <a class="btn btn-secondary" href="{{url('siswa')}}" role="button">View Data</a>
            </div>
        </form>
    </div>

</body>

</html>
