<?php

// This page prints out database info in the form of datatables.
include_once "../inc/.env.php";

function userTable()
{
    global $stmt;

    // deletes a single item
    if (!empty($_POST['delete'])) {
        $delete =  "DELETE FROM user WHERE id = ?";
        mysqli_stmt_prepare($stmt, $delete);
        mysqli_stmt_bind_param($stmt, "i", $_POST['delete']);
        if (!mysqli_stmt_execute($stmt))
            exit("Could not delete user");
    }
    mysqli_stmt_prepare($stmt, "select * from user");
    if (!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_bind_result($stmt, $id, $username, $password, $name, $dob, $phone, $gender, $age);
?>
    <div class="row mb-2">
        <div class="col-sm-4">
            <button type="button" class="btn btn-primary rounded-pill mb-3" data-bs-toggle="modal" data-bs-target="#addUser"><i class='mdi mdi-plus me-1'></i>Add User</button>
        </div>
    </div>
    <form action="" method="post">
        <table id="alternative-page-datatable" class="table dt-responsive nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Date of birth (age)</th>
                    <th>Phone number</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while (mysqli_stmt_fetch($stmt)) {
                    $date = date_create_from_format('Y-m-d', $dob);
                    $formatedDate = date_format($date, 'm/d/Y');
                ?>

                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo "$formatedDate ($age)"; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $gender; ?></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0 arrow-none" data-bs-toggle="dropdown"><i class='dripicons-dots-3'></i></button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                    <a href="settings.php?id=<?php echo $id ?>" class="dropdown-item d-flex align-items-center btn btn-sm d-inline-flex align-items-center btn-rounded"><i class='mdi mdi-account-edit me-1'></i>Edit</a>
                                    <a class="dropdown-item d-flex align-items-center" href="" data-bs-toggle="modal" data-bs-target="#addUser"><i class='mdi mdi-plus me-1'></i>Add</a>
                                    <a class="dropdown-item d-flex align-items-center" href="" data-bs-toggle="modal" data-bs-target="#viewUser" data-bs-id="<?php echo $id ?>" data-bs-name="<?php echo $name ?>" data-bs-username="<?php echo $username ?>" data-bs-dob="<?php echo $formatedDate ?>" data-bs-age="<?php echo $age ?>" data-bs-phone="<?php echo $phone ?>" data-bs-gender="<?php echo $gender ?>">
                                        <i class='mdi mdi-eye me-1'></i>View</a>
                                </div>
                            </div>
                            <?php 
                            if($_SESSION['id'] == $id)
                            echo '<span class="text-success">Current user</span>';

                            else
                            echo "<button class=\"btn btn-sm d-inline-flex align-items-center btn-rounded\" type=\"submit\" name=\"delete\" value=\"$id\"><i class='mdi mdi-delete'></i></button>"
                            ?>
                        </td>
                    </tr>
    </form>
<?php  }
                // modal 
                include_once "inc/modal.php";
?>
</tbody>
<?php  }

function coursesTable()
{
    global $stmt;

    // deletes a single item
    if (!empty($_POST['delete'])) {
        $delete =  "DELETE FROM courses WHERE courseID = ?";
        mysqli_stmt_prepare($stmt, $delete);
        mysqli_stmt_bind_param($stmt, "i", $_POST['delete']);
        if (!mysqli_stmt_execute($stmt))
            exit(mysqli_stmt_error($stmt));
    }
    mysqli_stmt_prepare($stmt, "select * from courses");

    if (!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_bind_result($stmt, $courseID, $courseName, $courseNumber, $desc, $subject, $avaliable, $credit, $campus);
?>
    <div class="row mb-2">
        <div class="col-sm-4">
            <button type="button" class="btn btn-primary rounded-pill mb-3" data-bs-toggle="modal" data-bs-target="#course-modal"><i class="mdi mdi-plus me-1"></i>add courses</button>
        </div>
    </div>
    <form action="" method="post">
        <table id="alternative-page-datatable" class="table dt-responsive nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>CRN</th>
                    <th>Seats avaliable</th>
                    <th>Credit hour</th>
                    <th>Campus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while (mysqli_stmt_fetch($stmt)) {
                ?>
                    <tr>
                        <td><?php echo $courseID; ?></td>
                        <td><?php echo $courseName; ?></td>
                        <td><?php echo $subject; ?></td>
                        <td><?php echo $courseNumber; ?></td>
                        <td><?php echo $avaliable ?></td>
                        <td><?php echo $credit; ?></td>
                        <td><?php echo $campus; ?></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0 arrow-none" data-bs-toggle="dropdown"><i class='dripicons-dots-3'></i></button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                    <a class="dropdown-item d-flex align-items-center" href="modify-courses.php?courseID=<?php echo $courseID ?>"><i class='mdi mdi-book-edit-outline me-1'></i>Edit</a>
                                    <a class="dropdown-item d-flex align-items-center" href="" data-bs-toggle="modal" data-bs-target="#course-modal"><i class='mdi mdi-plus me-1'></i>Add</a>
                                    <a class="dropdown-item d-flex align-items-center" href="" data-bs-toggle="modal" data-bs-target="#viewCourse" data-bs-desc="<?php echo $desc ?>">
                                        <i class='mdi mdi-eye me-1'></i>View course descrption</a>
                                </div>
                            </div>
                            <button class="btn btn-sm d-inline-flex align-items-center btn-rounded" type="submit" name="delete" value="<?php echo $courseID; ?>"><i class='mdi mdi-delete'></i></button>
                        </td>
                    </tr>
    </form>
<?php  }
                include_once "inc/modal.php"; ?>
</tbody>
<?php   }