<?php
require_once("database.php");

// users table
$create_users_table_query = "CREATE TABLE users (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        email VARCHAR(100) NOT NULL,
                        first_name VARCHAR(100) NOT NULL,
                        last_name VARCHAR(100) NOT NULL,
                        password VARCHAR(24) NOT NULL,
                        faculty VARCHAR(150) NOT NULL,
                        date_of_birth DATETIME,
                        user_role VARCHAR(30) NOT NULL DEFAULT 'student',
                        is_admin TINYINT(1) DEFAULT 0,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id),
                        UNIQUE KEY email (email)
                        )";

if (mysql_query($create_users_table_query)) {
  echo "Users table was created.\n";
} else {
    echo "Users table error: ".mysql_error()."\n";
}

// courses table
$create_courses_table_query = "CREATE TABLE courses (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        title VARCHAR(255),
                        code VARCHAR(100),
                        faculty VARCHAR(100) NOT NULL,
                        department VARCHAR(100) NOT NULL,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id),
                        UNIQUE KEY code (code)
                        )";

if (mysql_query($create_courses_table_query)) {
  echo "Courses table was created.\n";
} else {
    echo "Courses table error: ".mysql_error()."\n";
}

// teaches table
$create_teaches_table_query = "CREATE TABLE teaches (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        year VARCHAR(100),
                        semester VARCHAR(100),
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        )";

if (mysql_query($create_teaches_table_query)) {
  echo "teaches table was created.\n";
} else {
    echo "teaches table error: ".mysql_error()."\n";
}

// studies table
$create_studies_table_query = "CREATE TABLE studies (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        student_id INT(11) NOT NULL,
                        year VARCHAR(100),
                        semester VARCHAR(100),
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        )";

if (mysql_query($create_studies_table_query)) {
  echo "studies table was created.\n";
} else {
    echo "studies table error: ".mysql_error()."\n";
}

// attendance table
$create_attendance_table_query = "CREATE TABLE attendance (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        student_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        has_attended TINYINT(1) DEFAULT 0,
                        day DATETIME NOT NULL,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id),
                        UNIQUE KEY course_student_day (course_id, student_id, day)
                        )";

if (mysql_query($create_attendance_table_query)) {
  echo "attendance table was created.\n";
} else {
    echo "attendance table error: ".mysql_error()."\n";
}

// announcements table
$create_announcements_table_query = "CREATE TABLE announcements (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        content TEXT NOT NULL,
                        course_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        )";

if (mysql_query($create_announcements_table_query)) {
  echo "announcements table was created.\n";
} else {
    echo "announcements table error: ".mysql_error()."\n";
}

// grades table
$create_grades_table_query = "CREATE TABLE grades (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        content TEXT NOT NULL,
                        course_id INT(11) NOT NULL,
                        student_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        grade DECIMAL(7,2) NOT NULL DEFAULT 99999.99,
                        type VARCHAR(150) NOT NULL,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        )";

if (mysql_query($create_grades_table_query)) {
  echo "grades table was created.\n";
} else {
    echo "grades table error: ".mysql_error()."\n";
}

// student_gpas table
$create_student_gpas_table_query = "CREATE TABLE student_gpas (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        student_id INT(11) NOT NULL,
                        GPA DECIMAL(7,2) NOT NULL DEFAULT 99999.99,
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        )";

if (mysql_query($create_student_gpas_table_query)) {
  echo "student_gpas table was created.\n";
} else {
    echo "student_gpas table error: ".mysql_error()."\n";
}

// course_materials table
$create_course_materials_table_query = "CREATE TABLE course_materials (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        course_id INT(11) NOT NULL,
                        teacher_id INT(11) NOT NULL,
                        description TEXT,
                        file_url VARCHAR(255),
                        created_at DATETIME NOT NULL,
                        PRIMARY KEY (id)
                        )";

if (mysql_query($create_course_materials_table_query)) {
  echo "course_materials table was created.\n";
} else {
    echo "course_materials table error: ".mysql_error()."\n";
}
?>
