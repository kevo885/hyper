<?php
include_once ".env.php";
session_start();
function validDate()
{
    $d = DateTime::createFromFormat('m/d/Y', $_POST['dob']);
    return $d && $d->format('m/d/Y') == $_POST['dob'];
}
// sign up / create users (user) 
if (isset($_POST['sign-up']) || isset($_POST['add_user'])) {
    // checks if username exists already
    $check_username = "SELECT * FROM user WHERE username=?";

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

        if (isset($_POST['add_user'])) {
            header("location: ../dashboard/users.php");
            exit();
        } else {
            header("location: ../auth/register.php");
            exit();
        }
    }
    // if  username isn't taken, insert into database
    else {

        // if invalid date 
        if (!validDate()) {
            $_SESSION['message'] = "Error: Invalid date - must be in format mm/dd/yyyy";
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            if (isset($_POST['add_user'])) {
                header("location: ../dashboard/users.php");
                exit();
            } else {
                header("location: ../auth/register.php");
                exit();
            }
        }
        // if valid date format 
        else {
            $date = date_create_from_format('m/d/Y', $_POST['dob']);
            $formatedDate = date_format($date, 'Y-m-d');

            // gets age
            $age = date_diff(date_create($_POST['dob']), date_create('now'))->y;

            // prevent entering a dob greater than current day
            $currDate = date("Y-m-d");
            if ($currDate < $formatedDate || $age < 18) {
                $_SESSION['message'] = "Error: Age must be at least 18 years old and date of birth cannot be in the future ";
                $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
                if (isset($_POST['add_user'])) {
                    header("location: ../dashboard/users.php");
                    exit();
                } else {
                    header("location: ../auth/register.php");
                    exit();
                }
            } else {
                // assign user ID
                $id = rand(100000, 999999);

                mysqli_stmt_prepare($stmt, "SELECT id from user");
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $checkID);
                // check if random id is assigned yet
                while (mysqli_stmt_fetch($stmt)) {
                    if ($checkID == $id) {
                        $_SESSION['message'] = "Error: ID already exists, please try again.";
                        $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
                        if (isset($_POST['add_user'])) {
                            header("location: ../dashboard/users.php");
                            exit();
                        } else {
                            header("location: ../auth/register.php");
                            exit();
                        }
                    }
                }
                $insert = "INSERT INTO user (id,username,password,name,dob,age,gender,phone) values (?,?,?,?,?,?,?,?)";

                // prepare for insert
                mysqli_stmt_prepare($stmt, $insert);
                mysqli_stmt_bind_param($stmt, "issssiss", $id, $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['name'], $formatedDate, $age, $_POST['gender'], $_POST['phone']);

                if (!mysqli_stmt_execute($stmt)) {
                    $_SESSION['message'] = mysqli_stmt_error($stmt);
                    $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";

                    if (isset($_POST['add_user'])) {
                        header("location: ../dashboard/users.php");
                        exit();
                    } else {
                        header("location: ../auth/register.php");
                        exit();
                    }
                }
                // successfully created user, redirect to login page
                else {
                    $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";

                    if (isset($_POST['add_user'])) {
                        $_SESSION['message'] = "Successfully added $_POST[username]";
                        header("location: ../dashboard/users.php");
                        exit();
                    } else {
                        $_SESSION['message'] = "Successfully created account! Sign in below";
                        header("location: ../auth/login.php");
                        exit();
                    }
                }
            }
        }
    }
}
// sign in
if (isset($_POST['sign-in'])) {
    $sql = 'SELECT id,password FROM user WHERE username = ?';

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $_POST['username']);
    if (!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_store_result($stmt);

    // If username exists in sign_up table
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $id,$hashed_password);
        mysqli_stmt_fetch($stmt);

        // if password user enters matches the one in the database
        if (password_verify($_POST['password'], $hashed_password)) {

            // if remember me is checked set cookie
            if (!empty($_POST['remember'])) {
                $remember_token = base64_encode(random_bytes(64));
                $remember_days = 90;
                $remember_time = $remember_days * 24 * 60 * 60;
                echo gettype($remember_time);

                // prepared statements
                $q = "INSERT INTO remember (`token`, `user_id`, `expires`) VALUES (?,?, DATE_ADD(NOW(), INTERVAL ? SECOND))";
                mysqli_stmt_prepare($stmt, $q);
                mysqli_stmt_bind_param($stmt, 'sii', $remember_token, $id,  $remember_time);

                // execute query 
                if (!mysqli_stmt_execute($stmt))
                    exit(mysqli_stmt_error($stmt));

                // set cookie
                setcookie("remember", $remember_token, time() + $remember_time);
            } 
            $_SESSION['id'] = $id;
            $_SESSION['message'] = "Sign in successful!";
            $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";
            header("location: ../dashboard/dashboard.php");
            exit();

            // wrong password
        } else {
            $_SESSION['message'] = "ERROR: Entered wrong password - Please try again";
            $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
            header("location: ../auth/login.php");
            exit();
        }
    }
    // wrong username
    else {
        $_SESSION['message'] = "ERROR: Entered wrong username - Please try again";
        $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";
        header("location: ../auth/login.php");
        exit();
    }
}
