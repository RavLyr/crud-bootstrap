@extends('layouts.template')

<body>

    <div class="container md-3 mt-4">

        @include('layouts.komponen.notif')

        <div class="text-center p-5 fw-bold fs-3">
            Data Siswa
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <form action="{{ url('siswa') }}" method="GET" class="form-inline">
                        <div class="form-group">
                            <input type="search" name="keyword" class="form-control"
                                value="{{ Request::get('keyword') }}" placeholder="Masukkan NISN yang dicari">
                        </div>
                      </div>
                      <div class="col-lg-5"> <button class="btn btn-outline-primary" type="submit">Search</button>
                      </div>
                    </form>
                
            </div>
        </div>


        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kompetensi Keahlian</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Hobi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            {{ $nomor++ }}
                        </td>
                        <td>
                            {{ $item->nisn }}
                        </td>
                        <td>
                            {{ $item->nama }}
                        </td>
                        <td>
                            {{ $item->kompetensi }}
                        </td>
                        <td>
                            {{ $item->alamat }}
                        </td>
                        <td>
                            {{ $item->telepon }}
                        </td>
                        <td>
                            {{ $item->hobi }}
                        </td>

                        <td>
                            <a href="{{ url('siswa/' . $item->nisn . '/edit') }}"
                                class="btn btn-sm btn-secondary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('siswa/' . $item->nisn) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                @endforeach
            </tbody>


        </table>

        {{ $data->withQueryString()->links() }}

        <a class="btn btn-primary" href="{{ url('siswa/create') }}" role="button">Tambah Data</a>
    </div>


</body>

</html>
