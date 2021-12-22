<?php
include_once "../../inc/.env.php";
session_start();

// convert phone number
function checkPhone()
{
  $possibleNumbers = explode("\n", '(111) 222-3333
       ((111) 222-3333
       1112223333
       111 222-3333
       111-222-3333
       (111)2223333
       +11234567890
           1-8002353551
           123-456-7890   -Hello!
       +1 - 1234567890 
       ');

  if (preg_match('/.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*/', $_POST['phone'])) {
    foreach ($possibleNumbers as $numbers) {
      $phone = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $_POST['phone']) . "\n";
    }
    return $phone;
  } else {
    $_SESSION['message'] = "ERROR: Invalid phone number";
    $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
    header("location: ../students.php");
    exit();
  }
}
function validDate()
{
  $d = DateTime::createFromFormat('m/d/Y', $_POST['dob']);
  return $d && $d->format('m/d/Y') == $_POST['dob'];
}

// add course
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
  mysqli_stmt_bind_param($stmt, "sssisis", $courseName, $courseNumber, $desc, $credit, $campus, $avaliable, $subject);
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
// sign up / create users (students) 
if (isset($_POST['addStudents'])) {
  // checks if username exists already
  $check_username = "SELECT * FROM students WHERE username=?";

  // preparing statement
  mysqli_stmt_prepare($stmt, $check_username);
  mysqli_stmt_bind_param($stmt, 's', $_POST['username']);

  if (!mysqli_stmt_execute($stmt))
    exit(mysqli_stmt_error($stmt));

  mysqli_stmt_store_result($stmt);

  // if username is taken, print error 
  if (mysqli_stmt_num_rows($stmt) > 0) {
    $_SESSION['message'] = "ERROR: username already taken.";
    $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
    header("location: ../students.php");
    exit();
  }
  // if  username isn't taken, insert into database
  else {

    // if invalid date 
    if (!validDate()) {
      $_SESSION['message'] = "Error: Invalid date - must be in format mm/dd/yyyy";
      $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
      header("location: ../students.php");
      exit();
    }
    // if valid date format 
    else {
      $date = date_create_from_format('m/d/Y', $_POST['dob']);
      $formatedDate = date_format($date, 'Y-m-d');

      // gets age
      $age = date_diff(date_create($_POST['dob']), date_create('now'))->y;

      // prevent entering a dob greater than current day
      $currDate = date("Y-m-d");
      if ($currDate < $formatedDate || ($age > 19 || $age < 13)) {
        $_SESSION['message'] = "Error: Student age must be between 13-19 years old and date of birth cannot be in the future ";
        $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
        header("location: ../students.php");
        exit();
      } else {
        // assign students ID
        $id = rand(100000, 999999);

        mysqli_stmt_prepare($stmt, "SELECT id from students");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $checkID);
        // check if random id is assigned yet
        while (mysqli_stmt_fetch($stmt)) {
          if ($checkID == $id) {
            $_SESSION['message'] = "Error: ID already exists, please try again.";
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            header("location: ../students.php");
            exit();
          }
        }
        $insert = "INSERT INTO students (id,username,password,name,dob,age,gender,phone) values (?,?,?,?,?,?,?,?)";

        // prepare for insert
        mysqli_stmt_prepare($stmt, $insert);
        mysqli_stmt_bind_param($stmt, "issssiss", $id, $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['name'], $formatedDate, $age, $_POST['gender'], checkPhone());

        if (!mysqli_stmt_execute($stmt)) {
          $_SESSION['message'] = mysqli_stmt_error($stmt);
          $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
          header("location: ../students.php");
          exit();
        }
        // successfully created students, redirect to login page
        else {
          $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";

          $_SESSION['message'] = "Successfully added $_POST[username]";
          header("location: ../students.php");
          exit();
        }
      }
    }
  }
}
