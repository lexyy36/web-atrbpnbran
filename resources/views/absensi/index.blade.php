@extends('layouts.app')

@section('content')
<h3>Data Absensi</h3>

<a href="{{ route('absensi.create') }}" class="btn btn-primary mb-3">Tambah Absensi</a>

<table class="table table-bordered">
    <tr>
        <th>Foto</th>
        <th>Nama Pegawai</th>
        <th>Jabatan</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach ($absensi as $a)
    <tr>
        <td>
            @if ($a->pegawai->foto)
                <img src="{{ asset('foto_pegawai/'.$a->pegawai->foto) }}" width="60" class="rounded">
            @else
                <span class="text-muted">Tidak ada foto</span>
            @endif
        </td>

        <td>{{ $a->pegawai->nama }}</td>
        <td>{{ $a->pegawai->jabatan->nama_jabatan }}</td>
        <td>{{ $a->tanggal }}</td>
        <td>{{ ucfirst($a->status) }}</td>

        <td>
            <a href="{{ route('absensi.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('absensi.destroy', $a->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
