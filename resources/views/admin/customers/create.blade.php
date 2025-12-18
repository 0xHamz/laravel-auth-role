<!DOCTYPE html>
<html>
<head>
    <title>Tambah Customer</title>
</head>
<body>

<h2>Tambah Customer</h2>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/admin/customers">
    @csrf

    <p>
        <label>Nama</label><br>
        <input type="text" name="name" required>
    </p>

    <p>
        <label>Email</label><br>
        <input type="email" name="email" required>
    </p>

    <p>
        <label>Password</label><br>
        <input type="password" name="password" required>
    </p>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="/admin/customers">← Kembali</a>

</body>
</html>
