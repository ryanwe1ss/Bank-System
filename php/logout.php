<?php
include("db_connect.php");

// destroys session and redirects to index page
session_destroy();
header("location:/index.html");
?>