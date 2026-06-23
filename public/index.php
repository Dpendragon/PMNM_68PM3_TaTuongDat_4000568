<?php
session_start();
require_once "../app/core/App.php";
require_once "../app/middleware.php";
$middelware = new middleware();
$middelware->checklogin();
$app = new App();
