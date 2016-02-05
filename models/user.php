<?php
  class User {
    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $password;
    public $faculty;
    public $date_of_birth;
    public $user_role;
    public $is_admin;
    public $created_at;

    public function __construct($id, $email, $first_name, $last_name, $password,
                                $faculty, $date_of_birth, $user_role, $is_admin,
                                $created_at) {
      $this->id = $id;
      $this->email = $email;
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->password = $password;
      $this->faculty = $faculty;
      $this->date_of_birth = $date_of_birth;
      $this->user_role = $user_role;
      $this->is_admin = $is_admin;
      $this->created_at = $created_at;
    }

    public static function all() {
      include("../db/database.php");

      $list = [];

      $query = "SELECT * FROM users";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($user = mysql_fetch_array($result)) {
          $list[] = new User($user['id'], $user['email'], $user['first_name'],
                            $user['last_name'], $user['password'], $user['faculty'],
                            $user['date_of_birth'], $user['user_role'], $user['is_admin'],
                            $user['created_at']);
        }
      }

      return $list;
    }

    public static function find($id) {
      include("../db/database.php");

      $query = "SELECT * FROM users WHERE id='$id' LIMIT 1";
      $result = mysql_query($query);
      $user = mysql_fetch_array($result);

      return new User($user['id'], $user['email'], $user['first_name'],
                                $user['last_name'], $user['password'], $user['faculty'],
                                $user['date_of_birth'], $user['user_role'], $user['is_admin'],
                                $user['created_at']);
    }
  }
?>
