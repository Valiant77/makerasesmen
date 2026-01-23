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
<table style="data-table">
    <thead>
        <th>#</th>
        <th>Nama</th>
        <th>Tanggal Diajukan</th>
        <th>Jam</th>
        <th>Kategori</th>
        <th>Alasan</th>
        <th>Status</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        @foreach ($absenFalse as $af)
        <tr>
            <td>{{ $loop->iteration }}</td>    
            <td>{{ $af->user->name ?? 'N/A' }}</td>
            <td>{{ $af->created_at->format('d-m-Y') ?? 'N/A' }}</td>
            <td>{{ $af->created_at->format('H:i:s') ?? 'N/A'}}</td>
            <td>{{ $af->kategori ?? 'N/A'}}</td>
            <td>{{ $af->alasan ?? 'N/A'}}</td>
            <td>{{ $af->status ?? 'N/A'}}</td>
            <td>
                <form action="{{ route('verifikasi.diterima', $af->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn btn-success" type="submit">Terima</button>
                </form>
                <form action="{{ route('verifikasi.ditolak', $af->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn btn-danger" type="submit">Tolak</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection