<?php
include("db_connect.php");
check_session();

// gets post request to determine the row
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$password = strtolower(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

$username = $db->query(
    "SELECT username FROM tb_users WHERE id='$id'"
)->fetch_all(MYSQLI_ASSOC)[0]["username"];
if ($password == $username) die("same-username");

// updates row with new password
$updateSQL = "UPDATE tb_users SET password='$password' WHERE id='$id'";
if ($db->query($updateSQL)) {
    echo "updated";
}
?>