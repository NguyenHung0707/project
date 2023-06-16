<?php
/* Database credentials, assuming you are running MySql
sever with default setting (user 'root' with no password) */

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'course');


$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_NAME);

if($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>