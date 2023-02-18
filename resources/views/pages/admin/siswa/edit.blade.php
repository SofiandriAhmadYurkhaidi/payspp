@extends('layouts.admin')
@section('baseAdmin')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Siswa</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4" style="width:35rem;">
    <div class="card-header py-3">
        <a href="{{ route('data-siswa.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('data-siswa.update', $siswa->nisn) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="">NISN</label>
                    <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}">
                </div>
                <div class="form-group">
                    <label for="">NIS</label>
                    <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="kelas" id="" class="custom-select" {{ count($kelas) == 0 ? 'disabled' : '' }}>
                        @if(count($kelas) == 0)
                        <option value="">Pilihan tidak ada</option>
                        @else
                        <option value="">Silahkan pilih</option>
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id_kelas }}" {{ $siswa->id_kelas == $kls->id_kelas ? 'selected' : '' }}>{{ $kls->nama_kelas }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $siswa->alamat }}">
                </div>
                <div class="form-group">
                    <label for="">No. Telpon</label>
                    <input type="text" name="no_telp" class="form-control" value="{{ $siswa->no_telp }}">
                </div>
                <div class="form-group">
                    <label for="">SPP</label>
                    <select name="spp" id="" class="custom-select" {{ count($spp) == 0 ? 'disabled' : '' }}>
                        @if(count($spp) == 0)
                        <option value="">Pilihan tidak ada</option>
                        @else
                        <option value="">Silahkan pilih</option>
                            @foreach ($spp as $spp)
                                <option value="{{ $spp->id_spp }}" {{ $siswa->id_spp == $spp->id_spp ? 'selected' : '' }}>{{ 'Tahun '. $spp->tahun. ' - '. 'Rp. '.number_format($spp->nominal) }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection


