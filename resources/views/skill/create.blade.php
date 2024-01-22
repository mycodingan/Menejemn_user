@extends('layout.master')
@section('content')
    <div class="container">
        <h2>Create User</h2>
        <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="keahlian_user">Keahlian User</label>
                <input type="text" name="keahlian_user" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
