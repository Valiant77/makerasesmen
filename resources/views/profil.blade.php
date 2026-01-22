<h1>Profil</h1>
<ul>
    <li>Nama: {{ auth()->user()->name }}</li>
    <li>Username: {{ auth()->user()->username }}</li>
    <li>Email: {{ auth()->user()->email }}</li>
    <li>No Telepon: {{ auth()->user()->no_telp }}</li>
</ul>
<a href="{{ route('user.edit', auth()->user()->id) }}">
    <button class="btn btn-edit">Edit Profil</button>
</a>
<a href="{{ route('admin.create') }}">
    <button class="btn btn-secondary">Tambah Admin</button>
</a>