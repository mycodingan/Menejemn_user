@extends('layout.master')
@section('content')
    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="foto_user">User Photo</label>
                <input type="file" name="foto_user" class="form-control-file" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="nama_user">User Name</label>
                <input type="text" name="nama_user" class="form-control" value="{{ $user->nama_user }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_abser">Nomor Absen</label>
                <input type="text" name="nomor_abser" class="form-control" value="{{ $user->nomor_abser }}" required>
            </div>
            <div class="form-group">
                <label for="mulai_masuk">Mulai Masuk</label>
                <input type="date" name="mulai_masuk" class="form-control" value="{{ $user->mulai_masuk }}" required>
            </div>
            <div class="form-group">
                <label for="catatan_user">Catatan User</label>
                <textarea name="catatan_user" class="form-control" required>{{ $user->catatan_user }}</textarea>
            </div>
            <div class="form-group">
                <label for="password_user">Password User</label>
                <input type="password" name="password_user" class="form-control" value="{{ $user->password_user }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
