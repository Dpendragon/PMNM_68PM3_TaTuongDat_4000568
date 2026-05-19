<?php
require_once "../app/core/App.php";
session_start();
class middleware
{
  public function checklogin()
  {
    $public_pages = ['/home/login'];
    if (!isset($_SESSION['username']) && !in_array($_SERVER['REQUEST_URI'], $public_pages)) {
      header('Location: /home/login');
      exit();
    }
  }
}
