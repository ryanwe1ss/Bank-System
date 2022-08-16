<?php
include("db_connect.php");
check_session();

// gets post paramaters determing selected user and amount
$selectedUser = filter_input(INPUT_POST, "selectedUser", FILTER_SANITIZE_STRING);
$selectedAmount = filter_input(INPUT_POST, "selectedAmount", FILTER_VALIDATE_INT);

// updates balance in both sender and receiver user
$db->query("UPDATE tb_users SET balance=balance+'$selectedAmount' WHERE username='$selectedUser'");
$db->query("UPDATE tb_users SET balance=balance-'$selectedAmount' WHERE username='{$_SESSION['username']}'");
echo "success";
?>