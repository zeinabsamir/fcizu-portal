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

    public function __construct($id, $email, $password, $first_name, $last_name,
                                $faculty, $date_of_birth, $user_role, $is_admin,
                                $created_at) {
      $this->id = $id;
      $this->email = $email;
      $this->password = $password;
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->faculty = $faculty;
      $this->date_of_birth = $date_of_birth;
      $this->user_role = $user_role;
      $this->is_admin = $is_admin;
      $this->created_at = $created_at;
    }

    public static function all() {
      $list = [];

      $query = "SELECT * FROM users";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($user = mysql_fetch_array($result)) {
          $list[] = new User($user['id'], $user['email'], $user['password'],
                            $user['first_name'], $user['last_name'], $user['faculty'],
                            $user['date_of_birth'], $user['user_role'], $user['is_admin'],
                            $user['created_at']);
        }
      }

      return $list;
    }

    public static function find($id) {
      $query = "SELECT * FROM users WHERE id='$id' LIMIT 1";
      $result = mysql_query($query);
      $user = mysql_fetch_array($result);

      return new User($user['id'], $user['email'], $user['password'],
                            $user['first_name'], $user['last_name'], $user['faculty'],
                            $user['date_of_birth'], $user['user_role'], $user['is_admin'],
                            $user['created_at']);
    }

    public static function create($email, $password, $first_name, $last_name,
                                  $faculty, $dateOfBirth, $userRole) {

      // Sanitize date_of_birth to MySQL DATE format yyyy-mm-dd
      $dateOfBirth = date('Y-m-d', strtotime($dateOfBirth));

      $query = "INSERT INTO users (email, password, first_name, last_name, faculty, date_of_birth, user_role, created_at)
                VALUES ('$email', '$password', '$first_name', '$last_name', '$faculty', '$dateOfBirth', '$userRole', now())";

      if(mysql_query($query)) {
        return new User(null, $email, $password,
                        $first_name, $last_name, $faculty,
                        $date_of_birth, $user_role, null, null);
      } else {
        $_SESSION['notice'] = "User error: ".mysql_error()."\n";
      }
    }

    public static function authenticate($email, $password) {
      $query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
      $result = mysql_query($query);

      if(mysql_num_rows($result) == 1) {
        $user = mysql_fetch_array($result);

        return new User($user['id'], $user['email'], $user['password'],
                            $user['first_name'], $user['last_name'], $user['faculty'],
                            $user['date_of_birth'], $user['user_role'], $user['is_admin'],
                            $user['created_at']);
      }
    }
  }
?>
