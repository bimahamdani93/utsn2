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

    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Total Harga</th>
                    <th>Tanggal Order</th>
                    <th>Username</th>
                    <th>Bukti Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->nama }}</td>
                        <td>{{ $order->alamat }}</td>
                        <td>{{ $order->no_telepon }}</td>
                        <td>{{ $order->total_harga }}</td>
                        <td>{{ $order->tanggal_order }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            <img src="{{ asset('uploads/bukti/' . $order->bukti_pembayaran) }}" height="80px"
                                width="80px" alt="">
                            <a target="_blank" href="{{ url('uploads/bukti/' . $order->bukti_pembayaran) }} "
                                class="btn btn-primary ml-3">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
