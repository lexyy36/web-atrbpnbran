@extends('layouts.app')

@section('content')
<h3>Edit Pegawai</h3>

<form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <label>Nama Pegawai:</label>
    <input type="text" name="nama" value="{{ $pegawai->nama }}" class="form-control" required>

    <label class="mt-2">Jabatan:</label>
    <select name="jabatan_id" class="form-control" required>
        @foreach ($jabatan as $j)
            <option value="{{ $j->id }}" {{ $pegawai->jabatan_id == $j->id ? 'selected' : '' }}>
                {{ $j->nama_jabatan }}
            </option>
        @endforeach
    </select>

    <label class="mt-2">Foto Saat Ini:</label><br>
    @if ($pegawai->foto)
        <img src="{{ asset('foto_pegawai/'.$pegawai->foto) }}" width="80">
    @else
        <span class="text-muted">Tidak ada foto</span>
    @endif

    <label class="mt-2">Ganti Foto (opsional):</label>
    <input type="file" name="foto" class="form-control">

    <button class="btn btn-success mt-3">Update</button>
</form>
@endsection
