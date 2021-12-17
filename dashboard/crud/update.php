<?php
include_once "../../inc/.env.php";
session_start();

function validDate()
{
    $d = DateTime::createFromFormat('m/d/Y', $_POST['newDob']);
    return $d && $d->format('m/d/Y') == $_POST['newDob'];
}
// update user info
if (isset($_POST['updateUser'])) {

    if (isset($_GET['id'])) {
        $userID = $_GET['id'];

        // fetch selected course info
        mysqli_stmt_prepare($stmt, "SELECT * from user where id = ?");
        mysqli_stmt_bind_param($stmt, "i", $userID);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $userID, $currUsername, $currPassword, $currName, $currDob, $currPhone, $currGender, $currAge);
            mysqli_stmt_fetch($stmt);
        } else
            exit(mysqli_stmt_error($stmt));
    } else {
        // grabs logged in user info
        mysqli_stmt_prepare($stmt, "SELECT * from user where id=?");
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
        if (!mysqli_stmt_execute($stmt)) exit(mysqli_stmt_error($stmt));

        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $userID, $currUsername, $currPassword, $currName, $currDob, $currPhone, $currGender, $currAge);
        mysqli_stmt_fetch($stmt);
    }
    // new user info
    $newName = $_POST['newName'];
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $newUsername = $_POST['newUsername'];
    $newDob = $_POST['newDob'];
    $newGender = $_POST['newGender'];
    $newPhone = $_POST['newPhone'];

    // if no input field was entered before submitting form
    if (empty($newName) && empty($newUsername) && empty($_POST['newPassword']) && empty($newPhone) && empty($newDob) && empty($newGender)) {
        $_SESSION['alert'] = "alert alert-warning alert-dismissible fade show";
        $_SESSION['message'] = "Warning: User profile not updated - did not enter any inputs";
        if (isset($_GET['id']))
            header("location: ../settings.php?id=$userID");
        else
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
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$userID");
            else
                header("location: ../settings.php");
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Failed to update name";
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$userID");
            else
                header("location: ../settings.php");
        }
    }
    // update username
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
                if (isset($_GET['id']))
                    header("location: ../settings.php?id=$userID");
                else
                    header("location: ../settings.php");
            } else {
                $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
                $_SESSION['message'] .= "Error: Failed to update username";
                if (isset($_GET['id']))
                    header("location: ../settings.php?id=$userID");
                else
                    header("location: ../settings.php");
            }
        } else {
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            $_SESSION['message'] .= "Error: Chosen username already exists. Please select a different username";
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$userID");
            else
                header("location: ../settings.php");
        }
    }
}
// update password
if (!empty($_POST['newPassword'])) {
    mysqli_stmt_prepare($stmt, "UPDATE user set password=? where id=?");
    mysqli_stmt_bind_param($stmt, "ss", $newPassword, $userID);
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
        $_SESSION['message'] .= "Success! Updated password.";
        if (isset($_GET['id']))
            header("location: ../settings.php?id=$userID");
        else
            header("location: ../settings.php");
    } else {
        $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
        $_SESSION['message'] .= "Error: Failed to update password";
        if (isset($_GET['id']))
            header("location: ../settings.php?id=$userID");
        else
            header("location: ../settings.php");
    }
}

// update gender
if (!empty($newGender)) {
    mysqli_stmt_prepare($stmt, "UPDATE user set gender=? where id=?");
    mysqli_stmt_bind_param($stmt, "ss", $newGender, $userID);
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
        $_SESSION['message'] .= "Success! Updated gender.";
        if (isset($_GET['id']))
            header("location: ../settings.php?id=$userID");
        else
            header("location: ../settings.php");
    } else {
        $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
        $_SESSION['message'] .= "Error: Failed to update gender";
        if (isset($_GET['id']))
            header("location: ../settings.php?id=$userID");
        else
            header("location: ../settings.php");
    }
}

// update phone
if (!empty($newPhone)) {
    mysqli_stmt_prepare($stmt, "UPDATE user set phone=? where id=?");
    mysqli_stmt_bind_param($stmt, "ss", $newPhone, $userID);
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
        $_SESSION['message'] .= "Success! Updated Phone.";
        if (isset($_GET['id']))
            header("location: ../settings.php?id=$userID");
        else
            header("location: ../settings.php");
    } else {
        $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
        $_SESSION['message'] .= "Error: Failed to update Phone - check for valid format.";
        if (isset($_GET['id']))
            header("location: ../settings.php?id=$userID");
        else
            header("location: ../settings.php");
    }
}

// update date of birth
if (!empty($newDob)) {

    // if invalid date 
    if (!validDate()) {
        $_SESSION['message'] = "Error: Invalid date - must be in format mm/dd/yyyy";
        $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
        if (isset($_GET['id']))
            header("location: ../settings.php?id=$userID");
        else
            header("location: ../settings.php");
    } else {
        $date = date_create_from_format('m/d/Y', $newDob);
        $formatedDate = date_format($date, 'Y-m-d');

        // gets age
        $newAge = date_diff(date_create($newDob), date_create('now'))->y;

        // prevent entering a dob greater than current day
        $currDate = date("Y-m-d");

        if ($currDate < $formatedDate || $newAge < 18 || $newAge > 65) {
            $_SESSION['message'] = "Error: Age must be in range 18-65";
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$userID");
            else
                header("location: ../settings.php");
        } else {
            mysqli_stmt_prepare($stmt, "UPDATE user set dob=?, age=? where id=?");
            mysqli_stmt_bind_param($stmt, "sis", $formatedDate, $newAge, $userID);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
                $_SESSION['message'] .= "Success! Updated Birthday.";
                if (isset($_GET['id']))
                    header("location: ../settings.php?id=$userID");
                else
                    header("location: ../settings.php");
            } else {
                $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
                $_SESSION['message'] .= "Error: Failed to update birthday";
                if (isset($_GET['id']))
                    header("location: ../settings.php?id=$userID");
                else
                    header("location: ../settings.php");
            }
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
        mysqli_stmt_bind_result($stmt, $courseID, $courseName, $courseNumber, $desc, $subject, $avaliable, $credit, $campus);
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
