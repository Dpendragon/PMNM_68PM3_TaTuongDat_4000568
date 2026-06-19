<?php
require_once '../app/core/Controller.php';
class lophoc extends Controller
{
  public function index($limit = 5, $offset = 0)
  {
    $search = isset($_GET['search']) ? trim($_GET['search']) : "";

    $lophocModel = $this->model('lophocModel');
    $result      = $lophocModel->paging((int)$limit, (int)$offset, $search);
    $lophocs     = $result['lophocs'];
    $totalPages  = $result['totalPages'];

    $this->view('layout/masterLayout', [
      'viewname'   => 'lophoc/index',
      'lophocs'    => $lophocs,
      'title'      => 'Danh sách lớp học',
      'totalPages' => $totalPages,
      'offset'     => (int)$offset,
      'pageSize'   => (int)$limit,
      'search'     => $search,
    ]);
  }

  public function create()
  {
    // Trả về View
    $this->view('layout/masterLayout', ['viewname' => 'lophoc/create', 'title' => 'Tạo lớp học']);
  }

  public function store()
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $MaLop = $_POST['MaLop'];
      $TenLop = $_POST['TenLop'];
      $GhiChu = $_POST['GhiChu'];

      $lophocModel = $this->model('lophocModel');
      $result = $lophocModel->create($MaLop, $TenLop, $GhiChu);
      if ($result) {
        header("Location: /lophoc/index");
        exit();
      } else {
        echo "Thêm mới lớp học thất bại!";
        exit();
      }
    }
  }

  public function edit($id)
  {
    $id = (int)$id;
    $lophocModel = $this->model('lophocModel');
    $lophoc = $lophocModel->getLopHocById($id);

    if (!$lophoc) {
      echo "Lớp học không tồn tại!";
      exit();
    }

    $this->view('layout/masterLayout', ['viewname' => 'lophoc/edit', 'lophoc' => $lophoc, 'title' => 'Sửa thông tin Lớp học']);
  }

  public function update($id)
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = (int)$id;
      $MaLop = $_POST['MaLop'];
      $TenLop = $_POST['TenLop'];
      $GhiChu = $_POST['GhiChu'];

      $lophocModel = $this->model('lophocModel');
      $result = $lophocModel->update($id, $MaLop, $TenLop, $GhiChu);
      if ($result) {
        header("Location: /lophoc/index");
        exit();
      } else {
        echo "Cập nhật lớp học thất bại!";
        exit();
      }
    }
  }

  public function delete($id)
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = (int)$id;
      $lophocModel = $this->model('lophocModel');
      $result = $lophocModel->delete($id);
      if ($result) {
        header("Location: /lophoc/index");
        exit();
      } else {
        echo "Xóa lớp học thất bại!";
        exit();
      }
    } else {
      header("Location: /lophoc/index");
      exit();
    }
  }
}
