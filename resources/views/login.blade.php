@extends('layouts.auth')
@section('title', 'Login')
@section('content')

<div class="auth-card">
 <h2 class="auth-title">Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <x-input
            label="Email"
            name="email"
            type="email"
            placeholder="Masukkan email"
        />

        <x-input
            label="password"
            name="password"
            type="password"
            placeholder="Masukkan password"
        />

        <div class="">
            <x-button>
                Masuk
            </x-button>
        </div>
    </form>
</div>
@endsection
