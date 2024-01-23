<div class="card" id="release">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Hello selamat datang di aplikasi pengelolaan data </h5>
        <div class="header-elements">
        </div>
    </div>

    <div class="btn-group mb-3 text-center ">
        <button class="btn mt-48"><a href="{{ route('berita') }}">Berita</a>
    </div>

    <div class="card-body" style="border-radius: 10px">
        <div class="mb-4">
            @yield('content')
        </div>
    </div>
</div>
