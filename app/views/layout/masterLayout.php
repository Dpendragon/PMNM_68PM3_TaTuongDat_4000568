<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?> — QLSV</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    :root {
      --brand-primary: #1a56db;
      --brand-primary-dark: #1240a8;
      --nav-bg: #0f172a;
      --nav-height: 58px;
      --footer-height: 46px;
      --body-bg: #f1f5f9;
      --card-radius: 10px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: var(--body-bg);
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      color: #1e293b;
      padding-top: var(--nav-height);
      padding-bottom: calc(var(--footer-height) + 16px);
      min-height: 100vh;
    }

    .page-wrapper {
      max-width: 1100px;
      margin: 0 auto;
      padding: 2rem 1.5rem;
    }
  </style>
</head>

<body>

  <?php require_once '../app/views/layout/partial/header.php'; ?>

  <main>
    <div class="page-wrapper">
      <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>
  </main>

  <?php require_once '../app/views/layout/partial/footer.php'; ?>

</body>

</html>