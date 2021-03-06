<?php
  class User {
    public $id;
    public $email;
    public $password;
    public $firstName;
    public $lastName;
    public $department;
    public $dateOfBirth;
    public $userRole;
    public $isAdmin;
    public $createdAt;

    public function __construct($id, $email, $password, $firstName, $lastName,
                                $department, $dateOfBirth, $userRole, $isAdmin,
                                $createdAt) {
      $this->id = $id;
      $this->email = $email;
      $this->password = $password;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->department = $department;
      $this->dateOfBirth = $dateOfBirth;
      $this->userRole = $userRole;
      $this->isAdmin = $isAdmin;
      $this->createdAt = $createdAt;
    }

    // CREATE new user and add it to the database
    public static function create($email, $password, $firstName, $lastName,
                                  $department, $dateOfBirth, $userRole) {

      // Sanitize date_of_birth to MySQL DATE format yyyy-mm-dd
      $dateOfBirth = date('Y-m-d', strtotime($dateOfBirth));

      $query = "INSERT INTO users (email, password, first_name, last_name, department, date_of_birth, user_role, created_at)
                VALUES ('$email', '$password', '$firstName', '$lastName', '$department', '$dateOfBirth', '$userRole', now())";

      if(mysql_query($query)) {
        return new User(null, $email, $password,
                        $firstName, $lastName, $department,
                        $dateOfBirth, $userRole, null, null);
      } else {
        $_SESSION['notice'] = "User error: ".mysql_error()."\n";
      }
    }

    // READ a user from the database using its ID
    public static function find($id) {
      $query = "SELECT * FROM users WHERE id='$id' LIMIT 1";
      $result = mysql_query($query);
      $user = mysql_fetch_array($result);

      return new User($user['id'], $user['email'], $user['password'],
                            $user['first_name'], $user['last_name'], $user['department'],
                            $user['date_of_birth'], $user['user_role'], $user['is_admin'],
                            $user['created_at']);
    }

    // UPDATE a user
    public static function update($user) {
      $query = "UPDATE users SET email='$user->email', password='$user->password',
                first_name='$user->firstName', last_name='$user->lastName',
                department='$user->department', date_of_birth='$user->dateOfBirth',
                user_role='$user->userRole' WHERE id='$user->id'";

      if(mysql_query($query)){
        return true;
      } else {
        echo "error".mysql_error()."\n";
      }
    }

    // DELETE a user from the database using its ID
    public static function delete($id) {
      // Check if user exists
      if($user = User::find($id)) {

        // Delete the user
        $query = "DELETE FROM users WHERE id='$id'";
        if(mysql_query($query)) {
          return true;
        } else {
          echo "error".mysql_error()."\n";
        }
      } else {
        return false;
      }
    }

    // Return a list of all the users in the database
    public static function all() {
      $list = [];

      $query = "SELECT * FROM users";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($user = mysql_fetch_array($result)) {
          $list[] = new User($user['id'], $user['email'], $user['password'],
                             $user['first_name'], $user['last_name'], $user['department'],
                             $user['date_of_birth'], $user['user_role'], $user['is_admin'],
                             $user['created_at']);
        }
      }

      return $list;
    }

    // Check if a user exists using its email and password only
    // then returns the whole user object
    public static function authenticate($email, $password) {
      $query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
      $result = mysql_query($query);

      if(mysql_num_rows($result) == 1) {
        $user = mysql_fetch_array($result);

        return new User($user['id'], $user['email'], $user['password'],
                        $user['first_name'], $user['last_name'], $user['department'],
                        $user['date_of_birth'], $user['user_role'], $user['is_admin'],
                        $user['created_at']);
      }
    }

  }
?>
