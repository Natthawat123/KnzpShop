<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .co {
            display: flex;
            height: 75vh;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            width: 100%;
            max-width: 400px;
        }
        .login-container h3 {
            color: #007bff;
        }
        .login-container .form-control {
            border-radius: 20px;
        }
        .login-container .btn-primary {
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="co">
    <div class="login-container">
        <form method="post" action="<?= base_url() ?>login/check">
            <h3 class="mb-3 text-center">เข้าสู่ระบบ</h3>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">เข้าสู่ระบบ</button>
            </div>
        </form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
