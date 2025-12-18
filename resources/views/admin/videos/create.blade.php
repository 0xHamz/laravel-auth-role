@extends('layouts.admin')

@section('title', 'Tambah Video')

@section('content')
<div class="container mt-4">
    <h2>Tambah Video</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tampilkan pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/admin/videos') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Video</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="video_url" class="form-label">URL Video</label>
            <input type="text" class="form-control" id="video_url" name="video_url" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ url('/admin/videos') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
