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

  .form-card .form-control {
    border-radius: 7px;
    border: 1px solid #e2e8f0;
    font-size: .9rem;
    padding: 8px 12px;
    transition: border-color .15s, box-shadow .15s;
  }

  .form-card .form-control:focus {
    border-color: #1a56db;
    box-shadow: 0 0 0 3px rgba(26, 86, 219, .12);
  }

  .form-card .btn-group-form {
    display: flex;
    gap: 10px;
    margin-top: 1.5rem;
  }
</style>

<div class="form-card">
  <div class="card-title">
    Tạo lớp học mới
  </div>

  <form action="/lophoc/store" method="post">
    <div class="mb-3">
      <label class="form-label" for="MaLop">Mã lớp</label>
      <input type="text" id="MaLop" name="MaLop" class="form-control"
        placeholder="VD: CNTT01" required>
    </div>

    <div class="mb-3">
      <label class="form-label" for="TenLop">Tên lớp</label>
      <input type="text" id="TenLop" name="TenLop" class="form-control"
        placeholder="VD: Lập trình Web" required>
    </div>

    <div class="mb-3">
      <label class="form-label" for="GhiChu">Ghi chú</label>
      <input type="text" id="GhiChu" name="GhiChu" class="form-control"
        placeholder="Ghi chú thêm (nếu có)">
    </div>

    <div class="btn-group-form">
      <button type="submit" class="btn btn-primary" style="border-radius:7px; font-size:.875rem; padding:8px 22px;">
        <i class="bi bi-check-lg me-1"></i> Tạo lớp học
      </button>
      <a href="/lophoc/index" class="btn btn-outline-secondary" style="border-radius:7px; font-size:.875rem; padding:8px 18px;">
        Hủy
      </a>
    </div>
  </form>
</div>