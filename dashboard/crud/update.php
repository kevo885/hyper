<?php
include_once "../../inc/.env.php";
include_once "../inc/updateFunctions.php";
include_once "../../inc/alerts.php";
session_start();
$class = "";
// update user info
if (isset($_POST['updateUser'])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // fetch selected user
        mysqli_stmt_prepare($stmt, "SELECT * from user where id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $currUsername, $currPassword, $currName, $currDob, $currPhone, $currGender, $currAge);
            mysqli_stmt_fetch($stmt);
        } else
            exit(mysqli_stmt_error($stmt));
    } else {
        // grabs logged in user info
        mysqli_stmt_prepare($stmt, "SELECT * from user where id=?");
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
        if (!mysqli_stmt_execute($stmt)) exit(mysqli_stmt_error($stmt));

        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id, $currUsername, $currPassword, $currName, $currDob, $currPhone, $currGender, $currAge);
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
        message("alert alert-warning alert-dismissible fade show", "Warning: did not enter any input");

        if (isset($_GET['id']))
            header("location: ../settings.php?id=$id");
        else
            header("location: ../settings.php");
        exit();
    }
    if (!empty($newName)) {
        // update name
        mysqli_stmt_prepare($stmt, "UPDATE user set name=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newName, $id);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-danger alert-dismissible fade show", "updated name ");
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
            else
                header("location: ../settings.php");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update name ");
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
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
            mysqli_stmt_bind_param($stmt, "ss", $newUsername, $id);
            if (mysqli_stmt_execute($stmt)) {
                message("alert alert-info alert-dismissible fade show", "updated username");
                if (isset($_GET['id']))
                    header("location: ../settings.php?id=$id");
                else
                    header("location: ../settings.php");
            } else {
                message("alert alert-danger alert-dismissible fade show", "failed to update username ");
                if (isset($_GET['id']))
                    header("location: ../settings.php?id=$id");
                else
                    header("location: ../settings.php");
            }
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update username - username already exists");
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
            else
                header("location: ../settings.php");
        }
    }
    // update password
    if (!empty($_POST['newPassword'])) {
        mysqli_stmt_prepare($stmt, "UPDATE user set password=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newPassword, $id);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated password");
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
            else
                header("location: ../settings.php");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update password");
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
            else
                header("location: ../settings.php");
        }
    }

    // update gender
    if (!empty($newGender)) {
        mysqli_stmt_prepare($stmt, "UPDATE user set gender=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newGender, $id);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "failed to update gender ");
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
            else
                header("location: ../settings.php");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update gender ");
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
            else
                header("location: ../settings.php");
        }
    }

    // update phone
    if (!empty($newPhone)) {
        mysqli_stmt_prepare($stmt, "UPDATE user set phone=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newPhone, $id);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated phone ");

            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
            else
                header("location: ../settings.php");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update phone ");
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
            else
                header("location: ../settings.php");
        }
    }
    // update date of birth
    if (!empty($newDob)) {

        // if invalid date 
        if (!validDate()) {
            message("alert alert-danger alert-dismissible fade show", "failed to update birthday - check formatting ");
            if (isset($_GET['id']))
                header("location: ../settings.php?id=$id");
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
                message("alert alert-danger alert-dismissible fade show", "Error: age must be between 18-65");
                if (isset($_GET['id']))
                    header("location: ../settings.php?id=$id");
                else
                    header("location: ../settings.php");
            } else {
                mysqli_stmt_prepare($stmt, "UPDATE user set dob=?, age=? where id=?");
                mysqli_stmt_bind_param($stmt, "sis", $formatedDate, $newAge, $id);
                if (mysqli_stmt_execute($stmt)) {
                    message("alert alert-info alert-dismissible fade show", "updated birthday ");

                    if (isset($_GET['id']))
                        header("location: ../settings.php?id=$id");
                    else
                        header("location: ../settings.php");
                } else {
                    message("alert alert-danger alert-dismissible fade show", "Error: Failed to update birthday ");
                    if (isset($_GET['id']))
                        header("location: ../settings.php?id=$id");
                    else
                        header("location: ../settings.php");
                }
            }
        }
    }
}

