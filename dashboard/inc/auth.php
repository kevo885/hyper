<?php
// authenticate user, checks if logged in and if logged in populate dashboard with login info.

// if not logged in
if (!isset($_SESSION['id'])) {
    $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
    $_SESSION['message'] = "ERROR: You must be login in order to access the dashboard.";
    header("Location: ../auth/login.php");
    exit();
}

// else if login then grab logged in user info
else if (isset($_SESSION['id'])) {
    mysqli_stmt_prepare($stmt, "select * from user where id=?");
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
    if (!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $id, $username, $password, $name, $dob, $phone, $gender, $age);
    mysqli_stmt_fetch($stmt);
}
