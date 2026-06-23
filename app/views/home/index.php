<style>
  .home-header {
    margin-bottom: 2rem;
  }

  .home-header h1 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: .25rem;
  }

  .home-header p {
    font-size: .9rem;
    color: #64748b;
    margin: 0;
  }

  .home-header .username {
    color: #1a56db;
    font-weight: 700;
  }

  .nav-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 1.25rem;
  }

  .nav-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
    border: 1px solid #f1f5f9;
    padding: 1.75rem 1.5rem;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: box-shadow .15s, transform .15s;
  }

  .nav-card:hover {
    box-shadow: 0 6px 20px rgba(26, 86, 219, .13);
    transform: translateY(-2px);
  }

  .icon-wrap {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    flex-shrink: 0;
  }

  .icon-blue {
    background: #dbeafe;
    color: #1a56db;
  }

  .icon-green {
    background: #dcfce7;
    color: #16a34a;
  }

  .card-label {
    font-size: .78rem;
    color: #94a3b8;
    font-weight: 500;
    margin-bottom: 2px;
  }

  .card-name {
    font-size: .95rem;
    font-weight: 700;
    color: #0f172a;
  }
</style>

<div class="home-header">
  <h1>Xin chào, <span class="username"><?php echo htmlspecialchars($username); ?></span> 👋</h1>
  <p>Chọn chức năng bạn muốn thực hiện.</p>
</div>

<div class="nav-grid">
  <a href="/sinhvien/index" class="nav-card">
    <div class="icon-wrap icon-blue">
      <i class="bi bi-people-fill"></i>
    </div>
    <div>
      <div class="card-label">Quản lý</div>
      <div class="card-name">Sinh viên</div>
    </div>
  </a>

  <a href="/lophoc/index" class="nav-card">
    <div class="icon-wrap icon-green">
      <i class="bi bi-journal-bookmark-fill"></i>
    </div>
    <div>
      <div class="card-label">Quản lý</div>
      <div class="card-name">Lớp học</div>
    </div>
  </a>
</div>