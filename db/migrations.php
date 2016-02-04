<?php
require_once("database.php");

$tables = file_get_contents("tables.sql");

$queries = explode(";",$tables);

foreach ($queries as $query) {
  if (strlen(trim($query)) > 0) {
    if(!mysql_query($query)) {
      echo "Error: ".mysql_error()."\n";
    }
  }
}
?>
