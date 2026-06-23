<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>

  <style>
    .login-wrapper {
      min-height: calc(100vh - 58px - 46px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
    }

    .login-card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 4px 24px rgba(0, 0, 0, .10);
      padding: 2.5rem 2rem;
      width: 100%;
      max-width: 400px;
    }

    .login-logo {
      display: flex;
      justify-content: center;
      margin-bottom: 1.75rem;
    }

    .login-logo .brand {
      font-size: 1.6rem;
      font-weight: 800;
      background: #1a56db;
      color: #fff;
      padding: 6px 20px;
      border-radius: 8px;
      letter-spacing: .05em;
    }

    .login-card h2 {
      font-size: 1.1rem;
      font-weight: 700;
      color: #0f172a;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .login-card .form-label {
      font-size: .85rem;
      font-weight: 600;
      color: #475569;
      margin-bottom: .3rem;
    }

    .login-card .form-control {
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      padding: 9px 13px;
      font-size: .9rem;
      transition: border-color .15s, box-shadow .15s;
    }

    .login-card .form-control:focus {
      border-color: #1a56db;
      box-shadow: 0 0 0 3px rgba(26, 86, 219, .12);
      outline: none;
    }

    .btn-login {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      background: #1a56db;
      color: #fff;
      font-size: .95rem;
      font-weight: 600;
      cursor: pointer;
      margin-top: 1.25rem;
      transition: background .15s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }

    .btn-login:hover {
      background: #1240a8;
    }

    .error-box {
      background: #fef2f2;
      border: 1px solid #fecaca;
      border-radius: 8px;
      padding: .65rem 1rem;
      font-size: .85rem;
      color: #b91c1c;
      margin-bottom: 1.25rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }
  </style>
</head>

<body>
  <div class="login-wrapper">
    <div class="login-card">

      <div class="login-logo">
        <span class="brand">QLSV</span>
      </div>

      <h2>Đăng nhập hệ thống</h2>

      <?php if (!empty($error)) : ?>
        <div class="error-box">
          <i class="bi bi-exclamation-circle-fill"></i>
          <?php echo htmlspecialchars($error); ?>
        </div>
      <?php endif; ?>

      <form action="/auth/login" method="post">
        <div class="mb-3">
          <label class="form-label" for="username">Tên đăng nhập</label>
          <input type="text" id="username" name="username"
            class="form-control" placeholder="Nhập tên đăng nhập"
            required autofocus>
        </div>

        <div class="mb-3">
          <label class="form-label" for="password">Mật khẩu</label>
          <input type="password" id="password" name="password"
            class="form-control" placeholder="Nhập mật khẩu"
            required>
        </div>

        <button type="submit" class="btn-login">
          <i class="bi bi-box-arrow-in-right"></i> Đăng nhập
        </button>
      </form>

    </div>
  </div>
</body>

</html>