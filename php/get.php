<?php
include("db_connect.php");

// fetches row from database only on logged-in user
$user = $db->query(
    "SELECT *
     FROM tb_users
     WHERE username='{$_SESSION['username']}'"
)->fetch_all(MYSQLI_ASSOC)[0];

// outputs user data in json encoded array
$data = [$user["id"], $user["email"], $user["username"], $user["age"], $user["balance"]];
echo json_encode($data);
?>