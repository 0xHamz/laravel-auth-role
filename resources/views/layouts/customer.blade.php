<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Customer')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-100 to-slate-200 min-h-screen">

<!-- Navbar -->
<nav class="bg-white/80 backdrop-blur-md shadow-sm border-b">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="/customer"
               class="text-xl font-semibold text-slate-800 hover:text-indigo-600 transition">
                🎬 Video Access
            </a>

            <!-- Menu -->
            <div class="flex items-center gap-4">
                <a href="/customer/videos"
                   class="text-slate-600 hover:text-indigo-600 transition">
                    Daftar Video
                </a>

                <form action="/logout" method="POST">
                    @csrf
                    <button
                        class="px-4 py-1.5 rounded-lg text-sm
                               border border-red-500 text-red-500
                               hover:bg-red-500 hover:text-white
                               transition">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mx-auto px-4 mt-6">
    <div class="bg-white rounded-xl shadow-md p-6">
        @yield('content')
    </div>
</div>

</body>
</html>
