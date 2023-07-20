<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">





    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Order Detail') }}</div>

                    @php
                        $total_price = 0.0;
                    @endphp

                    <div class="card-body">
                        <h5 class="card-title">Order ID {{ $orders->id }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By {{ $orders->user->name }}</h6>
                        <hr>
                        @foreach ($orders->transactions as $transaction)
                            <p>{{ $transaction->product->nama_barang }} - {{ $transaction->jumlah }} pcs</p>
                            @php
                                $total_price += $transaction->product->harga * $transaction->jumlah;
                            @endphp
                        @endforeach
                        <hr>
                        <p>Total: Rp{{ $total_price }}</p>
                        <hr>
                        <h6 class="card-title">Nama : {{ $orders->nama }}</h6>
                        <h6 class="card-title">Alamat : {{ $orders->alamat }}</h6>
                        <h6 class="card-title">No Telepon : {{ $orders->no_telepon }}</h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