// update student info
if (isset($_POST['updateStudent'])) {
    if (isset($_GET['studentID'])) {
        $studentID = $_GET['studentID'];

        // fetch selected student
        mysqli_stmt_prepare($stmt, "SELECT * from students where id = ?");
        mysqli_stmt_bind_param($stmt, "i", $_GET['studentID']);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $studentID, $currEmail, $currUsername, $currPassword, $currName, $currDob, $currPhone, $currGender, $currAge, $currGpa, $currClass);
            mysqli_stmt_fetch($stmt);
        } else
            exit(mysqli_stmt_error($stmt));
    }
    // new student info
    $newName = $_POST['newName'];
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    $newDob = $_POST['newDob'];
    $newGender = $_POST['newGender'];
    $newPhone = $_POST['newPhone'];

    // if no input field was entered before submitting form
    if (empty($newName) && empty($newUsername) && empty($_POST['newPassword']) && empty($newPhone) && empty($newDob) && empty($newGender) && empty($newEmail)) {
        message("alert alert-warning alert-dismissible fade show", "Warning: User profile not updated - did not enter any inputs");
        header("location: ../settings.php?studentID=$studentID");
        exit();
    }
    if (!empty($newName)) {
        // update name
        mysqli_stmt_prepare($stmt, "UPDATE students set name=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newName, $studentID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "Updated name ");
            header("location: ../settings.php?studentID=$studentID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update name");
            header("location: ../settings.php?studentID=$studentID");
        }
    }
    // update username
    if (!empty($newUsername)) {
        $exists = false;
        mysqli_stmt_prepare($stmt, "SELECT username FROM students");
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
            mysqli_stmt_prepare($stmt, "UPDATE students set username=? where id=?");
            mysqli_stmt_bind_param($stmt, "ss", $newUsername, $studentID);
            if (mysqli_stmt_execute($stmt)) {
                message("alert alert-info alert-dismissible fade show", "updated username ");
                header("location: ../settings.php?studentID=$studentID");
            } else {
                message("alert alert-danger alert-dismissible fade show", "failed to update username ");
                header("location: ../settings.php?studentID=$studentID");
            }
        } else {
            message("alert alert-danger alert-dismissible fade show", "Error: Chosen username already exists ");
            header("location: ../settings.php?studentID=$studentID");
        }
    }
    // update password
    if (!empty($_POST['newPassword'])) {
        mysqli_stmt_prepare($stmt, "UPDATE students set password=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newPassword, $studentID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated password ");
            header("location: ../settings.php?studentID=$studentID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update password ");
            header("location: ../settings.php?studentID=$studentID");
        }
    }

    // update gender
    if (!empty($newGender)) {
        mysqli_stmt_prepare($stmt, "UPDATE students set gender=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newGender, $studentID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated gender ");
            header("location: ../settings.php?studentID=$studentID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update gender ");
            header("location: ../settings.php?studentID=$studentID");
        }
    }

    // update phone
    if (!empty($newPhone)) {
        mysqli_stmt_prepare($stmt, "UPDATE students set phone=? where id=?");
        mysqli_stmt_bind_param($stmt, "ss", $newPhone, $studentID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated phone ");
            header("location: ../settings.php?studentID=$studentID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update Phone - check for valid format ");
            header("location: ../settings.php?studentID=$studentID");
        }
    }
    // update date of birth
    if (!empty($newDob)) {
        // if invalid date 
        if (!validDate()) {
            message("alert alert-danger alert-dismissible fade show", "Invalid date - must be in format mm/dd/yyyy ");
            header("location: ../settings.php?studentID=$studentID");
        } else {
            if (checkAge()) {
                message("alert alert-danger alert-dismissible fade show", "failed to update age, age must be between 14-19 ");
                header("location: ../settings.php?studentID=$studentID");
            } else {
                $date = date_create_from_format('m/d/Y', $newDob);
                $formatedDate = date_format($date, 'Y-m-d');
                $newAge = date_diff(date_create($newDob), date_create('now'))->y;
                // provide classification based on age
                if (($newAge == 14 || ($newAge == 15 && !dobPastEnrollemnt())))
                    $class = "Freshman";
                else if ($newAge == 15 || ($newAge == 16 && !dobPastEnrollemnt()))
                    $class = "Sophmore";
                else if ($newAge == 16 || ($newAge == 17 && !dobPastEnrollemnt()))
                    $class = "Junior";
                else
                    $class = "Senior";

                mysqli_stmt_prepare($stmt, "UPDATE students set dob=?, age=?,class=? where id=?");
                mysqli_stmt_bind_param($stmt, "siss", $formatedDate, $newAge, $class, $studentID);
                if (mysqli_stmt_execute($stmt)) {
                    message("alert alert-info alert-dismissible fade show", "updated dob, age, and class ");
                    header("location: ../settings.php?studentID=$studentID");
                } else {
                    message("alert alert-danger alert-dismissible fade show", "Error: Failed to update birthday ");
                    header("location: ../settings.php?studentID=$studentID");
                }
            }
        }
    }
}

