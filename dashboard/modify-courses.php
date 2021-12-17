<?php
include_once "inc/head.php";
include_once "inc/header.php";
include_once "inc/side-bar.php";

if (isset($_GET['courseID'])) {
    $courseID = $_GET['courseID'];
    mysqli_stmt_prepare($stmt, "SELECT * from courses where courseID = ?");
    mysqli_stmt_bind_param($stmt, "i", $courseID);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $courseID, $courseName, $courseNumber, $desc, $enrolled);
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
                <a class="btn btn-primary btn-sm mb-2 rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#personalDetails" aria-expanded="false" aria-controls="personalDetails">
                    <i class="mdi mdi-chevron-down-circle-outline me-1"></i>Update</a>
                <div class="collapse" id="personalDetails">

                    <!-- Form -->
                    <form action="crud/update.php?courseID=<?php echo $_GET['courseID'] ?>" method="post">
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Course name</label>
                                <input type="text" class="form-control" name='newCourseName' placeholder="Course name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Course number</label>
                                <input type="text" class="form-control" name="newCourseNumber" placeholder="CourseNumber">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="floatingTextarea">Descrption</label>
                            <textarea class="form-control" placeholder="Enter course descrption" name="newDesc" style="height: 100px;"></textarea>
                        </div>
                        <button class="btn btn-primary rounded-pill mb-4" type="submit" name="updateCourse">Save your changes</button>
                    </form>
                </div>

                <div class="text-start mt-3">
                    <h4 class="font-13 text-uppercase">CourseInfo</h4>
                    <p class="text-muted mb-2 font-13"><strong>Course ID :</strong> <span class="ms-2 "><?php echo $courseID ?></span></p>
                    <p class="text-muted mb-2 font-13"><strong>Course Name :</strong> <span class="ms-2"><?php echo $courseName ?></span></p>
                    <p class="text-muted mb-2 font-13"><strong>Course Number :</strong> <span class="ms-2 "><?php echo $courseNumber ?></span></p>
                    <p class="text-muted mb-2 font-13"><strong>Descrption :</strong> <span class="ms-2 "><?php echo $desc ?></span></p>
                    <p class="text-muted mb-2 font-13"><strong>Enrolled :</strong><span class="ms-2"><?php echo $enrolled ?></span></p>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php include_once "inc/footer.php";
