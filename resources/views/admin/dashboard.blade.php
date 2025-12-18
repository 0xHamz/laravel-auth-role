@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<h4 class="mb-4 fw-semibold">Dashboard</h4>

<div class="row g-4">

    <!-- Total Customer -->
    <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            class="bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M5.5 3a2.5 2.5 0 1 1 5 0 2.5 2.5 0 0 1-5 0z" />
                            <path
                                d="M2 13s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H2z" />
                        </svg>
                    </div>
                </div>

                <div>
                    <p class="mb-1 text-muted">Total Customer</p>
                    <h3 class="mb-0 fw-bold">
                        {{ \App\Models\User::where('role','customer')->count() }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Video -->
    <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            class="bi bi-camera-video" viewBox="0 0 16 16">
                            <path
                                d="M0 5a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5z" />
                            <path
                                d="M15 8.5l-4 2.5V6l4 2.5z" />
                        </svg>
                    </div>
                </div>

                <div>
                    <p class="mb-1 text-muted">Total Video</p>
                    <h3 class="mb-0 fw-bold">
                        {{ \App\Models\Video::count() }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
