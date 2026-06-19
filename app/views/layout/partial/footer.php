<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .site-footer {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: var(--footer-height);
      background: var(--nav-bg);
      color: #64748b;
      font-size: .78rem;
      display: flex;
      align-items: center;
      justify-content: center;
      letter-spacing: .01em;
      z-index: 1000;
    }

    .site-footer span {
      color: #94a3b8;
    }
  </style>
</head>

<body>
  <footer class="site-footer">
    <span>&copy; <?php echo date("Y"); ?> Hệ thống quản lý Sinh viên &mdash; PMNM_68PM3 &mdash; Tạ Tương Đạt</span>
  </footer>
</body>

</html>