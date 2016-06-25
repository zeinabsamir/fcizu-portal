<?php
  class UsersHelper {
    public static function fullName($userId) {
      $user = User::find($userId);

      return $user->firstName . ' ' . $user->lastName;
    }

    public static function isAdmin() {
      if($_SESSION['currentUserIsAdmin'] == 1) {
        return true;
      } else {
        return false;
      }
    }
  }
?>
