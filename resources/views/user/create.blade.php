@extends('layout.master')
@section('content')
    <div class="container">
        <h2>Create User</h2>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="foto_user">User Photo</label>
                <input type="file" name="foto_user" class="form-control-file" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <label for="nama_user">User Name</label>
                <input type="text" name="nama_user" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nomor_abser">Nomor Absen</label>
                <input type="text" name="nomor_abser" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="mulai_masuk">Mulai Masuk</label>
                <input type="date" name="mulai_masuk" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="catatan_user">Catatan User</label>
                <textarea name="catatan_user" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="password_user">Password User</label>
                <input type="password" name="password_user" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
