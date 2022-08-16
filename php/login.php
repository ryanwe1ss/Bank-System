<?php
include("db_connect.php");

// gets post paramaters
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

// queries user data
$check = mysqli_query($db, "SELECT * FROM tb_users
    WHERE username='$username' AND password='$password'");
    
// checks if username and password exist in same row
if (mysqli_num_rows($check) > 0) {
    session_start();
    $_SESSION["login"] = true;
    $_SESSION["username"] = $username;
}
else die("invalid");
?>