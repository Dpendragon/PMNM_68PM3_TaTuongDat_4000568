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

  .toolbar-left {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
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

  .pagesize-form {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: .85rem;
    color: #64748b;
  }

  .pagesize-form select {
    border: 1px solid #e2e8f0;
    border-radius: 7px;
    padding: 6px 10px;
    font-size: .85rem;
    color: #334155;
    background: #fff;
    cursor: pointer;
    outline: none;
    transition: border-color .15s;
  }

  .pagesize-form select:focus {
    border-color: #1a56db;
    box-shadow: 0 0 0 3px rgba(26, 86, 219, .12);
  }

  /* badge */
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

  /* table */
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

  .sort-link {
    color: #fff;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    user-select: none;
  }

  .sort-link:hover {
    color: #dbeafe;
  }

  .sort-icon {
    font-size: .75rem;
    opacity: .45;
    transition: opacity .15s;
  }

  .sort-icon.active {
    opacity: 1;
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

  /* pagination */
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

<?php
function buildQuery(string $search, int $pageSize, string $sortBy, string $sortDir, array $overrides = [])
{
  $params = [];
  if (!empty($search))    $params['search']   = $search;
  if ($pageSize !== 5)    $params['pageSize']  = $pageSize;
  if ($sortBy !== 'id') {
    $params['sortBy']  = $sortBy;
    $params['sortDir'] = $sortDir;
  }

  foreach ($overrides as $k => $v) {
    if ($v !== null) $params[$k] = $v;
    else unset($params[$k]);
  }
  return empty($params) ? '' : '?' . http_build_query($params);
}

function sortUrl(string $col, string $curSortBy, string $curSortDir, string $search, int $pageSize)
{
  $nextDir = ($curSortBy === $col && $curSortDir === 'ASC') ? 'DESC' : 'ASC';
  return '/sinhvien/index' . buildQuery($search, $pageSize, $col, $nextDir);
}

function sortIcon(string $col, string $curSortBy, string $curSortDir)
{
  if ($curSortBy !== $col) {
    return '<i class="bi bi-arrow-down-up sort-icon"></i>';
  }
  $icon = ($curSortDir === 'ASC') ? 'bi-arrow-up' : 'bi-arrow-down';
  return "<i class=\"bi $icon sort-icon active\"></i>";
}

?>

<div class="page-title">
  <span><?php echo htmlspecialchars($title); ?></span>
</div>

<div class="toolbar">
  <div class="toolbar-left">
    <!-- Search -->
    <form class="search-form" action="/sinhvien/index" method="get">
      <?php if ($pageSize !== 5) : ?>
        <input type="hidden" name="pageSize" value="<?php echo $pageSize; ?>">
      <?php endif; ?>
      <?php if ($sortBy !== 'id') : ?>
        <input type="hidden" name="sortBy" value="<?php echo htmlspecialchars($sortBy); ?>">
        <input type="hidden" name="sortDir" value="<?php echo htmlspecialchars($sortDir); ?>">
      <?php endif; ?>
      <input
        type="text"
        name="search"
        placeholder="Tìm theo MSSV, Họ Tên, Lớp"
        value="<?php echo htmlspecialchars($search); ?>">
      <button type="submit">
        <i class="bi bi-search"></i> Tìm
      </button>
    </form>

    <!-- PageSize selector -->
    <form class="pagesize-form" action="/sinhvien/index" method="get">
      <?php if ($search !== '') : ?>
        <input type="hidden" name="search" value="<?php echo htmlspecialchars($search); ?>">
      <?php endif; ?>
      <?php if ($sortBy !== 'id') : ?>
        <input type="hidden" name="sortBy" value="<?php echo htmlspecialchars($sortBy); ?>">
        <input type="hidden" name="sortDir" value="<?php echo htmlspecialchars($sortDir); ?>">
      <?php endif; ?>
      <label for="pageSize">Hiển thị</label>
      <select id="pageSize" name="pageSize" onchange="this.form.submit()">
        <?php foreach ($allowedPageSizes as $size) : ?>
          <option value="<?php echo $size; ?>" <?php echo ($size === $pageSize) ? 'selected' : ''; ?>>
            <?php echo $size; ?>
          </option>
        <?php endforeach; ?>
      </select>
      <span>dòng</span>
    </form>
  </div>

  <a href="/sinhvien/create" class="btn btn-primary btn-sm"
    style="font-size:.85rem; border-radius:7px; padding:7px 16px;">
    <i class="bi bi-plus-lg me-1"></i> Thêm sinh viên
  </a>
</div>

<!-- Badge khi đang lọc -->
<?php if ($search !== '') : ?>
  <div style="margin-bottom:.75rem;">
    <span class="search-badge">
      <i class="bi bi-funnel-fill"></i>
      Kết quả cho: <strong><?php echo htmlspecialchars($search); ?></strong>
      &nbsp;—&nbsp;
      <a href="/sinhvien/index<?php echo buildQuery($search, $pageSize, $sortBy, $sortDir, ['search' => null]); ?>">✕ Xoá bộ lọc</a>
    </span>
  </div>
<?php endif; ?>

<!-- Bảng -->
<div class="data-card">
  <table class="data-table">
    <thead>
      <tr>
        <th style="width:52px">STT</th>
        <th>
          <a class="sort-link" href="<?php echo sortUrl('MSSV', $sortBy, $sortDir, $search, $pageSize); ?>">
            MSSV <?php echo sortIcon('MSSV', $sortBy, $sortDir); ?>
          </a>
        </th>
        <th>
          <a class="sort-link" href="<?php echo sortUrl('HoTen', $sortBy, $sortDir, $search, $pageSize); ?>">
            Họ Tên <?php echo sortIcon('HoTen', $sortBy, $sortDir); ?>
          </a>
        </th>
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
                action="/sinhvien/delete/<?php echo $sv['id']; ?>"
                method="post"
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
            <?php echo ($search !== '') ? 'Không tìm thấy kết quả nào.' : 'Chưa có dữ liệu sinh viên.'; ?>
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <!-- Pagination -->
  <?php if ($totalPages > 1) : ?>
    <div class="pagination-wrap">
      <?php for ($i = 1; $i <= $totalPages; $i++) :
        $pageOffset = ($i - 1) * $pageSize;
        $isCurrent  = ($pageOffset == $offset) ? 'current' : '';
        $pageUrl    = '/sinhvien/index/' . $pageOffset
          . buildQuery($search, $pageSize, $sortBy, $sortDir);
      ?>
        <a href="<?php echo $pageUrl; ?>" class="page-btn <?php echo $isCurrent; ?>">
          <?php echo $i; ?>
        </a>
      <?php endfor; ?>
    </div>
  <?php endif; ?>
</div>