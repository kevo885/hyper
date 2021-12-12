<?php
include_once ".env.php";

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

        if (isset($_POST['add_user'])) {
            header("location: ../dashboard/admin.php");
            exit();
        } else {
            header("location: sign-up.php");
            exit();
        }
    }
}
function validDate()
{
    $d = DateTime::createFromFormat('m/d/Y', $_POST['dob']);
    return $d && $d->format('m/d/Y') == $_POST['dob'];
}
// sign up / create admin (user) 
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
            header("location: ../dashboard/admin.php");
            exit();
        } else {
            header("location: sign-up.php");
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
                header("location: ../dashboard/admin.php");
                exit();
            } else {
                header("location: sign-up.php");
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
                    header("location: ../dashboard/admin.php");
                    exit();
                } else {
                    header("location: sign-up.php");
                    exit();
                }
            }
            $insert = "INSERT INTO user (username,password,name,dob,age,gender,phone) values (?,?,?,?,?,?,?)";

            // prepare for insert
            mysqli_stmt_prepare($stmt, $insert);
            mysqli_stmt_bind_param($stmt, "ssssiss", $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['name'], $formatedDate, $age, $_POST['gender'], checkPhone());

            if (!mysqli_stmt_execute($stmt)) {
                $_SESSION['message'] = mysqli_stmt_error($stmt);
                $_SESSION['alert'] = "alert alert-danger alert-dismissible fade show";

                if (isset($_POST['add_user'])) {
                    header("location: ../dashboard/admin.php");
                    exit();
                } else {
                    header("location: sign-up.php");
                    exit();
                }
            }

            // successfully created user, redirect to login page
            else {
                $_SESSION['alert'] = "alert alert-success alert-dismissible fade show";

                if (isset($_POST['add_user'])) {
                    $_SESSION['message'] = "Successfully added $_POST[username]";
                    header("location: ../dashboard/admin.php");
                    exit();
                } else {
                    $_SESSION['message'] = "Successfully created account! Sign in below";
                    header("location: login.php");
                    exit();
                }
            }
        }
    }
}
// sign in
if (isset($_POST['sign-in'])) {
    $sql = 'SELECT id, username,password,name FROM user WHERE username = ?';

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $_POST['username']);
    if (!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_store_result($stmt);

    // If username exists in sign_up table
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $name);
        mysqli_stmt_fetch($stmt);

        // if password user enters matches the one in the database
        if (password_verify($_POST['password'], $hashed_password)) {

            // handle remember me functionality (simplified queries for brevity)
            if (!empty($_POST['remember'])) {
                $remember_token = base64_encode(random_bytes(64));
                $remember_days = 90;
                $remember_time = $remember_days * 24 * 60 * 60;
                echo gettype($remember_time);

                // prepared statements
                $q = "INSERT INTO remember (`token`, `user_id`, `expires`) VALUES (?,?, DATE_ADD(NOW(), INTERVAL ? SECOND))";
                mysqli_stmt_prepare($stmt, $q);
                mysqli_stmt_bind_param($stmt, 'sii', $remember_token, $id,  $remember_time);

                // execute 
                if (!mysqli_stmt_execute($stmt))
                    exit(mysqli_stmt_error($stmt));

                // set cookie
                $path = "/";
                setcookie("remember", $remember_token, time() + $remember_time, $path);
            }
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
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
