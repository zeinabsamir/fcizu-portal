<?php
require_once "database.php";

// users
$query = "INSERT INTO users (email, first_name, last_name, password, faculty, date_of_birth, user_role, is_admin, created_at)
          VALUES ('kathrin.meier@fci.zu.edu.eg', 'Kathrin', 'Meier', '12345678', 'Bioinformatik', '1992-7-19', 'student', '0', now())";

if(mysql_query($query, $connection)) {
  echo "Student was created.\n";
} else {
  echo "Student error: ".mysql_error()."\n";
}
?>
