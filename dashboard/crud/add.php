<?php
include_once "../../inc/.env.php";
session_start();

if (isset($_POST['addCourse'])) {
  $courseName = $_POST['course_name'];
  $courseNumber = $_POST['number'];
  $desc = $_POST['desc'];
 
  if (!ctype_digit($courseNumber)) {
    $_SESSION['message'] = "Course number must be a positive integer";
    $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
    header("location: ../courses.php");
    exit();
  }
    // checks if course number already exists
    $check_course = "SELECT * FROM courses WHERE courseNumber=?";

    // preparing statement
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

    if (isset($_POST['checked']))
      $enrolled = "Enrolled";

    else
      $enrolled = "Not Enrolled";

    // if no errors insert into database.
    $query = "INSERT into courses (courseName,courseNumber,descr,enrolled) values (?,?,?,?)";
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $courseName, $courseNumber, $desc,$enrolled);
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
