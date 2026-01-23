@extends('layouts.main')
@section('title', 'Form Pengguna')

@section('content')

<div class="content-container">
    <form method="POST"
          action="{{ isset($user) ? route($user->role . '.update', $user->id) : route($role . '.store') }}">
        @csrf
        @isset($user)
            @method('PUT')
        @endisset

        <div class="form-grid">
            <div class="form-column">
                <x-input label="Nama Lengkap" name="name" :value="$user->name ?? ''" />
                <x-input label="Username" name="username" :value="$user->username ?? ''" />
                <x-input label="Email" name="email" type="email" :value="$user->email ?? ''" />
                <x-input label="No Telepon" name="no_telp" :value="$user->no_telp ?? ''" />
            </div>

            <div class="form-column">
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
