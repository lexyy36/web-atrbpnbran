@extends('layouts.app')

@section('content')
<h3>Tambah Absensi</h3>

<form action="{{ route('absensi.store') }}" method="POST">
    @csrf

    <label>Pegawai:</label>
    <select name="pegawai_id" class="form-control" required>
        <option value="">Pilih Pegawai</option>
        @foreach ($pegawai as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
    </select>

    <label class="mt-2">Tanggal:</label>
    <input type="date" name="tanggal" class="form-control" required>

    <label class="mt-2">Status:</label>
    <select name="status" class="form-control" required>
        <option value="hadir">Hadir</option>
        <option value="izin">Izin</option>
        <option value="sakit">Sakit</option>
        <option value="alpha">Alpha</option>
    </select>

    <button class="btn btn-success mt-3">Simpan</button>
</form>
@endsection
