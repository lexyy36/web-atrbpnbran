@extends('layouts.app')

@section('content')
<h3>Tambah Jabatan</h3>

<form action="{{ route('jabatan.store') }}" method="POST">
    @csrf

    <label>Nama Jabatan:</label>
    <input type="text" name="nama_jabatan" class="form-control" required>

    <button class="btn btn-success mt-3">Simpan</button>
</form>
@endsection
