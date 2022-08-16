<?php
include("db_connect.php");
check_session();

// takes in a user's ID
$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);

// deletes row where ID is located
$deleteSQL = "DELETE FROM tb_users WHERE id='{$id}'";
if ($db->query($deleteSQL)) {
    echo "deleted";
}
?>