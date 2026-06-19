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
    justify-content: space-between;
    flex-wrap: wrap;
    gap: .6rem;
    margin-bottom: 1rem;
  }

  .search-form {
    display: flex;
    gap: 6px;
  }

  .search-form input[type="text"] {
    border: 1px solid #e2e8f0;
    border-radius: 7px;
    padding: 7px 12px;
    font-size: .875rem;
    width: 240px;
    outline: none;
    transition: border-color .15s, box-shadow .15s;
  }

  .search-form input[type="text"]:focus {
    border-color: #1a56db;
    box-shadow: 0 0 0 3px rgba(26, 86, 219, .12);
  }

  .search-form button {
    border: none;
    border-radius: 7px;
    padding: 7px 14px;
    font-size: .875rem;
    background: #1a56db;
    color: #fff;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: background .15s;
  }

  .search-form button:hover {
    background: #1240a8;
  }

  .search-badge {
    font-size: .8rem;
    color: #64748b;
    background: #f1f5f9;
    border-radius: 6px;
    padding: 4px 10px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .search-badge a {
    color: #dc2626;
    text-decoration: none;
    font-weight: 600;
  }

  .search-badge a:hover {
    text-decoration: underline;
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
    transition: opacity .15s;
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

<!-- Tiêu đề trang -->
<div class="page-title">
  <span><?php echo htmlspecialchars($title); ?></span>
</div>

<!-- Thanh công cụ: ô tìm kiếm + nút Thêm -->
<div class="toolbar">

  <!-- Form tìm kiếm -->
  <form class="search-form" action="/lophoc/index" method="get">
    <input
      type="text"
      name="search"
      placeholder="Tìm theo mã, tên lớp"
      value="<?php echo htmlspecialchars($search); ?>">
    <button type="submit">
      <i class="bi bi-search"></i> Tìm
    </button>
  </form>

  <a href="/lophoc/create" class="btn btn-primary btn-sm"
    style="font-size:.85rem; border-radius:7px; padding:7px 16px;">
    <i class="bi bi-plus-lg me-1"></i> Thêm lớp học
  </a>
</div>

<!-- Badge hiển thị khi đang lọc -->
<?php if ($search !== '') : ?>
  <div style="margin-bottom:.75rem;">
    <span class="search-badge">
      <i class="bi bi-funnel-fill"></i>
      Kết quả cho: <strong><?php echo htmlspecialchars($search); ?></strong>
      &nbsp;—&nbsp;
      <a href="/lophoc/index">✕ Xoá bộ lọc</a>
    </span>
  </div>
<?php endif; ?>

<!-- Bảng dữ liệu -->
<div class="data-card">
  <table class="data-table">
    <thead>
      <tr>
        <th style="width:56px">STT</th>
        <th>Mã Lớp</th>
        <th>Tên Lớp</th>
        <th>Ghi chú</th>
        <th style="width:130px">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($lophocs as $index => $lophoc) : ?>
        <tr>
          <td><?php echo $offset + $index + 1; ?></td>
          <td><?php echo htmlspecialchars($lophoc['MaLop']); ?></td>
          <td><?php echo htmlspecialchars($lophoc['TenLop']); ?></td>
          <td><?php echo htmlspecialchars($lophoc['GhiChu']); ?></td>
          <td>
            <div class="action-btns">
              <a href="/lophoc/edit/<?php echo $lophoc['id']; ?>" class="btn-edit">
                <i class="bi bi-pencil"></i> Sửa
              </a>
              <form class="delete-form"
                action="/lophoc/delete/<?php echo $lophoc['id']; ?>" method="post"
                onsubmit="return confirm('Xóa lớp học này?')">
                <button type="submit" class="btn-delete">
                  <i class="bi bi-trash"></i> Xóa
                </button>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>

      <?php if (empty($lophocs)) : ?>
        <tr>
          <td colspan="5" style="text-align:center; padding:2rem; color:#94a3b8;">
            <?php echo ($search !== '') ? 'Không tìm thấy kết quả nào.' : 'Chưa có dữ liệu lớp học.'; ?>
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <!-- Phân trang -->
  <?php if ($totalPages > 1) : ?>
    <div class="pagination-wrap">
      <?php for ($i = 1; $i <= $totalPages; $i++) :
        $pageOffset = ($i - 1) * $pageSize;
        $isCurrent  = ($pageOffset == $offset) ? 'current' : '';
        $searchParam = ($search !== '') ? '?search=' . urlencode($search) : '';
      ?>
        <a href="/lophoc/index/<?php echo $pageSize; ?>/<?php echo $pageOffset; ?><?php echo $searchParam; ?>"
          class="page-btn <?php echo $isCurrent; ?>">
          <?php echo $i; ?>
        </a>
      <?php endfor; ?>
    </div>
  <?php endif; ?>
</div>