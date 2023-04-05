@extends('karyawan.dashboard.index')
@section('title', 'Table')
@section('content')
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <div class="bs-example widget-shadow" data-example-id="bordered-table">
                    <center>
                        <h2>Data Warna</h2>
                    </center>
                    <a href="/karyawan/warna/add" class="btn btn-info">Tambah Warna</a>
                    <br><br>
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Warna</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datawarna as $w)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $w->warna }}</td>
                                    {{-- <td>
                                        <a href="/karyawan/editBarangwarna/{{ $w->id }}"
                                            class="btn btn-success">Edit</a>
                                        <button onclick="onDelete({{ $w->id }})"
                                            class="btn btn-danger">Hapus</button>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script>
        function onDelete(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus itu!'
            }).then((result) => {
                window.location.href = '/karyawan/deleteBarangwarna/' + id;
                if (result.isConfirmed) {
                    Swal.fire(
                        'Dihapus!',
                        'File Anda telah dihapus.',
                        'Berhasil'
                    )
                }
            })
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

@endsection
