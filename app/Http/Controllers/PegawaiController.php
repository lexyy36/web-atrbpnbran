<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('jabatan')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $jabatan = Jabatan::all();
        return view('pegawai.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $fotoName = null;
        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('foto_pegawai'), $fotoName);
        }

        Pegawai::create([
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'foto' => $fotoName,
        ]);

        return redirect()->route('pegawai.index');
    }

    public function edit(Pegawai $pegawai)
    {
        $jabatan = Jabatan::all();
        return view('pegawai.edit', compact('pegawai','jabatan'));
    }

   public function update(Request $request, Pegawai $pegawai)
{
    $request->validate([
        'nama' => 'required',
        'jabatan_id' => 'required',
        'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Jika upload foto baru
    if ($request->hasFile('foto')) {

        // Hapus foto lama
        if ($pegawai->foto && file_exists(public_path('foto_pegawai/'.$pegawai->foto))) {
            unlink(public_path('foto_pegawai/'.$pegawai->foto));
        }

        // Upload foto baru
        $file = $request->file('foto');
        $namaFoto = time().'-'.$file->getClientOriginalName();
        $file->move(public_path('foto_pegawai'), $namaFoto);

        $pegawai->foto = $namaFoto;
    }

    // Update field lain
    $pegawai->nama = $request->nama;
    $pegawai->jabatan_id = $request->jabatan_id;
    $pegawai->save();

    return redirect()->route('pegawai.index');
}


    public function destroy(Pegawai $pegawai)
    {
        if ($pegawai->foto && file_exists(public_path('foto_pegawai/'.$pegawai->foto))) {
            unlink(public_path('foto_pegawai/'.$pegawai->foto));
        }

        $pegawai->delete();
        return redirect()->route('pegawai.index');
    }
}
