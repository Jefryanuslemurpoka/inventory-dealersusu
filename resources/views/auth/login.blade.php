<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Halaman Login</h2>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>

</body>
</html>
