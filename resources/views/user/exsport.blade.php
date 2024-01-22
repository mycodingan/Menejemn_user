@extends('layout.app')

@section('content')
    <div class="container">
        <div class="alert alert-success">
            Excel file exported successfully! <a href="{{ url('user/download/' . $fileName) }}">Download</a>
        </div>
    </div>
@endsection
