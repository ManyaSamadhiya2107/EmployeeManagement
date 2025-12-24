<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login - Employee Management</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #e8d5f2 0%, #f3d7e8 100%);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.admin-container {
    width: 100%;
    max-width: 500px;
}

.admin-header {
    text-align: center;
    margin-bottom: 30px;
    animation: slideDown 0.5s ease-out;
}



.admin-title {
    background: white;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);

}

.admin-title h2 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
    font-weight: 600;
}

.admin-title p {
    font-size: 14px;
    color: #666;
    line-height: 1.5;
}

.admin-login-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    padding: 40px;

}

.admin-login-card h3 {
    text-align: center;
    font-size: 28px;
    color: #333;
    margin-bottom: 30px;
    font-weight: 700;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: 500;
    font-size: 14px;
}

.form-group input {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 6px;
    font-size: 14px;
    transition: all 0.3s ease;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.form-group input:focus {
    outline: none;
    border-color: #667eea;
    background-color: #f8f9ff;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.form-group input::placeholder {
    color: #999;
}

.login-btn {
    width: 100%;
    padding: 13px 15px;
    background: blue;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 10px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}




.error-message {
    background-color: #fee;
    color: #c33;
    padding: 12px 15px;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 14px;
    border-left: 4px solid #c33;
    display: none;
}

.error-message.show {
    display: block;
    animation: slideDown 0.3s ease-out;
}

.success-message {
    background-color: #efe;
    color: #3c3;
    padding: 12px 15px;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 14px;
    border-left: 4px solid #3c3;
    display: none;
}

.success-message.show {
    display: block;
    animation: slideDown 0.3s ease-out;
}

.form-footer {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #666;
}

.form-footer a {
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.form-footer a:hover {
    color: #764ba2;
    text-decoration: underline;
}


@media (max-width: 600px) {
    .admin-login-card {
        padding: 30px 20px;
    }

    .admin-login-card h3 {
        font-size: 24px;
        margin-bottom: 25px;
    }

    .admin-header {
        margin-bottom: 20px;
    }
}
</style>
</head>
<body>

<div class="admin-container">




    <div class="admin-login-card">
        <h3>Admin Login</h3>

        @if($errors->any())
            <div class="error-message show">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="success-message show">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/admin/login">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                    value="{{ old('email') }}"
                    autofocus
                >
                @error('email')
                    <span style="color: #c33; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >
                @error('password')
                    <span style="color: #c33; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="form-footer">
            Not an admin? <a href="/login">User Login</a>
        </div>
    </div>
</div>

</body>
</html>
