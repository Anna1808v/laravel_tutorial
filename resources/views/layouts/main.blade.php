<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<div>
    <div>
        <nav>
            <li><a href="{{ route('about.index') }}">About</a></li>
            <li><a href="{{ route('pets.index') }}"">Pets</a></li>
            <li><a href="{{ route('first_page.index') }}"">First Page</a></li>
            <li><a href="{{ route('second_page.index') }}"">Second Page</a></li>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
