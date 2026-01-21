<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Nama">
    <input type="text" name="username" placeholder="Username">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="no_telp" placeholder="No Telepon">

    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password">

    <button type="submit">Save</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
