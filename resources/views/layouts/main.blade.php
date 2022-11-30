<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid"> 
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('about.index') }}">About</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('pet.index') }}">Pets</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('main.index') }}">First Page</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('second_page.index') }}">Second Page</a>
                        </li>
                                                
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')

</div>
</body>
</html>
