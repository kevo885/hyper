<?php
include_once "../../inc/.env.php";
session_start();

// update user info
if (isset($_POST['updateUser'])) {

    // grabs logged in user info
    mysqli_stmt_prepare($stmt, "select * from user where id=?");
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
    if (!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $userID, $currUsername, $currPassword, $currName, $currDob, $currPhone, $currGender, $currAge);
    mysqli_stmt_fetch($stmt);

     // new user info
     $newName = $_POST['newName'];
     $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
     $newUsername = $_POST['newUsername'];
     $newDob = $_POST['newDob'];
     $newGender = $_POST['newGender'];
     $newPhone = $_POST['newPhone'];
     $newAge = $_POST['newAge'];

    // if no input field was entered before submitting form
    if (empty($newName) && empty($newUsername) && empty($_POST['newPassword'])) {
        $_SESSION['alert'] = "alert alert-warning alert-dismissible fade show";
        $_SESSION['message'] = "Warning: User profile not updated - did not enter any inputs";
        header("location: ../settings.php");
        exit();
    }
    if (!empty($newName)) {
        // update name
        mysqli_stmt_prepare($stmt, "UPDATE user set name=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newName, $userID);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
            $_SESSION['message'] .= "Success! Updated name";
            header("location: ../settings.php");
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Failed to update name";
            header("location: ../settings.php");
        }
    }
    if (!empty($_POST['newPassword'])) {
        mysqli_stmt_prepare($stmt, "UPDATE user set password=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newPassword, $userID);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
            $_SESSION['message'] .= "Success! Updated password.";
            header("location: ../settings.php");
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Failed to update password";
            header("location: ../settings.php");
        }
    }
    if (!empty($newUsername)) {
        $exists = false;
        mysqli_stmt_prepare($stmt, "SELECT username FROM user");
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $currUsername);
            while (mysqli_stmt_fetch($stmt)) {
                if ($newUsername == $currUsername) {
                    $exists = true;
                    break;
                }
            }
        } else
            exit(mysqli_stmt_error($stmt));

        if (!$exists) {
            mysqli_stmt_prepare($stmt, "UPDATE user set username=? where id=?");
            mysqli_stmt_bind_param($stmt, "ss", $newUsername, $userID);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
                $_SESSION['message'] .= "Success! Updated username.";
                header("location: ../settings.php");
            } else {
                $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
                $_SESSION['message'] .= "Error: Failed to update username";
                header("location: ../settings.phpD");
            }
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Chosen username already exists. Please select a different username";
            header("location: ../settings.php");
        }
    }
}

// update other teacher info
if (isset($_POST['update-teacher'])) {

    $userID = $_GET['id'];

    // fetch selected course info
    mysqli_stmt_prepare($stmt, "SELECT * from user where id = ?");
    mysqli_stmt_bind_param($stmt, "i", $userID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $userID, $currUsername, $currPassword, $currName, $currDob, $currPhone, $currGender, $currAge);
        mysqli_stmt_fetch($stmt);
    } else
        exit(mysqli_stmt_error($stmt));

    // if no input field was entered before submitting form
    if (empty($_POST['newName']) && empty($_POST['newUsername']) && empty($_POST['newPassword'])) {
        $_SESSION['alert'] = "alert alert-warning alert-dismissible fade show";
        $_SESSION['message'] = "Warning: User profile not updated - did not enter any inputs.";
        header("location: ../settings.php?id=$userID");
        exit();
    }
    // current user info
    $currName = $_SESSION['name'];
    $currNumber = $_SESSION['username'];
    $currDesc = $_SESSION['password'];

    // new user info
    $newName = $_POST['newName'];
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $newUsername = $_POST['newUsername'];

    if (!empty($_POST['newName'])) {
        // update name
        mysqli_stmt_prepare($stmt, "UPDATE user set name=? where username=?");
        mysqli_stmt_bind_param($stmt, "ss", $newName, $currNumber);
        if (mysqli_stmt_execute($stmt)) {
            $currName = $newName;
            $_SESSION['name'] = $newName;

            $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
            $_SESSION['message'] .= "Success! Updated name.";
            header("location: ../settings.php?id=$userID");
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Failed to update name";
            header("location: ../settings.php?id=$userID");
        }
    }
    if (!empty($_POST['newPassword'])) {
        mysqli_stmt_prepare($stmt, "UPDATE user set password=? where username=?");
        mysqli_stmt_bind_param($stmt, "ss", $newPassword, $currNumber);
        if (mysqli_stmt_execute($stmt)) {
            $currName = $newName;
            $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
            $_SESSION['message'] .= "Success! Updated password.";
            header("location: ../settings.php?id=$userID");
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Failed to update password";
            header("location: ../settings.php?id=$userID");
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
            mysqli_stmt_bind_param($stmt, "ss", $newUsername, $currNumber);
            if (mysqli_stmt_execute($stmt)) {
                $currName = $newName;
                $_SESSION['username'] = $newUsername;
                $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
                $_SESSION['message'] .= "Success! Updated username.";
                header("location: ../settings.php?id=$userID");
            } else {
                $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
                $_SESSION['message'] .= "Error: Failed to update username";
                header("location: ../settings.php?id=$userID");
            }
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Chosen username already exists. Please select a different username";
            header("location: ../settings.php?id=$userID");
        }
    }
}

