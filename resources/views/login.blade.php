<html>
    <head>
        <title>Login</title>
    </head>
    <body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Login</h1>
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit">Login</button>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </form>
    </body>
</html>