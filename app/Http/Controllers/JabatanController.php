<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_jabatan' => 'required']);
        Jabatan::create($request->all());
        return redirect()->route('jabatan.index');
    }

    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate(['nama_jabatan' => 'required']);
        $jabatan->update($request->all());
        return redirect()->route('jabatan.index');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index');
    }
}
