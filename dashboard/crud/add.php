<?php
include_once "../../inc/.env.php";
session_start();
$class="";
function validDate()
{
  $d = DateTime::createFromFormat('m/d/Y', $_POST['dob']);
  return $d && $d->format('m/d/Y') == $_POST['dob'];
}

// check if student enrolled in school was born after the school start date
function dobPastEnrollemnt(){
  $dob_no_year = date_create_from_format('m/d/Y', $_POST['dob']);
  $dob = date_format($dob_no_year, 'm-d');
  $schoolStartDate = date("m-d", mktime(0,0,0,9,1,0));

  if($dob > $schoolStartDate)
    return True;
  else
    return False;
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
// Add students
if (isset($_POST['addStudents'])) {
  // checks if username or email exists already
  $check_username = "SELECT * FROM students WHERE username=? or email=?";

  // preparing statement
  mysqli_stmt_prepare($stmt, $check_username);
  mysqli_stmt_bind_param($stmt, 'ss', $_POST['username'],$_POST['email']);

  if (!mysqli_stmt_execute($stmt))
    exit(mysqli_stmt_error($stmt));

  mysqli_stmt_store_result($stmt);

  // if username or email is taken, print error 
  if (mysqli_stmt_num_rows($stmt) > 0) {
    $_SESSION['message'] = "ERROR: username or email already taken.";
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
      $dob = date_create_from_format('m/d/Y', $_POST['dob']);
      $formatedDate = date_format($dob, 'Y-m-d');

      // gets age
      $age = date_diff(date_create($_POST['dob']), date_create('now'))->y;

      // prevent entering a dob greater than current day
      $currDate = date("Y-m-d");
      if ($currDate < $formatedDate || ($age > 19 || $age < 14)) {
        $_SESSION['message'] = "Error: Student age must be between 14-19 years old and date of birth cannot be in the future ";
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

        // provide classification based on age
        if (($age == 14 || ($age == 15 && !dobPastEnrollemnt())))
          $class = "Freshman";
        else if ($age == 15 || ($age == 16 && !dobPastEnrollemnt()))
          $class = "Sophmore";
        else if ($age == 16 || ($age == 17 && !dobPastEnrollemnt()))
          $class = "Junior";
        else
          $class = "Senior";

        $insert = "INSERT INTO students (id,username,email,password,name,dob,age,class,gender,phone) values (?,?,?,?,?,?,?,?,?,?)";
  
        // prepare for insert
        mysqli_stmt_prepare($stmt, $insert);
        mysqli_stmt_bind_param($stmt, "isssssisss", $id, $_POST['username'], $_POST['email'],password_hash($_POST['username'], PASSWORD_DEFAULT), $_POST['name'], $formatedDate, $age, $class,$_POST['gender'], $_POST['phone']);

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
