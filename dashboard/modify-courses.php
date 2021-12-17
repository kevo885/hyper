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
                <a class="btn btn-primary btn-sm mb-2 rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#personalDetails" aria-expanded="false" aria-controls="personalDetails">
                    <i class="mdi mdi-chevron-down-circle-outline me-1"></i>Update</a>
                <div class="collapse" id="personalDetails">

                    <!-- Form -->
                    <form action="crud/update.php?courseID=<?php echo $_GET['courseID'] ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name='newCourseName' placeholder="Course name">
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control" name='newSubject' placeholder="Course subject">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label">Course number</label>
                                <input type="text" class="form-control" name='newCourseNumber' placeholder="Course number" data-toggle="input-mask" data-mask-format="0000">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrption</label>
                            <textarea class="form-control" placeholder="Enter course descrption" name="newDesc" style="height: 100px;" maxlength="225" data-toggle="maxlength" data-threshold="150"></textarea>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Available seats</label>
                                <input type="text" class="form-control" name='newAvaliableSeats'>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Credit hours</label>
                                <select name='newCredit' class="form-select" >
                                    <option selected disabled hidden style='display: none' value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-2">
                                <label class="form-label">Campus</label>
                                <select name='newCampus' class="form-select" >
                                    <option selected disabled hidden style='display: none' value=""></option>
                                    <option value="Main Campus">Main campus</option>
                                    <option value="online">Online</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-primary rounded-pill" type="submit" name='updateCourse'>Save changes</button>
                        </div>
                    </form>
                </div>

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
