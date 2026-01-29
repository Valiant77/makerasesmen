@extends('layouts.main')
@section('title', 'Verifikasi Kehadiran')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/content.css') }}">
@endpush

@section('content')

<div class="page-toolbar">
    <x-toolbar.search />
    
    <div class="toolbar-right">
        <x-toolbar.date />
        <x-toolbar.filter />
    </div>
</div>

<div class="table-wrapper">
    <table class="data-table" id="verifikasi-table">
    <thead>
        <th>#</th>
        <th>Nama</th>
        <th>Tanggal Diajukan</th>
        <th>Jam</th>
        <th>Kategori</th>
        <th>Bukti</th>
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
            <td>
                <button class="btn btn-detail" onclick="openModal({{ $af->id }}, '{{ $af->alasan }}', '{{ $af->photo }}', '{{ $af->user->name }}')">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </button>
            </td>
            <td>{{ $af->status ?? 'N/A'}}</td>
            <td>
                <form action="{{ route('verifikasi.diterima', $af->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn btn-success" type="submit">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </form>
                <form action="{{ route('verifikasi.ditolak', $af->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button class="btn btn-danger" type="submit">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </form>
            </td>
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
        if (photos) {
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
</script>
@endpush