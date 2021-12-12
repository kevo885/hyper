<?php
include_once ".env.php";
session_start();
// destroy tokens
setcookie('remember', '', 1, '/');

$query = "DELETE from remember where user_id = ?";
mysqli_stmt_prepare($stmt, $query);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['id']);
if (!mysqli_stmt_execute($stmt))
    exit(mysqli_stmt_error($stmt));

unset($_SESSION['username']);
unset($_SESSION['id']);
unset($_SESSION['add_user']);

mysqli_stmt_close($stmt);
header("Location: ../index.php");
