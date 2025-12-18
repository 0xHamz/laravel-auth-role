@extends('layouts.admin')

@section('title', 'Data Video')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-semibold">📹 Data Video</h5>
        <a href="/admin/videos/create" class="btn btn-primary btn-sm">
            + Tambah Video
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Judul</th>
                        <th>URL Video</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($videos as $video)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $video->title }}</td>
                        <td>
                            <a href="{{ $video->video_url }}"
                               target="_blank"
                               class="text-decoration-none text-primary">
                                {{ Str::limit($video->video_url, 40) }}
                            </a>
                        </td>
                        <td>
                            <a href="/admin/videos/{{ $video->id }}/edit"
                               class="btn btn-warning btn-sm">
                                ✏️ Edit
                            </a>

                            <form method="POST"
                                  action="/admin/videos/{{ $video->id }}"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus video ini?')">
                                    🗑 Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Belum ada data video
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <a href="/admin" class="btn btn-secondary btn-sm mt-3">
            ← Kembali ke Dashboard
        </a>

    </div>
</div>

@endsection
