<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styling -->
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #002b20, #014d40, #016a52);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-card {
            width: 380px;
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            padding: 30px;
            color: #fff;
        }

        .login-card h3 {
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .login-card p {
            text-align: center;
            font-size: 14px;
            color: #ccc;
            margin-bottom: 25px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            border-radius: 8px;
            color: #fff;
        }

        .form-control::placeholder {
            color: #ddd;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: none;
            color: #fff;
        }

        .btn-login {
            background: #f1c40f;
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-weight: bold;
            width: 100%;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #d4ac0d;
        }

        .form-check-label {
            font-size: 14px;
            color: #ddd;
        }

        .alert {
            font-size: 14px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h3>Welcome Back</h3>
        <p>Sign in to access your dashboard</p>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
            </div>

            <div class="mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>

</body>
</html>
