<?php
session_start();
require_once("db/database.php");

if (isset($_GET['controller']) && isset($_GET['action'])) {
  $controller = $_GET['controller'];
  $action     = $_GET['action'];
} else {
  // Default, in case no controller & action were specified in the request
  $controller = 'application';
  $action     = 'home';
}

require_once('views/layout.php');
?>
