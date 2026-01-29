@extends('layouts.main')
@section('title') Rekap {{ $user->name }} @endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/content.css') }}">
@endpush

@section('content')

<div class="page-toolbar">
    <div class="rekap-summary">
    <div class="rekap-user">
        <div class="avatar"><img src="{{ $user->photos ? asset('storage/' . $user->photos) : asset('storage/profile_photos/default.png') }}" alt=""></div>
        <h2>{{ $user->name }}</h2>
    </div>
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
        <x-toolbar.export :routeParams="[$user->id]" />
        <x-toolbar.filter />
    </div>
</div>

<div class="table-wrapper">
    <table class="data-table" id="rekap-table">
    <thead>
        <th>#</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Kategori</th>
        <th>Bukti</th>
        <th>Status</th>
    </thead>
    <tbody>
        @foreach ($absenTrue as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->created_at->format('d-m-Y') ?? 'N/A' }}</td>
            <td>{{ $a->created_at->format('H:i:s') ?? 'N/A' }}</td>
            <td>{{ $a->kategori ?? 'N/A'}}</td>
            <td>
                <button class="btn btn-detail" onclick="openModal({{ $a->id }}, '{{ $a->alasan }}', '{{ $a->photo }}', '{{ $a->user->name }}')">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </button>
            </td>
            <td>{{ $a->status ?? 'N/A' }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>    
</div>

<!-- Popup Modal -->
<div id="detailModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="userName">Detail Alasan</h2>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
            <div class="modal-photo">
                <img id="buktiPhoto" src="" alt="User Photo" style="max-width: 80%; border-radius: 8px;">
            </div>
            <div class="modal-alasan">
                <h4>Alasan:</h4>
                <p id="alasanText"></p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Popup Modal Functions
    function openModal(id, alasan, photos, name) {
        document.getElementById('userName').innerText = 'Detail - ' + name;
        document.getElementById('alasanText').innerText = alasan;
        
        // Set image src with proper URL construction
        if (photos && photos.trim() !== '') {
            document.getElementById('buktiPhoto').src = '{{ asset("storage/absens") }}/' + photos;
        } else {
            document.getElementById('buktiPhoto').src = '{{ asset("storage/absens/default.png") }}';
        }
        
        document.getElementById('detailModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('detailModal').style.display = 'none';
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('detailModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    $(document).ready(function () {
        $('#verifikasi-table').DataTable({
            paging: false,
            searching: false,
            ordering: true,
            info: false,
            autoWidth: false
        });
    });

    $(document).ready(function () {
        $('#rekap-table').DataTable({
            paging: false,
            searching: false,
            ordering: true,
            info: false,
            autoWidth: false
        });
    });
</script>
@endpush