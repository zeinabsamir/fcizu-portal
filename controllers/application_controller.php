<?php
  class ApplicationController {
    public function home() {
      require_once('views/application/home.php');
    }

    public function error() {
      require_once('views/application/error.php');
    }
  }
?>
