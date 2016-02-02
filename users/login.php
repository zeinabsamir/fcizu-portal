<?php
if(isset($_POST['loginSubmit'])) {
  session_start();

  require_once('../db/database.php');

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT id, user_role, is_admin FROM users WHERE email='$email' AND password='$password' LIMIT 1";
  $result = mysql_query($query, $connection);

  if(mysql_num_rows($result) == 1) {
    $user = mysql_fetch_array($result);

    $_SESSION['userID'] = $user['id'];
    $_SESSION['userRole'] = $user['user_role'];

    if($user['is_admin'] == 1) {
      $_SESSION['userIsAdmin'] = $user['is_admin'];
    }

    header('location: ../index.php');
  } else {
    $_SESSION['notice'] = "Invalid Credentials";
  }

}
?>

<?php include_once('../partials/header.php'); ?>

<div class="container">
<div class="col-lg-3 col-md-4 col-sm-5 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 text-center">
  <div class="form-box">
    <div class="row ">
      <div class="col-lg-12 ">
        <form action="" method="post">
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element">
                <h3 class="text-center">Login</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-element form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 center-block ">
              <div class="form-element form-group">
                <input type="submit" name="loginSubmit" value="Login" class="btn btn-default">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php include_once('../partials/footer.php'); ?>
