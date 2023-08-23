<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #777b7e">
        <div class="container">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ url('/welcome') }}" class="nav-item nav-link">Back to home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/employees') }}" class="nav-item nav-link">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/categories') }}" class="nav-item nav-link">Category</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/products') }}" class="nav-item nav-link">Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/orders') }}" class="nav-item nav-link">List Order</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/transactions') }}" class="nav-item nav-link">List Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/users') }}" class="nav-item nav-link">List User</a>
                    </li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-item nav-link">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <div class="item form-group mt-4 px-4">
        <div class="d-flex col-md-6 col-sm-6 w-100 justify-content-between">
            <h3>List Category</h3>
            <a href="{{ url('/categories/create') }}" class="nav-item nav-link"> <button class="btn btn-success">Tambah
                    Produk</button></a>
        </div>
    </div>
    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->nama_kategori }}</td>
                        <td>
                            <div class="d-inline">
                                <button class="btn btn-primary border-0 px-2">
                                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}"><i
                                            class="fas fa-pencil-alt fa-lg" aria-hidden="true"
                                            style="color:white !important;"></i></a></button>
                                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                    method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger border-0"
                                        style="padding-left:0.65rem; padding-right:0.65rem;"
                                        onclick="return confirm('Anda yakin akan menghapus data?')"><i
                                            class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                </form>
                            </div>
                            {{-- <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                                class="btn btn-outline-dark btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-dark btn-sm"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    @vite('resources/js/app.js')
</body>

</html>
