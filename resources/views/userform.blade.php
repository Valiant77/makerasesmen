@extends('layouts.main')
@section('title')
    {{ isset($user) ? 'Edit' : 'Tambah' }} {{ ucfirst($role) }}
@endsection

@section('content')

<div class="content-container">
    <form method="POST"
          action="{{ isset($user) ? route($user->role . '.update', $user->id) : route($role . '.store') }}"
          enctype="multipart/form-data">
        @csrf
        @isset($user)
            @method('PUT')
        @endisset

        <div class="form-grid">
            <div class="form-column">
                <x-input label="Upload Profile" name="photos" type="file" onchange="previewImage(event)" />
                <x-input label="Nama Lengkap" name="name" :value="$user->name ?? ''" placeholder="Masukkan Nama Lengkap" />
                <x-input label="Username" name="username" :value="$user->username ?? ''" placeholder="Masukkan Username" />
                <x-input label="Email" name="email" type="email" :value="$user->email ?? ''" placeholder="Masukkan Email"/>
            </div>

            <div class="form-column">
                <x-input label="No Telepon" name="no_telp" :value="$user->no_telp ?? ''" placeholder="Masukkan No Telpon" />
                <x-input label="Password" name="password" type="password" placeholder="Password" />
                <x-input label="Konfirmasi Password" name="password_confirmation" type="password" placeholder="Konfirmasi Password" />

                <div class="form-action">
                    <x-button>
                        {{ isset($user) ? 'Edit' : 'Tambah' }} {{ ucfirst($role) }}
                    </x-button>
                </div>
            </div>
        </div>
    </form>
</div>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
</div>

@endsection

<script>
function previewImage(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
}
</script>

