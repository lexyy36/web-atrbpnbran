<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('pegawai')->get();
        return view('absensi.index', compact('absensi'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('absensi.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        Absensi::create($request->all());
        return redirect()->route('absensi.index');
    }

    public function edit(Absensi $absensi)
    {
        $pegawai = Pegawai::all();
        return view('absensi.edit', compact('absensi','pegawai'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'pegawai_id' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        $absensi->update($request->all());
        return redirect()->route('absensi.index');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensi.index');
    }
}
