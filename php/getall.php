<?php
include("db_connect.php");
check_session();

// queries data on all users
$result = mysqli_query($db, "SELECT id, email, username, age, balance FROM tb_users");
$users = [];

// iterates through each row appending to array
while ($row = mysqli_fetch_array($result)) {
    $list = [
        $row[0], $row[1], $row[2],
        $row[3], $row[4]
    
    ]; array_push($users, $list);
}

// outputs all user data in json encoded array
echo json_encode($users);
?>