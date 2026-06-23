<?php
$currentUrl = $_SERVER['REQUEST_URI'] ?? '';
$svActive   = strpos($currentUrl, '/sinhvien') === 0 ? 'active' : '';
$lhActive   = strpos($currentUrl, '/lophoc')   === 0 ? 'active' : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .site-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: var(--nav-height);
      background: var(--nav-bg);
      z-index: 1000;
      display: flex;
      align-items: center;
      padding: 0 1.5rem;
      gap: 1rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, .35);
    }

    .site-brand {
      font-size: 1.15rem;
      font-weight: 700;
      letter-spacing: .04em;
      color: #fff;
      text-decoration: none;
      background: var(--brand-primary);
      padding: 6px 14px;
      border-radius: 6px;
      flex-shrink: 0;
    }

    .site-brand:hover {
      background: var(--brand-primary-dark);
      color: #fff;
    }

    .site-nav {
      margin-left: auto;
      display: flex;
      gap: 4px;
    }

    .site-nav a {
      color: #94a3b8;
      text-decoration: none;
      font-size: .875rem;
      font-weight: 500;
      padding: 7px 14px;
      border-radius: 6px;
      transition: background .15s, color .15s;
    }

    .site-nav a:hover {
      background: #1e293b;
      color: #fff;
    }

    .site-nav a.active {
      background: var(--brand-primary);
      color: #fff;
    }
  </style>
</head>

<body>
  <header class="site-header">
    <a href="/home/index" class="site-brand">QLSV</a>

    <nav class="site-nav">
      <a href="/sinhvien/index" class="<?php echo $svActive; ?>">
        Quản lý sinh viên
      </a>
      <a href="/lophoc/index" class="<?php echo $lhActive; ?>">
        Quản lý lớp học
      </a>
      <a href="/auth/logout"
        onclick="return confirm('Bạn có muốn đăng xuất không?')"
        style="margin-left:8px; background:#fee2e2; color:#dc2626;
                padding:6px 14px; border-radius:6px; font-size:.85rem;
                font-weight:600; text-decoration:none;
                display:inline-flex; align-items:center; gap:5px;">
        <i class="bi bi-box-arrow-right"></i> Đăng xuất
      </a>
    </nav>
  </header>
</body>

</html>