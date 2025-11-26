@extends('layouts.app')

@section('content')
<h3>Tambah Pegawai</h3>

<form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nama Pegawai:</label>
    <input type="text" name="nama" class="form-control" required>

    <label class="mt-2">Jabatan:</label>
    <select name="jabatan_id" class="form-control" required>
        <option value="">Pilih Jabatan</option>
        @foreach ($jabatan as $j)
            <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
        @endforeach
    </select>

    <label class="mt-2">Foto:</label>
    <input type="file" name="foto" class="form-control">

    <button class="btn btn-success mt-3">Simpan</button>
</form>
@endsection
