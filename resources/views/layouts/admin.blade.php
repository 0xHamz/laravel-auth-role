@php
use App\Models\VideoRequest;

$pendingRequests = VideoRequest::where('status', 'pending')->count();
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen">

<nav class="bg-gradient-to-r from-slate-900 to-slate-700 shadow-lg">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">

        <a href="/admin" class="text-white text-xl font-bold tracking-wide">
            Admin Panel
        </a>

        <div class="flex items-center gap-6">

            <a href="/admin/customers"
               class="text-gray-300 hover:text-white transition">
                Customer
            </a>

            <a href="/admin/videos"
               class="text-gray-300 hover:text-white transition">
                Video
            </a>

            <!-- 🔔 REQUEST MENU -->
            <a href="/admin/requests"
            class="relative text-gray-300 hover:text-white transition">
                Request
                <span id="request-badge" 
                    class="absolute -top-2 -right-4 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                    {{ $pendingRequests }}
                </span>
            </a>


            <form action="/logout" method="POST">
                @csrf
                <button
                    class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1.5 rounded shadow transition">
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>

<div class="container mx-auto px-4 mt-6">
    <div class="bg-white rounded-xl shadow-md p-6">
        @yield('content')
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function updateRequestBadge() {
    $.get("/admin/requests/count", function(data) {
        let badge = $("#request-badge");
        if(data.count > 0){
            badge.text(data.count);
            badge.show();
        } else {
            badge.hide();
        }
    });
}

// Jalankan pertama kali
updateRequestBadge();

// Update setiap 5 detik
setInterval(updateRequestBadge, 5000);
</script>

</html>
