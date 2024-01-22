@extends('layout.master')

@section('index')
    <h2>Keahlian</h2>
    <div id="card-view">
        <div class="row">
            @foreach($skill as $skill)
                <div class="col-md-2.9 mb-4 ">
                    <div class="card ml-20">
                        <div class="card-body">
                            <h3 class="card-text font-bold font">{{ $skill->keahlian_user }}</h3>
                            <div class="btn-group" role="group">
                                <a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('skill.destroy', $skill->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Terserah kamulah')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
