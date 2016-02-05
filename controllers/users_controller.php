<?php
  class UsersController {
    public function index() {
      // we store all the users in variable $users
      $users = User::all();
      require_once('views/users/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=user&action=show&id=x
      // without an id we just redirect to the error page as we need the user id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right user
      $user = User::find($_GET['id']);
      require_once('views/users/show.php');
    }

    public function login() {
      require_once('views/users/login.php');

      if(isset($_POST['loginSubmit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($user = User::authenticate($email, $password)) {
          // Redirect the user to home(index) page
          header('location: /index.php');
          exit();
        } else {
          $_SESSION['notice'] = "Invalid Credentials";
        }
      }
    }

    public function register() {
      require_once('views/users/register.php');

      if(isset($_POST['registerSubmit'])) {
        $email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        $firstName = mysql_real_escape_string($_POST['firstName']);
        $lastName = mysql_real_escape_string($_POST['lastName']);
        $faculty = mysql_real_escape_string($_POST['faculty']);
        $dateOfBirth = mysql_real_escape_string($_POST['dateOfBirth']);
        $userRole = mysql_real_escape_string($_POST['userRole']);

        // Create the user
        $user = User::create($email, $password, $firstName, $lastName, $faculty, $dateOfBirth, $userRole);

        // Sign the user in
        if($user = User::authenticate($email, $password)) {
          $_SESSION['currentUserID'] = $user->id;
          $_SESSION['currentUserRole'] = $user->user_role;

          if($user->is_admin == 1) {
            $_SESSION['currentUserIsAdmin'] = $user->is_admin;
          }

          // Redirect the user to home(index) page
          header('location: /index.php');
          exit();
        }
      }
    }

    public function logout() {
      session_destroy();
      session_unset();

      session_start();
      $_SESSION['notice'] = "Signed out";

      // Go to home page
      header('location: /index.php');
      exit();
    }
  }
?>
