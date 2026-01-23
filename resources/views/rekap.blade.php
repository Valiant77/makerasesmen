@extends('layouts.main')
@section('title', 'Rekap Pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/content.css') }}">
@endpush

@section('content')

<div class="page-toolbar rekap-toolbar">
    <div class="summary-card">
    <div class="rekap-user">
        <h2>{{ $user->name }}</h2>
    </div>
    </div>

    <div class="rekap-summary">
        <div class="summary-card hadir">
            <span class="label">Hadir</span>
            <span class="value">{{ $totalHadirSeluruh }}</span>
        </div>

        <div class="summary-card tidak-hadir">
            <span class="label">Tidak Hadir</span>
            <span class="value">{{ $totalTidakHadirSeluruh }}</span>
        </div>
    </div>

    <div class="toolbar-right">
        <x-toolbar.date />
        <x-toolbar.export />
        <x-toolbar.filter />
    </div>
</div>

<div class="table-wrapper">
    <table class="data-table">
    <thead>
        <th>#</th>
        <th>Tanggal</th>
        <th>Kategori</th>
        <th>Alasan</th>
        <th>Jam</th>
    </thead>
    <tbody>
        @foreach ($absenTrue as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->created_at->format('d-m-Y') ?? 'N/A' }}</td>
            <td>{{ $a->kategori ?? 'N/A'}}</td>
            <td>{{ $a->alasan ?? 'N/A'}}</td>
            <td>{{ $a->created_at->format('H:i:s') ?? 'N/A' }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>    
</div>


@endsection