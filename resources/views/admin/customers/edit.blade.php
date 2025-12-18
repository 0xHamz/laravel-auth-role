@extends('layouts.admin')

@section('title', 'Edit Customer')

@section('content')
<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Edit Customer</h5>
    </div>
    <div class="card-body">

        <!-- Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="/admin/customers/{{ $customer->id }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ $customer->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="{{ $customer->email }}" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="/admin/customers" class="btn btn-secondary">← Kembali</a>
        </form>

    </div>
</div>
@endsection
