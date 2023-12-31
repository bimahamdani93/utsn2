<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navbar Start -->
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
    <!-- Navbar End -->

    <div class="container body mx-auto">
        <div class="main_container">
            <div class="right_col" role="main">
                <div class="page-title mt-3">
                    <div class="title_left">
                        <h3>Edit Category</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_content">
                                <br />
                                <form action="/categories/{{ $category->id }}" method="POST" id="demo-form2"
                                    data-parsley-validate class="form-horizontal form-label-left"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nama Kategori
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="first-name"
                                                value="{{ old('nama_kategori', $category['nama_kategori']) }}"
                                                placeholder="Enter name category"
                                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                                name="nama_kategori">
                                            @error('nama_kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="ln_solid"></div>
                                    <div class="item form-group mt-2">
                                        <div class="col-md-6 col-sm-6 d-flex">
                                            <a href="/products"><button class="btn btn-primary me-4"
                                                    type="button">Cancel</button></a>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
