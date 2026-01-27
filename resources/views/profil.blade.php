@extends('layouts.main')
@section('title', 'Profil Saya')

@section('content')

<div class="content-container profile-page">
    <div class="profile-card">
        <div class="avatar2">
            <img src="{{ $admin->photos ? asset('storage/' . $admin->photos) : asset('images/default-avatar.png') }}" alt="">
        </div>

        <ul class="profile-info">
            <li><span>Nama</span><span>{{ auth()->user()->name }}</span></li>
            <li><span>Username</span><span>{{ auth()->user()->username }}</span></li>
            <li><span>Email</span><span>{{ auth()->user()->email }}</span></li>
            <li><span>No Telepon</span><span>{{ auth()->user()->no_telp }}</span></li>
        </ul>

        <div class="profile-actions">
            <a href="{{ route('user.edit', auth()->user()->id) }}" class="btn btn-edit">
                Edit Profil
            </a>
            <a href="{{ route('admin.create') }}" class="btn btn-tambah">
                Tambah Admin
            </a>
        </div>
    </div>
</div>
@endsection