@extends('layouts.customer')

@section('content')

<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 75vh">

    <div class="card shadow-lg border-0 rounded-4 p-4"
         style="max-width: 420px; width:100%;
                background: linear-gradient(135deg, #f8f9fa, #ffffff);">

        <div class="card-body text-center">

            <!-- Icon -->
            <div class="mb-3">
                <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex
                            align-items-center justify-content-center"
                     style="width:70px;height:70px">
                    <span class="fs-2 text-primary">🎬</span>
                </div>
            </div>

            <h4 class="fw-bold mb-2">Selamat Datang</h4>
            <p class="text-muted mb-4">
                Akses dan tonton video yang telah disetujui oleh admin
            </p>

            <a href="/customer/videos"
               class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
                Lihat Daftar Video
            </a>

        </div>
    </div>

</div>

@endsection
