<?php
class middleware
{
  public function checklogin()
  {
    $public_pages = ['/home/login', '/auth/login'];
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    if (!isset($_SESSION['username']) && !in_array($path, $public_pages, true)) {
      header('Location: /home/login');
      exit();
    }
  }
}
