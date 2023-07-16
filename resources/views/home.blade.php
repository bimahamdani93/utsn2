@extends('layouts.app')

<body>
    <header class="header">

        <a href="#" class="logo">
            <img src="{{ Vite::asset('resources/images/AOlogo.png') }}" alt="">
        </a>

        <nav class="navbar">
            <a href="{{ route('home') }}">home</a>
            <a href="{{ route('about') }}">merch</a>
            <a href="{{ route('employees.create') }}">contact</a>
            <a href="{{ route('employees.index') }}">admin</a>
            @guest
                <a href="{{ route('login') }}" class="nav text-dark">Login</a>
            @else
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="nav text-dark">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </nav>




        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </div>

        <div class="cart-items-container">
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="{{ Vite::asset('resources/images/merch-1.jpeg') }}" alt="">
                <div class="content">
                    <h3>AO T-Shirt</h3>
                    <div class="price">Rp. 150.000</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="{{ Vite::asset('resources/images/merch-2.jpeg') }}" alt="">
                <div class="content">
                    <h3>AO Angpao</h3>
                    <div class="price">Rp. 25.000</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="{{ Vite::asset('resources/images/merch-3.jpeg') }}" alt="">
                <div class="content">
                    <h3>AO Charm</h3>
                    <div class="price">Rp. 55.0000</div>
                </div>
            </div>
            <div class="cart-item">
                <span class="fas fa-times"></span>
                <img src="{{ Vite::asset('resources/images/merch-4.jpeg') }}" alt="">
                <div class="content">
                    <h3>AO Collar</h3>
                    <div class="price">Rp. 85.000</div>
                </div>
            </div>
            <a href="#" class="btn">checkout now</a>
        </div>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->


    <section class="home" id="home">
        <div class="content">
            <div class="paragraph">
                <h1>AO CAT Caffe</h1>
                <p>Time Spent with Cat is Never Wasted</p>
                <a href="#" class="btn">come now</a>
            </div>
        </div>


    </section>

    <!-- home section ends -->
    <section>
        <center>
            <div class="video">
                <video width="600" src="{{ Vite::asset('resources/images/vid.mp4') }}" controls></video>
            </div>
        </center>
    </section>

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">

            <div class="container">
                <div class="wrapper">
                    <img src="{{ Vite::asset('resources/images/about-1.jpeg') }}">
                    <img src="{{ Vite::asset('resources/images/about-2.jpeg') }}">
                    <img src="{{ Vite::asset('resources/images/about-3.jpeg') }}">
                    <img src="{{ Vite::asset('resources/images/about-4.jpeg') }}">
                    <img src="{{ Vite::asset('resources/images/about-5.jpeg') }}">
                </div>
            </div>


            <div class="content">
                <h3>why our cafe?</h3>
                <p>our cafe is unique and will give you so many new experiences. also, you can enjoy your foods and
                    drinks while interact with the cats in our cafe. to support us you can buy our merch too!! </p>
                <a href="#" class="btn">learn more</a>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- star section starts-->
    <section class="star" id="star">

        <h1 class="heading"> our <span>star</span> </h1>

        <div class="container-star">

            <ul class="gallery">
                <li>
                    <a href="#gambar-1">
                        <img src="{{ Vite::asset('resources/images/cut-1.jpeg') }}" alt="Open">
                        <span>Open</span>
                    </a>

                    <div class="overlay" id="gambar-1">
                        <a href="#" class="close">x close</a>
                        <img src="{{ Vite::asset('resources/images/fz-1.jpeg') }}" alt="Open">
                    </div>
                </li>

                <li>
                    <a href="#gambar-2">
                        <img src="{{ Vite::asset('resources/images/cut-2.jpeg') }}" alt="Billy">
                        <span>Billy</span>
                    </a>

                    <div class="overlay" id="gambar-2">
                        <a href="#" class="close">x close</a>
                        <img src="{{ Vite::asset('resources/images/fz-2.jpeg') }}" alt="Billy">
                    </div>
                </li>

                <li>
                    <a href="#gambar-3">
                        <img src="{{ Vite::asset('resources/images/cut-3.jpeg') }}" alt="Lulu">
                        <span>Lulu</span>
                    </a>

                    <div class="overlay" id="gambar-3">
                        <a href="#" class="close">x close</a>
                        <img src="{{ Vite::asset('resources/images/fz-3.jpeg') }}" alt="Lulu">
                    </div>
                </li>

                <li>
                    <a href="#gambar-4">
                        <img src="{{ Vite::asset('resources/images/cut-4.jpeg') }}" alt="Jerry">
                        <span>Jerry</span>
                    </a>

                    <div class="overlay" id="gambar-4">
                        <a href="#" class="close">x close</a>
                        <img src="{{ Vite::asset('resources/images/fz-4.jpeg') }}" alt="Jerry">
                    </div>
                </li>

                <li>
                    <a href="#gambar-5">
                        <img src="{{ Vite::asset('resources/images/cut-5.jpeg') }}" alt="Jacko">
                        <span>Jacko</span>
                    </a>

                    <div class="overlay" id="gambar-5">
                        <a href="#" class="close">x close</a>
                        <img src="{{ Vite::asset('resources/images/fz-5.jpeg') }}" alt="Jacko">
                    </div>
                </li>

                <li>
                    <a href="#gambar-6">
                        <img src="{{ Vite::asset('resources/images/cut-6.jpeg') }}" alt="Inul">
                        <span>Inul</span>
                    </a>

                    <div class="overlay" id="gambar-6">
                        <a href="#" class="close">x close</a>
                        <img src="{{ Vite::asset('resources/images/fz-6.jpeg') }}" alt="Inul">
                    </div>
                </li>

                <div class="clear"></div>
            </ul>

        </div>
        <div>
    </section>



    <!-- blogs section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="credit">created by <span>A. Pinky Marshanda</span> | Spread Love to Other.</div>

    </section>

    <!-- footer section ends -->

    <!--Scroll top buton-->
    <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>

    <!-- custom js file link  -->
    <!-- custom js file link  -->
    @vite('resources/js/app.js')
    <script>
        $(document).ready(function() {
            // Mencari elemen dengan ID 'popup'
            var popup = $('#popup');

            // Menampilkan pesan pop-up
            popup.fadeIn();

            // Menghilangkan pesan pop-up setelah 3 detik
            setTimeout(function() {
                popup.fadeOut();
            }, 3000);
        });
    </script>
</body>

</html>
