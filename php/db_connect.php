<?php
// prevents warnings messages from displaying
ini_set("display_errors", "0");

// checks if session is active only on php pages
function check_session() {
    if (!isset($_SESSION["login"])) {
        header("location:unauthorized.php");
    }
}

$db_hostname = "localhost";
$db_username = "root";
$db_password = "password";
$db_name = "db_bank";

// connect to database
$db = new mysqli($db_hostname, $db_username, $db_password, $db_name);
if ($db->connect_error) {
    die("error");
    
} session_start();
?>