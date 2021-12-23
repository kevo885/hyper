<?php
include_once "inc/head.php";
include_once "inc/header.php";
include_once "inc/side-bar.php";

if (isset($_GET['id'])) {


    $userID = $_GET['id'];
    mysqli_stmt_prepare($stmt, "SELECT * from user where id = ?");
    mysqli_stmt_bind_param($stmt, "i", $userID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $userID, $username, $password, $name, $dob, $phone, $gender, $age);
        $date = date_create_from_format('Y-m-d', $dob);
        $formatedDate = date_format($date, 'm/d/Y');
        mysqli_stmt_fetch($stmt);
    } else
        exit(mysqli_stmt_error($stmt));
}
else if (isset($_GET['studentID'])) {


    $userID = $_GET['studentID'];
    mysqli_stmt_prepare($stmt, "SELECT * from students where id = ?");
    mysqli_stmt_bind_param($stmt, "i", $userID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $id, $username, $email,$password, $name, $dob, $phone, $gender, $age, $gpa,$class);
        $date = date_create_from_format('Y-m-d', $dob);
        $formatedDate = date_format($date, 'm/d/Y');
        mysqli_stmt_fetch($stmt);
    } else
        exit(mysqli_stmt_error($stmt));
}
$date = date_create_from_format('Y-m-d', $dob);
$formatedDate = date_format($date, 'm/d/Y');
?>
<!-- breadcrumbs -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a><?php echo ucfirst(basename(__FILE__, '.php')) ?></a></li>
                </ol>
            </div>
            <h4 class="page-title">Settings</h4>
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-xl-10 ">
        <div class="card text-center">
            <div class="card-body">
                <?php 
                if (isset($_GET['id']))
                    echo '<p class="page-title">
            <a href="users.php">
                    <span class="text-gray"><span class="fas fa-arrow-left me-2"></span>Back
                    </span>
                </a>
            </p>';
            else if (isset($_GET['studentID']))
                    echo '<p class="page-title">
            <a href="students.php">
                    <span class="text-gray"><span class="fas fa-arrow-left me-2"></span>Back
                    </span>
                </a>
            </p>';
                ?>
                <button class="btn btn-lg btn-white rounded-circle border-light">
                    <span class="fas fa-user"></span>

                </button>
                <h4 class="mb-0 mt-2"><?php echo $name ?></h4>
                <p class="text-muted font-14"></p>
                <?php if (!isset($_GET['id']) && (!isset($_GET['studentID']))) {
                    echo '<a href="../inc/logout.php" class="btn btn-danger btn-sm mb-2 rounded-pill">
                    <i class="mdi mdi-logout me-1"></i>Logout</a>';
                }
                ?>
                <a class="btn btn-primary btn-sm mb-2 rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#personalDetails" aria-expanded="false" aria-controls="personalDetails">
                    <i class="mdi mdi-chevron-down-circle-outline me-1"></i>Update</a>
                <?php include_once "inc/updateForm.php"; ?>

                <!-- user info table -->
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 ">
                        <thead>
                            <tr>
                                <th>Full name</th>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>Phone number</th>
                                <th>Birthday</th>
                                <th>Age</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $name ?></td>
                                <td><?php echo $userID ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $phone ?></td>
                                <td><?php echo $formatedDate ?></td>
                                <td><?php echo $age ?></td>
                                <td><?php echo $gender ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- End Content -->
<?php include_once "inc/footer.php";
