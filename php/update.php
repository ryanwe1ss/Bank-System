<?php
include("db_connect.php");
check_session();

// gets post paramaters from logged-in user
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$currentEmail = filter_input(INPUT_POST, "currentEmail", FILTER_SANITIZE_STRING);
$email = strtolower(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
$username = strtolower(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
$age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);

$checkEmailExists = mysqli_query($db, "SELECT email FROM tb_users WHERE NOT email='$currentEmail'");
$checkUsernameExists = mysqli_query($db, "SELECT username FROM tb_users WHERE NOT username='{$_SESSION["username"]}'");
$checkPassword = $db->query("SELECT password FROM tb_users WHERE id='$id'")->fetch_all(MYSQLI_ASSOC)[0]["password"];

// checks if both email and username already exist in database
while ($row = mysqli_fetch_assoc($checkEmailExists)) {
    if ($row['email'] == $email) die("taken-email");
}

while ($row = mysqli_fetch_assoc($checkUsernameExists)) {
    if ($row['username'] == $username) die("taken-username");
}

if ($username == $checkPassword) {
    die("same-password");
}

// updates user data with newly provided information
$db->query("UPDATE tb_users SET
    email='" . $email . "',
    username='" . $username . "',
    age='$age'
    WHERE id='$id'"

); $_SESSION["username"] = $username; // changes session username
?>