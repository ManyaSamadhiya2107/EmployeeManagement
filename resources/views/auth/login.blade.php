<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Login</title>
<link rel="stylesheet" href="/css/style.css">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f5f5f5;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
}

.login-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    padding: 40px;

}


h2 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-size: 28px;
    font-weight: 600;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

input {
    padding: 12px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}



button {
    padding: 12px 15px;
    background: blue;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
}



.register-link {
    text-align: center;
    margin-top: 20px;
    color: #666;
    font-size: 14px;
}

.register-link a {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.register-link a:hover {
    color: #764ba2;
    text-decoration: underline;
}
</style>
</head>
<body>
<div class="container">
    <div class="login-card">
        <h2>Employee Login</h2>
        <form method="POST" action="/login">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            Don't have an account? <a href="/register">Create Account</a>
        </div>
    </div>
</div>
</body>
</html>
