<?
require_once("db.secrets.php");

// create and connect to database
$connection = mysql_connect($host, $username, $password);

if (!$connection) {
  die('Could not connect: ' . mysql_error());
}

@mysql_select_db($database) or die( "Unable to connect to database ".$database);
?>
