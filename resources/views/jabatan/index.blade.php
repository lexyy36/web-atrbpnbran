@extends('layouts.app')

@section('content')
<h3>Data Jabatan</h3>

<a href="{{ route('jabatan.create') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nama Jabatan</th>
        <th>Aksi</th>
    </tr>

    @foreach ($jabatan as $j)
    <tr>
        <td>{{ $j->id }}</td>
        <td>{{ $j->nama_jabatan }}</td>
        <td>
            <a href="{{ route('jabatan.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('jabatan.destroy', $j->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
