<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #fe7ef2;">
    <div class="container-fluid">
        <span class="navbar-text text-dark" style=" font-family: 'Pacifico', cursive; font-size: 20px;">Vinsti
            Cake</span>
        <ul class="navbar-nav flex-row flex-wrap">
            <li class="nav-item col-6 col-md-auto "><a href="#" class="nav-link text-dark">Home</a></li>
            <li class="nav-item col-6 col-md-auto "><a href="#" class="nav-link text-dark">Produk</a></li>
            <li class="nav-item col-6 col-md-auto"><a href="#popular" class="nav-link text-dark">Profil</a></li>
            <li class="nav-item col-6 col-md-auto"><a href="#gallery" class="nav-link text-dark">Gallery</a></li>
            <li class="nav-item col-6 col-md-auto"><a href="{{ route('employees.create') }}"
                    class="nav-link text-dark">Masukan</a></li>
            <li class="nav-item col-6 col-md-auto"><a href="{{ route('employees.index') }}" class="nav-link text-dark">Admin</a></li>
            <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href='#about'">Log
                Out</button>
        </ul>
    </div>
</nav>
