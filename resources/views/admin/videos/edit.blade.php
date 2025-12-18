@extends('layouts.admin')

@section('title', 'Edit Video')

@section('content')

<div class="max-w-2xl mx-auto mt-5">

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Video</h4>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="/admin/videos/{{ $video->id }}">
                @csrf
                @method('PUT')

                <!-- Judul Video -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Judul</label>
                    <input type="text" name="title" value="{{ $video->title }}" class="form-control" required>
                </div>

                <!-- URL Video -->
                <div class="mb-3">
                    <label class="form-label fw-bold">URL Video</label>
                    <input type="text" name="video_url" value="{{ $video->video_url }}" class="form-control" required>
                </div>

                <!-- Tipe Pemutaran -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Tipe Pemutaran</label>
                    <select name="play_type" class="form-select" required>
                        <option value="embed" {{ $video->play_type === 'embed' ? 'selected' : '' }}>Embed</option>
                        <option value="redirect" {{ $video->play_type === 'redirect' ? 'selected' : '' }}>Redirect (Musik / Film / Trailer)</option>
                    </select>
                </div>

                <!-- Tombol Update -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="/admin/videos" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-success">Update Video</button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
