<?php
  class UsersHelper {
    public static function fullName($userId) {
      $user = User::find($userId);

      return $user->firstName . ' ' . $user->lastName;
    }
  }
?>
