<?php
require_once "../app/core/controller.php";
class sinhvien extends Controller
{
  public function index($limit = 5, $offset = 0, $search = "")
  {
    $search = isset($_GET['search']) ? trim((string) $_GET['search']) : '';

    $sinhvienModel = $this->model('sinhvienModel');
    $result      = $sinhvienModel->paging((int)$limit, (int)$offset, $search);
    $sinhviens   = $result['sinhviens'];
    $totalPages  = $result['totalPages'];

    $this->view('layout/masterLayout', [
      'viewname'   => 'sinhvien/index',
      'title'      => 'Danh sách sinh viên',
      'sinhviens'  => $sinhviens,
      'totalPages' => $totalPages,
      'offset'     => $offset,
      'pageSize'   => $limit,
      'search'     => $search,
    ]);
  }

  public function create()
  {
    $lophocModel = $this->model('lophocModel');
    $lophocs = $lophocModel->getAllLopHoc();
    // Trả về View
    $this->view('layout/masterLayout', ['viewname' => 'sinhvien/create', 'title' => 'Tạo sinh viên', 'lophocs' => $lophocs]);
  }

  public function store()
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $MSSV = $_POST['MSSV'];
      $HoTen = $_POST['HoTen'];
      $GioiTinh = $_POST['GioiTinh'];
      $MaLop = $_POST['MaLop'];

      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->create($MSSV, $HoTen, $GioiTinh, $MaLop);
      if ($result) {
        header("Location: /sinhvien/index");
        exit();
      } else {
        echo "Thêm mới sinh viên thất bại!";
        exit();
      }
    }
  }

  public function edit($id)
  {
    $id = (int)$id;
    $sinhvienModel = $this->model('sinhvienModel');
    $sinhvien = $sinhvienModel->getSinhVienById($id);
    $lophocModel = $this->model('lophocModel');
    $lophocs = $lophocModel->getAllLopHoc();

    if (!$sinhvien) {
      echo "Sinh viên không tồn tại!";
      exit();
    }

    $this->view('layout/masterLayout', ['viewname' => 'sinhvien/edit', 'sinhvien' => $sinhvien, 'title' => 'Sửa thông tin Sinh viên', 'lophocs' => $lophocs]);
  }

  public function update($id)
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = (int)$id;
      $MSSV = $_POST['MSSV'];
      $HoTen = $_POST['HoTen'];
      $GioiTinh = $_POST['GioiTinh'];
      $MaLop = $_POST['MaLop'];
      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->update($id, $MSSV, $HoTen, $GioiTinh, $MaLop);

      if ($result) {
        header("Location: /sinhvien/index");
        exit();
      } else {
        echo "Cập nhật sinh viên thất bại!";
        exit();
      }
    }
  }

  public function delete($id)
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = (int)$id;
      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->delete($id);

      if ($result) {
        header("Location: /sinhvien/index");
        exit();
      } else {
        echo "Xoá sinh vien thất bại!";
        exit();
      }
    } else {
      header("Location: /sinhvien/index");
      exit();
    }
  }
}