// update course
if (isset($_POST['updateCourse'])) {
    $courseID = $_GET['courseID'];
    $newCourseName = $_POST['newCourseName'];
    $newDesc = $_POST['newDesc'];
    $newCourseNumber = $_POST['newCourseNumber'];
    $newCredit = $_POST['newCredit'];
    $newCampus = $_POST['newCampus'];
    $newSubject = $_POST['newSubject'];
    $newAvaliablitiy = $_POST['newAvaliableSeats'];

    // fetch selected course info
    mysqli_stmt_prepare($stmt, "SELECT * from courses where courseID = ?");
    mysqli_stmt_bind_param($stmt, "i", $courseID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $courseID, $courseName, $courseNumber, $desc, $subject, $avaliable, $credit, $campus);
        mysqli_stmt_fetch($stmt);
    } else
        exit(mysqli_stmt_error($stmt));

    // if no input field was entered before submitting form
    if (empty($newCourseName) && empty($newCourseNumber) && empty($newAge)  && empty($newCredit)  && empty($newDesc)  && empty($newCampus)  && empty($newSubject)  && empty($newAvaliablitiy)) {
        message("alert alert-warning alert-dismissible fade show", "Warning: did not enter any input");
        header("location: ../modify-courses.php?courseID=$courseID");
        exit();
    }
    if (!empty($newCourseName)) {
        // update name
        mysqli_stmt_prepare($stmt, "UPDATE courses set courseName=? where courseID=?");
        mysqli_stmt_bind_param($stmt, "ss", $newCourseName, $courseID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "info: updated name ");
            header("location: ../modify-courses.php?courseID=$courseID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update name ");
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
    if (!empty($newDesc)) {
        mysqli_stmt_prepare($stmt, "UPDATE courses set descr=? where courseID=?");
        mysqli_stmt_bind_param($stmt, "ss", $newDesc, $courseID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated descrption ");
            header("location: ../modify-courses.php?courseID=$courseID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update descrption ");
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
    if (!empty($newCredit)) {
        mysqli_stmt_prepare($stmt, "UPDATE courses set credit=? where courseID=?");
        mysqli_stmt_bind_param($stmt, "is", $newCredit, $courseID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated credit hours ");
            header("location: ../modify-courses.php?courseID=$courseID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update credit hours ");
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
    if (!empty($newAvaliablitiy)) {
        mysqli_stmt_prepare($stmt, "UPDATE courses set avaliable=? where courseID=?");
        mysqli_stmt_bind_param($stmt, "is", $newAvaliablitiy, $courseID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated avaliable seats ");
            header("location: ../modify-courses.php?courseID=$courseID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update avaliable seats ");
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
    if (!empty($newCampus)) {
        mysqli_stmt_prepare($stmt, "UPDATE courses set campus=? where courseID=?");
        mysqli_stmt_bind_param($stmt, "ss", $newCampus, $courseID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated campus ");
            header("location: ../modify-courses.php?courseID=$courseID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update campus ");
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
    if (!empty($newSubject)) {
        mysqli_stmt_prepare($stmt, "UPDATE courses set subject=? where courseID=?");
        mysqli_stmt_bind_param($stmt, "ss", $newSubject, $courseID);
        if (mysqli_stmt_execute($stmt)) {
            message("alert alert-info alert-dismissible fade show", "updated subjec t");
            header("location: ../modify-courses.php?courseID=$courseID");
        } else {
            message("alert alert-danger alert-dismissible fade show", "failed to update subject ");
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
    if (!empty($newCourseNumber)) {
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
                message("alert alert-info alert-dismissible fade show", "updated course number ");
                header("location: ../modify-courses.php?courseID=$courseID");
            } else {
                message("alert alert-danger alert-dismissible fade show", "failed to update course number ");
                header("location: ../modify-courses.php?courseID=$courseID");
            }
        } else {
            message("alert alert-danger alert-dismissible fade show", "error: course number already exists ");
            header("location: ../modify-courses.php?courseID=$courseID");
        }
    }
}
