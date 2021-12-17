<?php
include_once "inc/head.php";
include_once "inc/header.php";
include_once "inc/side-bar.php";

if (isset($_GET['courseID'])) {
    $courseID = $_GET['courseID'];
    mysqli_stmt_prepare($stmt, "SELECT * from courses where courseID = ?");
    mysqli_stmt_bind_param($stmt, "i", $courseID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $courseID, $courseName, $courseNumber, $desc, $subject, $avaliable, $credit, $campus);
        mysqli_stmt_fetch($stmt);
    } else
        exit(mysqli_stmt_error($stmt));
} else
    header('location: courses.php');
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
            <h4 class="page-title">Update Course</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-xl-10">
        <div class="card text-center">
            <div class="card-body">
                <?php if (isset($_GET['courseID']))
                    echo '<p class="page-title">
            <a href="courses.php">
                    <span class="text-gray"><span class="fas fa-arrow-left me-2"></span>Back
                    </span>
                </a>
            </p>';
                ?>
                <p class="text-muted font-14"></p>
                <button class="btn btn-primary btn-sm mb-2 rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#updateCourse">
                    <i class="mdi mdi-chevron-down-circle-outline me-1"></i>Update</button>

                <?php include_once "inc/updateForm.php";
                ?>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 ">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>CRN</th>
                                <th>Seats avaliable</th>
                                <th>Credit</th>
                                <th>Campus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $courseName ?></td>
                                <td><?php echo $subject ?></td>
                                <td><?php echo $courseNumber ?></td>
                                <td><?php echo $avaliable ?></td>
                                <td><?php echo $credit ?></td>
                                <td><?php echo $campus ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php include_once "inc/footer.php";
