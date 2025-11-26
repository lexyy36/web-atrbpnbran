@extends('layouts.app')

@section('content')
<h3>Edit Absensi</h3>

<form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
    @csrf @method('PUT')

    <label>Pegawai:</label>
    <select name="pegawai_id" class="form-control" required>
        @foreach ($pegawai as $p)
            <option value="{{ $p->id }}" {{ $absensi->pegawai_id == $p->id ? 'selected' : '' }}>
                {{ $p->nama }}
            </option>
        @endforeach
    </select>

    <label class="mt-2">Tanggal:</label>
    <input type="date" name="tanggal" value="{{ $absensi->tanggal }}" class="form-control" required>

    <label class="mt-2">Status:</label>
    <select name="status" class="form-control" required>
        <option value="hadir"  {{ $absensi->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
        <option value="izin"   {{ $absensi->status == 'izin' ? 'selected' : '' }}>Izin</option>
        <option value="sakit"  {{ $absensi->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
        <option value="alpha"  {{ $absensi->status == 'alpha' ? 'selected' : '' }}>Alpha</option>
    </select>

    <button class="btn btn-success mt-3">Update</button>
</form>
@endsection