// update course
if (isset($_POST['updateCourse'])) {
    $courseID = $_GET['courseID'];

    // fetch selected course info
    mysqli_stmt_prepare($stmt, "SELECT * from courses where courseID = ?");
    mysqli_stmt_bind_param($stmt, "i", $courseID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $courseID, $currName, $currNumber, $currDesc, $enrolled);
        mysqli_stmt_fetch($stmt);
    } else
        exit(mysqli_stmt_error($stmt));

    // if no input field was entered before submitting form
    if (empty($_POST['newCourseName']) && empty($_POST['newCourseNumber']) && empty($_POST['newDesc'])) {
        $_SESSION['alert'] = "alert alert-warning alert-dismissible fade show";
        $_SESSION['message'] = "Warning: Course not updated, did not enter any inputs";
        header("location: ../modify-courses.php?courseID=$courseID");
        exit();
    }
    // new Course info
    $newCourseName = $_POST['newCourseName'];
    $newDesc = $_POST['newDesc'];
    $newCourseNumber = $_POST['newCourseNumber'];

    if (!empty($_POST['newCourseName'])) {
        // update name
        mysqli_stmt_prepare($stmt, "UPDATE courses set courseName=? where courseID=?");
        mysqli_stmt_bind_param($stmt, "ss", $newCourseName, $courseID);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
            $_SESSION['message'] .= "Success! Updated name.";
            header("location: ../modify-courses.php?courseID=$courseID");
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Failed to update name";
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
    if (!empty($_POST['newDesc'])) {
        mysqli_stmt_prepare($stmt, "UPDATE courses set descr=? where courseID=?");
        mysqli_stmt_bind_param($stmt, "ss", $newDesc, $courseID);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
            $_SESSION['message'] .= "Success! Updated descrption.";
            header("location: ../modify-courses.php?courseID=$courseID");
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Failed to update descrption";
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
    if (!empty($_POST['newCourseNumber'])) {
        $exists = false;
        mysqli_stmt_prepare($stmt, "SELECT courseNumber FROM courses");
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $courseNumber);
            while (mysqli_stmt_fetch($stmt)) {
                if ($newCourseNumber == $courseNumber) {
                    $exists = true;
                    break;
                }
            }
        } else
            exit(mysqli_stmt_error($stmt));

        if (!$exists) {
            mysqli_stmt_prepare($stmt, "UPDATE courses set courseNumber=? where courseID=?");
            mysqli_stmt_bind_param($stmt, "ss", $newCourseNumber, $courseID);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
                $_SESSION['message'] .= "Success! Updated course number.";
                header("location: ../modify-courses.php?courseID=$courseID");
            } else {
                $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
                $_SESSION['message'] .= "Error: Failed to update course number";
                header("location: ../modify-courses.php?courseID=$courseID");
            }
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Course number already exists";
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
}
