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
  }
?>
