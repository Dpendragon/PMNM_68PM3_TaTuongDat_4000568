<style>
  .page-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 1.25rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: .75rem;
  }

  .toolbar {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-wrap: wrap;
    gap: .6rem;
    margin-bottom: 1rem;
  }

  .data-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
    overflow: hidden;
  }

  .data-table {
    width: 100%;
    border-collapse: collapse;
    font-size: .875rem;
  }

  .data-table thead th {
    background: #1a56db;
    color: #fff;
    font-weight: 600;
    padding: 11px 14px;
    text-align: left;
    white-space: nowrap;
  }

  .data-table tbody tr {
    border-bottom: 1px solid #f1f5f9;
    transition: background .12s;
  }

  .data-table tbody tr:last-child {
    border-bottom: none;
  }

  .data-table tbody tr:hover {
    background: #f8faff;
  }

  .data-table td {
    padding: 10px 14px;
    vertical-align: middle;
    color: #334155;
  }

  .data-table td:first-child {
    color: #94a3b8;
    font-size: .8rem;
    font-weight: 600;
  }

  .action-btns {
    display: flex;
    gap: 6px;
  }

  .btn-edit,
  .btn-delete {
    border: none;
    padding: 5px 13px;
    border-radius: 5px;
    font-size: .8rem;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: background .15s;
  }

  .btn-edit {
    background: #dbeafe;
    color: #1a56db;
  }

  .btn-delete {
    background: #fee2e2;
    color: #dc2626;
  }

  .btn-edit:hover {
    background: #bfdbfe;
    color: #1240a8;
  }

  .btn-delete:hover {
    background: #fecaca;
    color: #b91c1c;
  }

  form.delete-form {
    margin: 0;
    padding: 0;
    display: inline;
  }

  .pagination-wrap {
    padding: 14px 16px;
    border-top: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .page-btn {
    min-width: 34px;
    height: 34px;
    border-radius: 6px;
    border: 1px solid #e2e8f0;
    background: #fff;
    color: #475569;
    font-size: .82rem;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: background .12s, color .12s, border-color .12s;
  }

  .page-btn:hover {
    background: #eff6ff;
    border-color: #1a56db;
    color: #1a56db;
  }

  .page-btn.current {
    background: #1a56db;
    border-color: #1a56db;
    color: #fff;
  }
</style>

<div class="page-title">
  <span><?php echo htmlspecialchars($title); ?></span>
</div>

<div class="toolbar">
  <a href="/sinhvien/create" class="btn btn-primary btn-sm"
    style="font-size:.85rem; border-radius:7px; padding:7px 16px;">
    <i class="bi bi-plus-lg me-1"></i> Thêm sinh viên
  </a>
</div>

<div class="data-card">
  <table class="data-table">
    <thead>
      <tr>
        <th style="width:52px">STT</th>
        <th>MSSV</th>
        <th>Họ Tên</th>
        <th>Giới Tính</th>
        <th>Lớp Học</th>
        <th style="width:140px">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($sinhviens as $index => $sv) : ?>
        <tr>
          <td><?php echo $offset + $index + 1; ?></td>
          <td><?php echo htmlspecialchars($sv['MSSV']); ?></td>
          <td><?php echo htmlspecialchars($sv['HoTen']); ?></td>
          <td><?php echo htmlspecialchars($sv['GioiTinh']); ?></td>
          <td>
            <?php
            $tenLop = $sv['TenLop'] ?? '';
            echo $tenLop !== ''
              ? htmlspecialchars($tenLop)
              : '<span style="color:#94a3b8;font-style:italic">'
              . htmlspecialchars($sv['MaLop'] ?? '—') . '</span>';
            ?>
          </td>
          <td>
            <div class="action-btns">
              <a href="/sinhvien/edit/<?php echo $sv['id']; ?>" class="btn-edit">
                <i class="bi bi-pencil"></i> Sửa
              </a>
              <form class="delete-form"
                action="/sinhvien/delete/<?php echo $sv['id']; ?>" method="post"
                onsubmit="return confirm('Xóa sinh viên này?')">
                <button type="submit" class="btn-delete">
                  <i class="bi bi-trash"></i> Xóa
                </button>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>

      <?php if (empty($sinhviens)) : ?>
        <tr>
          <td colspan="6" style="text-align:center; padding:2rem; color:#94a3b8;">
            Chưa có dữ liệu sinh viên.
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <?php if ($totalPages > 1) : ?>
    <div class="pagination-wrap">
      <?php for ($i = 1; $i <= $totalPages; $i++) :
        $pageOffset = ($i - 1) * $pageSize;
        $isCurrent  = ($pageOffset == $offset) ? 'current' : '';
      ?>
        <a href="/sinhvien/index/<?php echo $pageSize; ?>/<?php echo $pageOffset; ?>"
          class="page-btn <?php echo $isCurrent; ?>"><?php echo $i; ?></a>
      <?php endfor; ?>
    </div>
  <?php endif; ?>
</div>