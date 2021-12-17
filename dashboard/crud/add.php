<?php
include_once "../../inc/.env.php";
session_start();

if (isset($_POST['addCourse'])) {
  $courseName = $_POST['courseName'];
  $courseNumber = $_POST['courseNumber'];
  $desc = $_POST['desc'];
  $credit = $_POST['credit'];
  $campus = $_POST['campus'];
  $subject = $_POST['subject'];
  $avaliable = $_POST['avaliable'];

  // checks if course number already exists
  $check_course = "SELECT * FROM courses WHERE courseNumber=?";

  // preparing statement to check if course exists already
  mysqli_stmt_prepare($stmt, $check_course);
  mysqli_stmt_bind_param($stmt, 's', $courseNumber);

  if (!mysqli_stmt_execute($stmt))
    exit(mysqli_stmt_error($stmt));

  mysqli_stmt_store_result($stmt);

  // if course number exists return error 
  if (mysqli_stmt_num_rows($stmt) > 0) {
    $_SESSION['message'] = "ERROR: Course already registered";
    $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
    header("Location: ../courses.php");
    exit();
  }
  // if no errors insert into database.
  $query = "INSERT into courses (courseName,courseNumber,descr,credit,campus,avaliable,subject) values (?,?,?,?,?,?,?)";
  mysqli_stmt_prepare($stmt, $query);
  mysqli_stmt_bind_param($stmt, "sssssss", $courseName, $courseNumber, $desc, $credit, $campus, $avaliable, $subject);
  $result = mysqli_stmt_execute($stmt);

  if (!$result) {
    $_SESSION['message'] = mysqli_stmt_error($stmt);
    $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
    header("location: ../courses.php");
    exit();
  } else {
    $_SESSION['message'] = "Successfully added $courseName";
    $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
    header("location: ../courses.php");
    exit();
  }
}
