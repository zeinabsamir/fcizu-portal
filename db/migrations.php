<?php
require_once("database.php");

// users table
$create_users_table_query = "CREATE TABLE users (
                        id INT(11) NOT NULL AUTO_INCREMENT,
                        email VARCHAR(100) NOT NULL,
                        first_name VARCHAR(100) NOT NULL,
                        last_name VARCHAR(100) NOT NULL,
                        password VARCHAR(24) NOT NULL,
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
?>
