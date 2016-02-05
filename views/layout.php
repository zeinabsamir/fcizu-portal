<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/custom.css" rel="stylesheet">
  <script src="../assets/js/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>

<!-- HEADER-->
<?php require_once('views/partials/header.php'); ?>
<!-- HEADER-->

<div class="container">
  <div class="row">
    <!-- SIDEBAR -->
    <div class="col-md-2" id="leftCol">
      <?php 
        if($_SESSION['currentUserID']) {
          require_once('views/partials/sidebar.php'); 
        }
      ?>
    </div> 
    <!-- SIDEBAR -->

    <!-- MAIN CONTENT -->
    <div class="col-md-8" id="mainCol">
      <?php require_once('routes.php'); ?>
    </div>
    <!-- MAIN CONTENT -->

  </div>
</div>

</body>
</html>

