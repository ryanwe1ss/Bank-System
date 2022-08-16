<?php
include("db_connect.php");

// gets post paramaters from registration page
$email = strtolower(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL));
$username = strtolower(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
$age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
$password = strtolower(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
$confirmPassword = strtolower(filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_STRING));

// checks if both email and username already exist in database
$checkEmail = $db->query("SELECT * FROM tb_users WHERE email='$email'");
$checkUsername = $db->query("SELECT * FROM tb_users WHERE username='$username'");

if ($checkEmail->fetch_all(MYSQLI_ASSOC)) {
    die("taken-email");

} elseif ($checkUsername->fetch_all(MYSQLI_ASSOC)) {
    die("taken-username");

} else {

    // generates ID by taking the highest one in database and adding (+1)
    $generateID = $db->query(
        "SELECT id FROM tb_users ORDER BY id DESC"
    )->fetch_all(MYSQLI_ASSOC)[0]['id'] + 1;

    // creates account
    $db->prepare("INSERT INTO tb_users
        (id, email, username, password, age, balance)
        VALUES('$generateID' ,'$email', '$username', '$password', '$age', '1000');"
    )->execute();
}
?>