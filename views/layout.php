<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>FCI-ZU Portal</title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/main.css" rel="stylesheet">
  <script src="../assets/js/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>

<!-- HEADER-->
<?php require_once('views/partials/header.php'); ?>
<!-- HEADER-->

<!-- NOTICE -->
<?php require_once('views/partials/notice.php'); ?>
<!-- NOTICE -->

<div class="container">
  <div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-3" id="leftCol">
      <?php
        if($_SESSION['currentUserID']) {
          require_once('views/partials/sidebar.php');
        }
      ?>
    </div>
    <!-- SIDEBAR -->

    <div class="after-topbar"></div>

    <!-- MAIN CONTENT -->
    <div class="col-md-9" id="mainCol">
      <?php require_once('routes.php'); ?>
    </div>
    <!-- MAIN CONTENT -->

  </div>
</div>

</body>
</html>

