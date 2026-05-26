<?php
require_once "../app/core/controller.php";
class sinhvien extends Controller
{
  public function index()
  {
    $sinhvienModel = $this->model('sinhvienModel');
    $sinhviens = $sinhvienModel->getAllSinhVien();
    // Trả về View
    //require_once "../app/views/sinhvien/index.php";
    $this->view('sinhvien/index', ['sinhviens' => $sinhviens]);
  }

  public function create()
  {
    // Trả về View
    require_once "../app/views/sinhvien/create.php";
  }
}
