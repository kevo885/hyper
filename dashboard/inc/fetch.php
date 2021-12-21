<?php

// This page prints out database info in the form of datatables.
include_once "../inc/.env.php";

function getUser()
{
    global $stmt;
    mysqli_stmt_prepare($stmt, "SELECT * from user");
    if (!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_bind_result($stmt, $id, $username, $password, $name, $dob, $phone, $gender, $age);
}
