@extends('layouts.app')

@section('content')
<h3>Data Pegawai</h3>

<a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>

<table class="table table-bordered">
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Aksi</th>
    </tr>

    @foreach ($pegawai as $p)
    <tr>
        <td>
            @if ($p->foto)
                <img src="{{ asset('foto_pegawai/'.$p->foto) }}" width="60" class="rounded">
            @else
                <span class="text-muted">Tidak ada foto</span>
            @endif
        </td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->jabatan->nama_jabatan }}</td>
        <td>
            <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
