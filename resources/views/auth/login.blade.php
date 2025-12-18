<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome untuk icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>
    body {
        background: linear-gradient(to right, #4f46e5, #3b82f6);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
    }

    .login-card {
        background: #fff;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        width: 100%;
        max-width: 420px;
        position: relative;
    }

    .login-card h2 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: 700;
        color: #1e293b;
    }

    .login-card .form-control {
        padding-left: 40px;
    }

    .login-card .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
    }

    .alert {
        animation: fadeIn 0.5s ease forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px);}
        to { opacity: 1; transform: translateY(0);}
    }

    .logo {
        display: block;
        margin: 0 auto 20px auto;
        width: 80px;
        height: 80px;
    }

    /* Hover effect tombol */
    .btn-primary {
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #3b82f6;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    /* Show/Hide password icon */
    .password-wrapper {
        position: relative;
    }
    .toggle-password {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6b7280;
    }
</style>
</head>
<body>

<div class="login-card position-relative">

    <!-- Logo -->
    <img src="https://www.freeiconspng.com/uploads/user-login-icon-29.png?text=LOGO" alt="Logo" class="logo">

    <h2>Login</h2>

    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/login" id="loginForm">
        @csrf

        <!-- Email -->
        <div class="mb-3 position-relative">
            <i class="fas fa-envelope input-icon"></i>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
        </div>

        <!-- Password -->
        <div class="mb-3 password-wrapper">
            <i class="fas fa-lock input-icon"></i>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

    // Show/Hide password
    $("#togglePassword").click(function(){
        let passwordField = $("#password");
        let type = passwordField.attr("type") === "password" ? "text" : "password";
        passwordField.attr("type", type);

        $(this).toggleClass("fa-eye fa-eye-slash");
    });

    // Validasi realtime sebelum submit
    $("#loginForm").submit(function(e){
        let email = $("#email").val().trim();
        let password = $("#password").val().trim();

        if(email === "" || password === ""){
            e.preventDefault();
            if($(".alert").length === 0){
                $(this).before('<div class="alert alert-danger text-center">Email dan Password wajib diisi</div>');
            }
        }
    });

});
</script>

</body>
</html>
