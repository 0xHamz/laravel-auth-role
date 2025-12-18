@extends('layouts.customer')

@section('title', 'Daftar Video')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Daftar Video</h5>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Judul Video</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>
            <tbody>

            @forelse($videos as $video)
                <tr>
                    <td>{{ $video->title }}</td>
                    <td>
                        <div class="d-flex gap-2">

                            <form method="POST"
                                  action="/customer/videos/{{ $video->id }}/request">
                                @csrf
                                <button class="btn btn-warning btn-sm">
                                    Request Akses
                                </button>
                            </form>

                            <a href="/customer/watch/{{ $video->id }}"
                               class="btn btn-success btn-sm">
                                Tonton
                            </a>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center text-muted">
                        Belum ada video
                    </td>
                </tr>
            @endforelse

            </tbody>
        </table>

        <a href="/customer" class="btn btn-secondary btn-sm">
            ← Kembali ke Dashboard
        </a>

    </div>
</div>

@endsection
