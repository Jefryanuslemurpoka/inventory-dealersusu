<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/produk">Produk</a></li>
            <li>
                <span>{{ Auth::user()->email }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    @yield('content')
</body>
</html>