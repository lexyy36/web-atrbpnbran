@extends('layouts.app')

@section('content')
<h3>Edit Jabatan</h3>

<form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
    @csrf @method('PUT')

    <label>Nama Jabatan:</label>
    <input type="text" name="nama_jabatan" class="form-control"
           value="{{ $jabatan->nama_jabatan }}" required>

    <button class="btn btn-success mt-3">Update</button>
</form>
@endsection
