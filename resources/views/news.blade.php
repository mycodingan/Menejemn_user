@extends('layout.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Latest News</h1>
    <form class="form-inline" action="{{ route('berita') }}" method="GET">
        <div class="form-group">
            <label for="cari" class="sr-only">Cari Berita:</label>
            <input type="text" class="form-control" id="search" name="cari" placeholder="Cari Berita" value="{{ $searchTerm ?? '' }}">
        </div>
        <div class="form-group mx-2">
            <label for="from" class="sr-only">from:</label>
            <input type="date" class="form-control" id="datefrom" name="from" value="{{ request('from')}}">
        </div>
        <div class="form-group mx-2">
            <label for="to" class="sr-only">To:</label>
            <input type="date" class="form-control" id="dateto" name="to" value="{{request('to')}}">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>



    <div class="row" id="cari_berita">
        @foreach ($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if (isset($article['urlToImage']))
                <img src="{{ $article['urlToImage'] }}" class="card-img-top" alt="{{ $article['title'] }}">
                @else
                <img src="{{ asset('image/carfiq.svg') }}" class="card-img-top" alt="Default Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $article['title'] }}</h5>
                    <p class="card-text">{{ $article['description'] }}</p>
                    <a href="{{ $article['url'] }}" class="btn bg-success-400" target="_blank">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
    function cariBerita() {
        var x = document.getElementById("cari_berita");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
@endsection
