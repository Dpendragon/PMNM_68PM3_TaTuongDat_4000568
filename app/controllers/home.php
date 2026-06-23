<?php
require_once "../app/core/Controller.php";
class home extends Controller
{
  public function index()
  {
    $this->view('layout/masterLayout', ['viewname' => 'home/index', 'title' => 'Trang chủ', 'username' => $_SESSION['username'] ?? '']);
  }

  public function login(): void
  {
    if (!empty($_SESSION['username'])) {
      header('Location: /home/index');
      exit();
    }

    $error = $_SESSION['login_error'] ?? '';
    unset($_SESSION['login_error']);

    $this->view('home/login', ['title' => 'Đăng nhập', 'error' => $error]);
  }
}
