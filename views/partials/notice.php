<?php if(isset($_SESSION['notice'])) { ?>
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Hey!</strong> <?= $_SESSION['notice'] ?>
</div>
<?php }

unset($_SESSION['notice']);
?>

