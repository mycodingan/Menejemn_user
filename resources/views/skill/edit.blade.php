@extends('layout.master')
@section('content')
    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ route('skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
           
            <div class="form-group">
                <label for="keahlian_user">Password User</label>
                <input type="password" name="keahlian_user" class="form-control" value="{{ $skill->keahlian_user }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
