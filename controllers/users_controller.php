<?php
  class UsersController {

    // List all users in variable $users and giving it to the view
    // We grab the list of users using User::all() method
    // /?controller=user&action=index
    public function index() {
      if(!UsersHelper::isAdmin()) {
        $_SESSION['notice'] = 'You don\'t have the permission to view users!';
        header('location: /index.php');
        exit();
      }

      $users = User::all();

      require_once('views/users/index.php');
    }

    // Show one user using its id which we get from the request parameters using $_GET('id')
    // /?controller=user&action=show&id=x
    public function show() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right user
      if($_GET['id'] == $_SESSION['currentUserID']) {
        $user = User::find($_GET['id']);
        require_once('views/users/show.php');
      }
    }

    // edit user using User::update()
    // /?controller=user&action=edit&id=x
    public function edit() {
      if(isset($_GET['id']) && $_GET['id'] == $_SESSION['currentUserID']) {
        $user = User::find($_GET['id']);

        require_once('views/users/edit.php');

        if(isset($_POST['editSubmit'])) {
          $user->email = $_POST['email'] ? mysql_real_escape_string($_POST['email']) : $user->email;
          $user->password = $_POST['password'] ? mysql_real_escape_string($_POST['password']) : $user->password;
          $user->firstName = $_POST['firstName'] ? mysql_real_escape_string($_POST['firstName']) : $user->firstName;
          $user->lastName = $_POST['lastName'] ? mysql_real_escape_string($_POST['lastName']) : $user->lastName;
          $user->department = $_POST['department'] ? mysql_real_escape_string($_POST['department']) : $user->department;
          $user->dateOfBirth = $_POST['dateOfBirth'] ? mysql_real_escape_string($_POST['dateOfBirth']) : $user->dateOfBirth;
          $user->userRole = $_POST['userRole'] ? mysql_real_escape_string($_POST['userRole']) : $user->userRole;

          if(User::update($user)) {
            // Redirect the user to profile (show) page
            header("location: /index.php?controller=users&action=show&id={$user->id}");
          }

        }
      } else {
        // Redirect the user to home(index) page
        header('location: /index.php');
      }
    }

    // Delete user using User::delete()
    // /?controller=user&action=destroy&id=x
    public function destroy() {
      if(!UsersHelper::isAdmin()) {
        $_SESSION['notice'] = 'You don\'t have the permission to delete users!';
        header("location: /index.php?controller=users&action=index");
        exit();
      }

      if(isset($_GET['id'])) {
        if(User::delete($_GET['id'])) {
          $_SESSION['notice'] = "User was deleted successfully!";
          header('location: /index.php');
        }
      }
    }

    // Register a user in the site using User::create() method
    // /?controller=user&action=register
    public function register() {
      require_once('views/users/register.php');

      if(isset($_POST['registerSubmit'])) {
        $email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        $firstName = mysql_real_escape_string($_POST['firstName']);
        $lastName = mysql_real_escape_string($_POST['lastName']);
        $department = mysql_real_escape_string($_POST['department']);
        $dateOfBirth = mysql_real_escape_string($_POST['dateOfBirth']);
        $userRole = mysql_real_escape_string($_POST['userRole']);

        // Create the user
        if($user = User::create($email, $password, $firstName, $lastName, $department, $dateOfBirth, $userRole)) {
          $_SESSION['notice'] = 'User was created successfully!';

          // Go to the home page
          header('location: /index.php');
          exit();
        }
      }
    }

    // Log the user in using User::authenticate()
    // /?controller=user&action=login
    public function login() {
      require_once('views/users/login.php');

      if(isset($_POST['loginSubmit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($user = User::authenticate($email, $password)) {
          $_SESSION['currentUserID'] = $user->id;
          $_SESSION['currentUserRole'] = $user->userRole;

          if($user->isAdmin == 1) {
            $_SESSION['currentUserIsAdmin'] = $user->isAdmin;
          }

          // Redirect user to the home(index) page
          header('location: /index.php');
          exit();
        } else {
          $_SESSION['notice'] = "Invalid Credentials!";
          header('location: ?controller=users&action=login');
          exit();
        }
      }
    }

    // Log the user out by deleting the current session
    // /?controller=user&action=logout
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
