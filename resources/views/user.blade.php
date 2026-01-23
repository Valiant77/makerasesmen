@extends('layouts.main')
@section('title', 'Daftar Pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/content.css') }}">
@endpush

@section('content')

<div class="page-toolbar">
    <x-toolbar.search />
    
    <div class="toolbar-right">
        <x-toolbar.date />
        <x-toolbar.export />
        <x-toolbar.actions />
    </div>
</div>

<div class="table-wrapper">
    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->no_telp }}</td>
                    <td>
                        <a href="{{ route('rekap.show', $user->id) }}" class="btn btn-rekap">
                            <span>Rekap</span>
                        </a>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection