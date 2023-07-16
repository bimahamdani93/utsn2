<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    @vite('resources/sass/app.scss')
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,300&family=Pacifico&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>{{ $pageTitle }}</title>
</head>

<body>
    <section class="h-100" >
        <div class="container">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <span class="navbar-text text-white"
                            style=" font-family: 'Pacifico', cursive; font-size: 50px;">AO Cat Caffe</span>
                    </div>

                    <div class="card shadow-lg">
                        @if (session()->has('succes'))
                            <div class="alert alert-succes alert-dismissible fade show" role="alert">
                                {{ session('succes') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('loginError'))
                            <div class="alert alert-succes alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <form action="/login" method="POST" class="needs-validation" novalidate=""
                                autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid
                                    @enderror"
                                        name="email" value="" required autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Login
                                    </button>
                                </div>

                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Don't have an account? <a href="/register" class="text-dark">Create One</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="js/login.js"></script>
    @vite('resources/js/app.js')
</body>

</html>
