<?php
require_once "database.php";

// users
$query = "INSERT INTO users (email, first_name, last_name, password, department, date_of_birth, user_role, is_admin, created_at)
          VALUES ('kathrin.meier@fci.zu.edu.eg', 'Kathrin', 'Meier', '12345678', 'Computer Science', '1975-7-7', 'teacher', '0', now())";

if(mysql_query($query, $connection)) {
  echo "Teacher User was created.\n";
} else {
  echo "Teacher User error: ".mysql_error()."\n";
}

$query = "INSERT INTO users (email, first_name, last_name, password, department, date_of_birth, user_role, is_admin, created_at)
          VALUES ('zeinab.samir@fci.zu.edu.eg', 'Zeinab', 'Samir', '12345678', 'Computer Science', '1994-8-9', 'student', '0', now())";

if(mysql_query($query, $connection)) {
  echo "Student User was created.\n";
} else {
  echo "Student User error: ".mysql_error()."\n";
}

$query = "INSERT INTO users (email, first_name, last_name, password, department, date_of_birth, user_role, is_admin, created_at)
          VALUES ('admin@fci.zu.edu.eg', 'System', 'Admin', '12345678', 'Computer Science', '1977-11-5', 'teacher', '1', now())";

if(mysql_query($query, $connection)) {
  echo "Admin User was created.\n";
} else {
  echo "Admin User error: ".mysql_error()."\n";
}

// courses
$query = "INSERT INTO courses (title, code, department, created_at)
          VALUES ('Introduction to Computer Science', 'CSEN101', 'Computer Science', now())";

if(mysql_query($query, $connection)) {
  echo "Course was created.\n";
} else {
  echo "Course error: ".mysql_error()."\n";
}

$query = "INSERT INTO courses (title, code, department, created_at)
          VALUES ('Formal Languages', 'CSEN303', 'Computer Science', now())";

if(mysql_query($query, $connection)) {
  echo "Course was created.\n";
} else {
  echo "Course error: ".mysql_error()."\n";
}

$query = "INSERT INTO courses (title, code, department, created_at)
          VALUES ('Computer Graphics', 'CSEN506', 'Computer Science', now())";

if(mysql_query($query, $connection)) {
  echo "Course was created.\n";
} else {
  echo "Course error: ".mysql_error()."\n";
}
?>
