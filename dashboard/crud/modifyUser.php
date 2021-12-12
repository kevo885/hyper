<?php
include_once "../../inc/.env.php";
session_start();
// if form is submitted
if (isset($_POST['update'])) {

    // if no input field was entered before submitting form
    if (empty($_POST['newName']) && empty($_POST['newUsername']) && empty($_POST['newPassword'])) {
        $_SESSION['alert'] = "alert alert-warning alert-dismissible fade show";
        $_SESSION['message'] = "Warning: User profile not updated - did not enter any inputs.";
        header("location: ../settings.php");
        exit();
    }
    // if invalid username and not empty
    if (!empty($newUsername)) {
        $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
        $_SESSION['message'] = "Error: Not a valid username address";
        header("location: ../settings.php");
        exit();
    }

    // current user info
    $currName = $_SESSION['name'];
    $currusername = $_SESSION['username'];
    $currPassword = $_SESSION['password'];

    // new user info
    $newName = $_POST['newName'];
    $newPassword = $_POST['newPassword'];
    $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
    $newUsername = $_POST['newUsername'];

    if (!empty($_POST['newName'])) {
        // update name
        mysqli_stmt_prepare($stmt, "UPDATE user set name=? where username=?");
        mysqli_stmt_bind_param($stmt, "ss", $newName, $currusername);
        if (mysqli_stmt_execute($stmt)) {
            $currName = $newName;
            $_SESSION['name'] = $newName;

            $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
            $_SESSION['message'] .= "Success! Updated name.";
            header("location: ../settings.php");
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Failed to update name";
            header("location: ../settings.php");
        }
    }
    if (!empty($_POST['newPassword'])) {
        mysqli_stmt_prepare($stmt, "UPDATE user set password=? where username=?");
        mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $currusername);
        if (mysqli_stmt_execute($stmt)) {
            $currName = $newName;
            $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
            $_SESSION['message'] .= "Success! Updated password.";
            header("location: ../settings.php");
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Failed to update password";
            header("location: ../settings.php");
        }
    }
    if (!empty($_POST['newUsername'])) {
        $exists = false;
        mysqli_stmt_prepare($stmt, "SELECT username FROM user");
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $username);
            while (mysqli_stmt_fetch($stmt)) {
                if ($newUsername == $username) {
                    $exists = true;
                    break;
                }
            }
        } else
            exit(mysqli_stmt_error($stmt));

        if (!$exists) {
            mysqli_stmt_prepare($stmt, "UPDATE user set username=? where username=?");
            mysqli_stmt_bind_param($stmt, "ss", $newUsername, $currusername);
            if (mysqli_stmt_execute($stmt)) {
                $currName = $newName;
                $_SESSION['username'] = $newUsername;
                $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
                $_SESSION['message'] .= "Success! Updated username.";
                header("location: ../settings.php");
            } else {
                $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
                $_SESSION['message'] .= "Error: Failed to update username";
                header("location: ../settings.php");
            }
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Chosen username already exists. Please select a different username";
            header("location: ../settings.php");
        }
    }
}
