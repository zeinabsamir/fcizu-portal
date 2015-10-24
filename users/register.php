<?php
if(isset($_POST['registerSubmit'])) {
  session_start();
  require_once('../db/database.php');

  $email = mysql_real_escape_string($_POST['email']);
  $password = mysql_real_escape_string($_POST['password']);
  $firstName = mysql_real_escape_string($_POST['firstName']);
  $lastName = mysql_real_escape_string($_POST['lastName']);
  $userRole = mysql_real_escape_string($_POST['userRole']);

  $query = "INSERT INTO users (email, password, first_name, last_name, user_role, created_at)
            VALUES ('$email', '$password', '$firstName', '$lastName', '$userRole', now())";

  if(mysql_query($query, $connection)) {
    $_SESSION['notice'] = "User Registered successfully.";

    header('location: ../index.php');
  } else {
    $_SESSION['notice'] = "User error: ".mysql_error()."\n";
  }
}
?>

<?php include_once('../partials/header.php'); ?>

<div class="container">
<div class="col-lg-3 col-md-4 col-sm-5 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 text-center">
  <div class="form-box">
    <div class="row ">
      <div class="col-lg-12 ">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element">
                <h3 class="text-center">Register</h3>
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
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="firstName" class="form-control" placeholder="First Name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <input type="text" name="lastName" class="form-control" placeholder="Last Name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-element form-group">
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default active">
                    <input type="radio" name="role" value="student" checked> Student
                  </label>
                  <label class="btn btn-default">
                    <input type="radio" name="userRole" value="staff"> Staff/TA
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 center-block ">
              <div class="form-element form-group">
                <input type="submit" name="registerSubmit" value="Register" class="btn btn-default">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php include_once('partials/footer.php'); ?>
