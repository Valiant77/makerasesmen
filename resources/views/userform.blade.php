<form method="POST" action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}">
    @csrf
    @if (isset($user))
        @method('PUT')
    @endif
    <input type="text" name="name" placeholder="Nama" value="{{ old('name', $user->name ?? '') }}">
    <input type="text" name="username" placeholder="Username" value="{{ old('username', $user->username ?? '') }}">
    <input type="email" name="email" placeholder="Email" value="{{ old('email', $user->email ?? '') }}">
    <input type="text" name="no_telp" placeholder="No Telepon" value="{{ old('no_telp', $user->no_telp ?? '') }}">

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
