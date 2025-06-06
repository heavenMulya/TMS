<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-card {
      width: 420px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .login-header {
      background-color: #42b72a;
      color: white;
      text-align: center;
      padding: 30px;
      font-size: 2rem;
      font-weight: bold;
    }

    .login-body {
      padding: 60px 30px 100px; /* ⬅️ Increased bottom padding */
    }

    .login-body input.form-control {
      border-radius: 30px;
      height: 50px;
      width: 90%;
      background-color: #eee;
      border: none;
      font-weight: 600;
      margin-bottom: 25px;
      padding-left: 20px;
    }
   

    .forgot-link {
      font-size: 0.9rem;
      text-align: right;
      margin-bottom: 25px;
    }

    .forgot-link a {
      text-decoration: none;
      color: #42b72a;
      font-weight: 500;
    }

    .login-button {
      background-color: #42b72a;
      color: white;
      font-weight: bold;
      border-radius: 30px;
      height: 50px;
      width: 100%;
      border: none;
      font-size: 1rem;
    }

    .login-footer {
      text-align: center;
      padding: 20px 30px 30px;
      font-size: 0.95rem;
    }

    .login-footer a {
      color: #42b72a;
      font-weight: bold;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="login-header">Sign In</div>
    <div class="login-body">
      <form>
        <input type="text" class="form-control" placeholder="Username">
        <input type="password" class="form-control" placeholder="Password">
        <div class="forgot-link">
          <a href="password-reset.php">Forgot <span style="color: #000;">Username</span> / <span>Password?</span></a>
        </div>
        <button type="submit" class="login-button">SIGN IN</button>
      </form>
    </div>
    <div class="login-footer">
      Don’t have an account? <a href="register.php">SIGN UP NOW</a>
    </div>
  </div>

</body>
</html>
