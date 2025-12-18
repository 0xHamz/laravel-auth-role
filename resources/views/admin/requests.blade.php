@extends('layouts.admin')

@section('title', 'Permintaan Akses Video')

@section('content')

{{-- Tabel Request Aktif --}}
<div class="card shadow-sm mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Permintaan Akses Video Aktif</h5>
    </div>
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Customer</th>
                        <th>Video</th>
                        <th style="width:150px;">Durasi (Jam)</th>
                        <th style="width:200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requests as $r)
                        <tr>
                            <td>{{ $r->user->name }}</td>
                            <td>{{ $r->video->title }}</td>
                            <td>
                                <form method="POST" action="/admin/requests/{{ $r->id }}/approve" class="d-flex gap-2">
                                    @csrf
                                    <input type="number" name="hours" min="1" class="form-control form-control-sm" placeholder="Jam" value="{{ $r->duration_hours ?? 1 }}" required>
                            </td>
                            <td>
                                    <button class="btn btn-success btn-sm w-50">Approve</button>
                                </form>
                                <form method="POST" action="/admin/requests/{{ $r->id }}/revoke" class="d-inline mt-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm w-50" onclick="return confirm('Nonaktifkan izin customer?')">Revoke</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada permintaan aktif</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{-- Tabel Riwayat Approve/Revoke --}}
<div class="card shadow-sm">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">Riwayat Approve / Revoke</h5>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Customer</th>
                        <th>Video</th>
                        <th style="width:150px;">Durasi (Jam)</th>
                        <th>Status</th>
                        <th style="width:150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody">
                    @forelse($history as $h)
                        <tr>
                            <td>{{ $h->user->name }}</td>
                            <td>{{ $h->video->title }}</td>
                            <td>
                                @if($h->status === 'approved')
                                    <form method="POST" action="/admin/requests/{{ $h->id }}/update-duration" class="d-flex gap-1">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="hours" min="1" class="form-control form-control-sm" value="{{ $h->duration_hours ?? 1 }}" required>
                                        <button class="btn btn-primary btn-sm">Update</button>
                                    </form>
                                @else
                                    {{ $h->duration_hours ?? '-' }}
                                @endif
                            </td>
                            <td>
                                @if($h->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($h->status === 'revoked')
                                    <span class="badge bg-danger">Revoked</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ ucfirst($h->status) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($h->status === 'approved')
                                    <form method="POST" action="/admin/requests/{{ $h->id }}/revoke">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm w-100" onclick="return confirm('Revoke akses ini?')">Revoke</button>
                                    </form>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada riwayat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="/admin" class="btn btn-secondary mt-3">← Dashboard</a>

    </div>
</div>


@endsection