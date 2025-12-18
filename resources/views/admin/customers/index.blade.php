@extends('layouts.admin')

@section('title', 'Data Customer')

@section('content')

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Customer</h5>
        <a href="/admin/customers/create" class="btn btn-primary btn-sm">
            + Tambah Customer
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($customers as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->email }}</td>
                    <td>
                        <a href="/admin/customers/{{ $c->id }}/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form method="POST"
                              action="/admin/customers/{{ $c->id }}"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus customer ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
