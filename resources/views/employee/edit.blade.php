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
                        <a href="{{ url('/products') }}" class="nav-item nav-link">Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/orders') }}" class="nav-item nav-link">List Order</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/transactions') }}" class="nav-item nav-link">List Transaksi</a>
                    </li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-item nav-link">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    {{-- @guest
                        <a href="{{ route('login') }}" class="nav text-dark">Login</a>
                    @else
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav text-dark">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest --}}
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-sm mt-lg-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="starter-template">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>
                                    <center>Edit</center>
                                </h4>
                            </div> <br> <br>
                            <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST"
                                class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $errors->any() ? old('name') : $employee->name }}" id="name"
                                            name="name" placeholder="Your name" />
                                    </div>
                                    @error('name')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Email</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror "
                                            value="{{ $errors->any() ? old('email') : $employee->email }}"
                                            id="email" name="email" placeholder="Your Email" />
                                    </div>
                                    @error('email')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="nohp">NoHp</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('nohp') is-invalid @enderror "
                                            value="{{ $errors->any() ? old('nohp') : $employee->nohp }}" id="nohp"
                                            name="nohp" placeholder="Your nohp" />
                                    </div>
                                    @error('nohp')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-2 mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')

</body>

</html>
