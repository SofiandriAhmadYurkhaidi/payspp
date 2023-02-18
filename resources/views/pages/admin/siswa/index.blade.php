@extends('layouts.admin')
@section('baseAdmin')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('data-siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="siswaTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No.Telp</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $i => $sis)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $sis ->nisn }}</td>
                            <td>{{ $sis ->nis }}</td>
                            <td>{{ $sis ->nama }}</td>
                            <td>{{ $sis ->kelas->nama_kelas }}</td>
                            <td>{{ $sis ->no_telp }}</td>
                            <td>{{ $sis ->alamat }}</td>
                            <td>
                                <a href="{{ route('data-siswa.edit', $sis->nisn) }}" class="btn btn-warning">Edit</a>
                                {{-- <form action="{{ url('data-siswa', $sis->nisn) }}" class="d-inline" method="POST" id="delete{{ $sis->nisn }}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger" onclick="deleteData({{ $sis->nisn }})">Hapus</button>
                                </form> --}}
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$sis->nisn}}">Hapus</button>
                            </td>
                        </tr>

                        {{-- deleteModal --}}
                        <div class="modal fade" id="deleteModal{{$sis->nisn}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Yakin ingin menghapus data {{$sis->nama}}
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ url('data-siswa', $sis->nisn) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


    {{-- sweetalert delete --}}
    {{-- <script>
        function deleteData(nisn){
            Swal.fire({
                title: 'PERINGATAN!',
                text: 'Yakin inginmenghapus data siswa?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: #3085d6,
                cancelButtonColor: #d33
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal'

            }).then((result) => {
                if(result.value){
                    $('#delete'+nisn).submit();
                }
            })

        }
    </script> --}}
@endsection
