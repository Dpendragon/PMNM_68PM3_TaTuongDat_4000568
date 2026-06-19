<style>
  .form-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
    padding: 2rem;
    max-width: 560px;
  }

  .form-card .card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 1.5rem;
    padding-bottom: .75rem;
    border-bottom: 2px solid #e2e8f0;
  }

  .form-card .form-label {
    font-size: .85rem;
    font-weight: 600;
    color: #475569;
    margin-bottom: .3rem;
  }

  .form-card .form-control,
  .form-card .form-select {
    border-radius: 7px;
    border: 1px solid #e2e8f0;
    font-size: .9rem;
    padding: 8px 12px;
    transition: border-color .15s, box-shadow .15s;
  }

  .form-card .form-control:focus,
  .form-card .form-select:focus {
    border-color: #1a56db;
    box-shadow: 0 0 0 3px rgba(26, 86, 219, .12);
    outline: none;
  }

  .form-card .btn-group-form {
    display: flex;
    gap: 10px;
    margin-top: 1.5rem;
  }

  .alert-errors {
    background: #fef2f2;
    border: 1px solid #fecaca;
    border-radius: 8px;
    padding: .75rem 1rem;
    margin-bottom: 1.25rem;
    font-size: .85rem;
    color: #b91c1c;
  }

  .alert-errors ul {
    margin: 0;
    padding-left: 1.25rem;
  }
</style>

<div class="form-card">
  <div class="card-title">
    <i class="bi bi-person-plus me-2" style="color:#1a56db"></i>Tạo sinh viên mới
  </div>

  <?php if (!empty($errors)) : ?>
    <div class="alert-errors">
      <ul>
        <?php foreach ($errors as $err) : ?>
          <li><?php echo htmlspecialchars($err); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="/sinhvien/store" method="post">

    <div class="mb-3">
      <label class="form-label" for="MSSV">
        Mã số sinh viên <span style="color:#e11d48">*</span>
      </label>
      <input type="text" id="MSSV" name="MSSV" class="form-control"
        placeholder="VD: SV001"
        value="<?php echo htmlspecialchars($old['MSSV'] ?? ''); ?>"
        required>
    </div>

    <div class="mb-3">
      <label class="form-label" for="HoTen">
        Họ và tên <span style="color:#e11d48">*</span>
      </label>
      <input type="text" id="HoTen" name="HoTen" class="form-control"
        placeholder="VD: Nguyễn Văn A"
        value="<?php echo htmlspecialchars($old['HoTen'] ?? ''); ?>"
        required>
    </div>

    <div class="mb-3">
      <label class="form-label" for="GioiTinh">
        Giới tính <span style="color:#e11d48">*</span>
      </label>
      <select id="GioiTinh" name="GioiTinh" class="form-select" required>
        <option value="" disabled <?php echo empty($old['GioiTinh']) ? 'selected' : ''; ?>>
          -- Chọn giới tính --
        </option>
        <?php foreach (['Nam', 'Nữ', 'Khác'] as $gt) : ?>
          <option value="<?php echo $gt; ?>"
            <?php echo (($old['GioiTinh'] ?? '') === $gt) ? 'selected' : ''; ?>>
            <?php echo $gt; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label" for="MaLop">
        Lớp học <span style="color:#e11d48">*</span>
      </label>
      <select id="MaLop" name="MaLop" class="form-select" required>
        <option value="" disabled <?php echo empty($old['MaLop']) ? 'selected' : ''; ?>>
          -- Chọn lớp học --
        </option>
        <?php foreach ($lophocs as $lh) : ?>
          <option value="<?php echo htmlspecialchars($lh['MaLop']); ?>"
            <?php echo (($old['MaLop'] ?? '') === $lh['MaLop']) ? 'selected' : ''; ?>>
            <?php echo htmlspecialchars($lh['MaLop'] . ' — ' . $lh['TenLop']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="btn-group-form">
      <button type="submit" class="btn btn-primary"
        style="border-radius:7px; font-size:.875rem; padding:8px 22px;">
        <i class="bi bi-check-lg me-1"></i> Tạo sinh viên
      </button>
      <a href="/sinhvien/index" class="btn btn-outline-secondary"
        style="border-radius:7px; font-size:.875rem; padding:8px 18px;">
        Hủy
      </a>
    </div>

  </form>
</div>