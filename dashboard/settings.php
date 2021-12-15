<?php
include_once "inc/head.php";
include_once "inc/header.php";
include_once "inc/side-bar.php";

if (isset($_GET['id'])) {


    $userID = $_GET['id'];
    mysqli_stmt_prepare($stmt, "SELECT * from user where id = ?");
    mysqli_stmt_bind_param($stmt, "i", $userID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $userID, $username, $password, $user_name, $dob, $phone, $gender, $age);
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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-xl-10 ">
        <div class="card text-center">
            <div class="card-body">

                <i class="rounded-circle avatar-lg img-thumbnail fas fa-user fa-4x"></i>

                <h4 class="mb-0 mt-2"><?php echo $user_name ?></h4>
                <p class="text-muted font-14"></p>
                <?php if (!isset($_GET['id'])) {
                    echo '<a href="../inc/logout.php" class="btn btn-danger btn-sm mb-2 rounded-pill">
                    <i class="mdi mdi-logout me-1"></i>Logout</a>';
                }
                ?>
                <a class="btn btn-primary btn-sm mb-2 rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#personalDetails" aria-expanded="false" aria-controls="personalDetails">
                    <i class="mdi mdi-chevron-down-circle-outline me-1"></i>Update</a>
                <!-- <div class="col-sm-3 text-end">
                            <button class="btn btn-link ps-0 text-primary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#personalDetails" aria-expanded="false" aria-controls="personalDetails">Update</button>
                        </div> -->
                <div class="collapse" id="personalDetails">
                    <?php if (isset($_GET['id']))
                        echo "<form action=\"crud/update.php?id=$userID\" method=\"post\">";
                    else
                        echo '<form action="crud/update.php" method="post">';
                    ?>
                    <?php include_once "inc/updateForm.php"; ?>
                    </form>
                </div>
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
                                <td><?php echo $user_name ?></td>
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
