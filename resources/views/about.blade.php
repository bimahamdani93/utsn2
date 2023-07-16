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

    <!-- star section end-->

    <!-- merch section start-->
    <section class="merch" id="merch">

        <h1 class="heading"> our <span>merch</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="{{ Vite::asset('resources/images/merch-1.jpeg') }}" alt="">
                <h3>AO T-shirt</h3>
                <div class="price">Rp. 150.0000 <span>Rp. 250.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/merch-2.jpeg') }}" alt="">
                <h3>AO Angpao</h3>
                <div class="price">Rp. 25.000 <span>Rp. 50.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/merch-3.jpeg') }}" alt="">
                <h3>AO Charm</h3>
                <div class="price">Rp. 55.000 <span>Rp. 85.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/merch-4.jpeg') }}" alt="">
                <h3>AO Collar</h3>
                <div class="price">Rp. 85.000 <span>Rp. 100.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/merch-5.jpeg') }}" alt="">
                <h3>AO Cat/Dog Shirt</h3>
                <div class="price">Rp. 100.000 <span>Rp. 150.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/merch-6.jpeg') }}" alt="">
                <h3>AO Cat/Dog Toys</h3>
                <div class="price">Rp. 45.000 <span>Rp. 65.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

        </div>

    </section>
    <!-- merch section end-->

    <!-- menu section starts  -->

    <section class="menu" id="menu">

        <h1 class="heading"> our <span>menu</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="{{ Vite::asset('resources/images/menu-1.png') }}" alt="">
                <h3>AO Waffle</h3>
                <div class="price">Rp. 25.000 <span>Rp. 30.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/menu-2.png') }}" alt="">
                <h3>AO Catty Burger</h3>
                <div class="price">Rp.35.000 <span>Rp. 45.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/menu-3.png') }}" alt="">
                <h3>AO Fried Potato</h3>
                <div class="price">Rp. 15.000 <span>Rp. 30.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/menu-4.png') }}" alt="">
                <h3>AO Vanilla Mix-O</h3>
                <div class="price">Rp. 20.000 <span>Rp. 30.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/menu-5.png') }}" alt="">
                <h3>AO Strawberry Shortcake</h3>
                <div class="price">Rp. 20.000 <span>Rp. 30.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

            <div class="box">
                <img src="{{ Vite::asset('resources/images/menu-6.png') }}" alt="">
                <h3>AO Blackforeal</h3>
                <div class="price">Rp. 20.000 <span>Rp. 30.000</span></div>
                <a href="#" class="btn">add to cart</a>
            </div>

        </div>

    </section>

    <!-- menu section ends -->

    <!--bm section start-->

    <section class="bm" id="bm">

        <h1 class="heading"> our <span> best merch</span> </h1>

        <div class="box-container">

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="{{ Vite::asset('resources/images/merch-1.jpeg') }}" alt="">
                </div>
                <div class="content">
                    <h3>AO T-shirt</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">Rp. 150.000 <span>Rp. 250.000</span></div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="{{ Vite::asset('resources/images/merch-3.jpeg') }}" alt="">
                </div>
                <div class="content">
                    <h3>AO Charm</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">Rp. 55.000 <span>Rp. 85.000</span></div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="{{ Vite::asset('resources/images/merch-5.jpeg') }}" alt="">
                </div>
                <div class="content">
                    <h3>AO Cat/Dog Shirt</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">Rp. 100.000 <span>Rp. 150.000</span></div>
                </div>
            </div>

        </div>

    </section>

    <!--bm section ends-->

    <!-- review section starts  -->

    <!-- review section ends -->

    <!-- contact section starts  -->


    <!-- contact section ends -->

    <!-- blogs section starts  -->

    <!-- blogs section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="credit">created by <span>A. Pinky Marshanda</span> | Spread Love to Other.</div>

    </section>

    <!-- footer section ends -->

    <!--Scroll top buton-->
    <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>
    @vite('resources/js/app.js')
</body>

</html>
