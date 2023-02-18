<?php

namespace App\Http\Controllers\Admin;

use Hash;
// use Iluminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;
use Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::orderBy('nama', 'asc')->get();

        return view('pages.admin.siswa.index', ['siswa' => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();

        return view('pages.admin.siswa.create', [
            'kelas' => $kelas,
            'spp' => $spp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nisn' => 'required|numeric',
            'nis' => 'required|numeric',
            'nama' => 'required',
            'password' => 'required',
            'kelas' => 'required|integer',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'spp' => 'required|integer'
        ]);

        if($validasi) :
            $store = Siswa::create([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'nama' => $request->nama,
                'password' => Hash::make($request->password),
                'id_kelas' => $request->kelas,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'id_spp' => $request->spp,
            ]);
            if($store) :
                Alert::success('Berhasil', 'Data Berhasil di Tambahkan');
            else :
                Alert::error('Terjadi Kesalahan', 'Data Gagal di Tambahkan');
            endif;
        endif ;

        return redirect()->route('data-siswa.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nisn)
    {
        $siswa = Siswa::find($nisn);
        $kelas = Kelas::all();
        $spp = Spp::all();

        return view('pages.admin.siswa.edit', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'spp' => $spp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nisn)
    {
        $validasi = $request->validate([
            'nisn' => 'required|numeric',
            'nis' => 'required|numeric',
            'nama' => 'required',
            'kelas' => 'required|integer',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'spp' => 'required|integer'
        ]);

        if($validasi) :
            $update = Siswa::findOrFail($nisn)->update([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'nama' => $request->nama,
                'password' => Hash::make($request->password),
                'id_kelas' => $request->kelas,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'id_spp' => $request->spp,
            ]);
            if($update) :
                Alert::success('Berhasil', 'Data Berhasil di Ubah');
            else :
                Alert::error('Terjadi Kesalahan', 'Data Gagal di Ubah');
            endif;
        endif ;

        return redirect()->route('data-siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nisn)
    {
        if(Siswa::find($nisn)->delete()) :
            Alert::success('Berhasil', 'Data Berhasil di Hapus');
        else :
            Alert::error('Terjadi Kesalahan', 'Data Gagal di Hapus');
        endif;

        return back();
    }
}
