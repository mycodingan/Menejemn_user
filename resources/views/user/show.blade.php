@extends('layout.master')
@section('content')
    <div class="container">
        <h2>User Details</h2>
        <div class="card">
            <img src="{{ asset('storage/'.$user->foto_user) }}" class="card-img-top" alt="User Image">
            <div class="card-body">
                <h5 class="card-title">{{ $user->nama_user }}</h5>
                <p class="card-text">Nomor Absen: {{ $user->nomor_abser }}</p>
                <p class="card-text">Mulai Masuk: {{ $user->mulai_masuk }}</p>
                <p class="card-text">Catatan: {{ $user->catatan_user }}</p>
                <p class="card-text">Password: {{ $user->password_user }}</p>
            </div>
        </div>
    </div>
@endsection
