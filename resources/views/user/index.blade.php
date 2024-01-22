@extends('layout.master')
@section('index')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 20px;
        width: 100%;
        background-color: #f8f9fa;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card img {
        max-width: 100%;
        height: 10%;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        margin-bottom: 8px;
    }

    .btn-group {
        margin-top: 10px;
    }

    /* Add new styles for table view */
    table {
        width: 100%;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

</style>

<div class="container">
    <h2 class="mt-4 mb-4">User List</h2>
    <form class="form" method="get" action="{{ route('user.index') }}">
        <div class="form-group w-100 mb-3">
            <label for="search" class="d-block mr-2">Pencarian</label>
            <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan Nama Yang Akan DI Cari" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary mb-1">Cari</button>

        </div>
    </form>


    <div class="btn-group mb-3">
        <button type="button" class="btn btn-primary  mr-4 bg-success-400" onclick="switchView('card')">Card </button>
        <button type="button" class="btn btn-primary  mr-4 bg-success-400" onclick="switchView('table')">Table</button>
        <button class="btn  mr-4 bg-success-400" onclick="cariAku('cari')">serch</button>
        <button type="button" class="btn btn-primary bg-success-400" data-toggle="modal" data-target="#exampleModalCenter">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5M8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6" />
            </svg>
        </button>
        <button class=" text-decoration-none" type="button">
            <a href="{{ route('user.export') }}" class="btn  bg-success-400" style="text-decoration: "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5m-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5" />
                </svg> </a>
        </button>

    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Import User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header"></div>

                                    <div class="card-body">
                                        @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>PILIH FILE</label>
                                                    <input type="file" name="file" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                                                <button type="submit" class="btn btn-success">IMPORT</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <form method="get" action="{{ route('user.index') }}" id="cari">
        @csrf
        <div class="form-group">
            <label for="search">Pilih Nama User:</label>
            <select class="form-control" name="search" id="search">
                <option value="">-- Pilih Nama User --</option>
                @foreach($users as $userName)
                <option value="{{ $userName->nama_user }}">{{ $userName->nama_user }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <div id="card-view">
        <div class="row">
            @foreach($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/'.$user->foto_user) }}" class="card-img-top" alt="User Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->nama_user }}</h5>
                        <p class="card-text">Nomor Absen: {{ $user->nomor_abser }}</p>
                        <p class="card-text">Mulai Masuk: {{ $user->mulai_masuk }}</p>
                        <p class="card-text">Catatan: {{ $user->catatan_user }}</p>
                        <div class="btn-group" role="group">
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">View Details</a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit button" class="btn btn-danger" onclick="return confirm('Yakin mau membuang user ini?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="table-view" style="display: none;">
        <table>
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Nomor Absen</th>
                    <th>Mulai Masuk</th>
                    <th>Catatan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->nama_user }}</td>
                    <td>{{ $user->nomor_abser }}</td>
                    <td>{{ $user->mulai_masuk }}</td>
                    <td>{{ $user->catatan_user }}</td>
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit button" class="btn btn-danger" onclick="return confirm('Yakin mau membuang user ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}

</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    function cariAku() {
        var x = document.getElementById("cari");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function switchView(view) {
        if (view === 'card') {
            $('#card-view').show();
            $('#table-view').hide();
        } else if (view === 'table') {
            $('#card-view').hide();
            $('#table-view').show();
        }
    }

</script>
@endsection
