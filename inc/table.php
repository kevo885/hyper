<?php
// grabs user information  , prints out tables
include_once ".env.php";

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
        ?>

            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo "$dob ($age)"; ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $gender; ?></td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0 arrow-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='dripicons-dots-3'></i></button>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                            <a class="dropdown-item d-flex align-items-center" href="#"><i class='mdi mdi-account-edit me-1'></i>Edit</a>
                            <a class="dropdown-item d-flex align-items-center" href="#"><i class='mdi mdi-eye me-1'></i>View</a>
                        </div>
                    </div>
                    <button class="btn btn-sm d-inline-flex align-items-center btn-rounded" type="submit" name="delete" value="<?php echo $id; ?>"><i class='mdi mdi-delete'></i></button>
                </td>
            </tr>
            </form>
        <?php  } ?>
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

    mysqli_stmt_bind_result($stmt, $courseID, $courseName, $courseNumber, $desc, $enrolled);
?>
    <thead>
        <tr>
            <th>Course ID</th>
            <th>Course name</th>
            <th>Course number</th>
            <th>Course Descrption</th>
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
                    <td><?php echo $courseNumber; ?></td>
                    <td><?php echo $desc; ?></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0 arrow-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='dripicons-dots-3'></i></button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                <a class="dropdown-item d-flex align-items-center" href="#"><i class='mdi mdi-account-edit me-1'></i>Edit</a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i class='mdi mdi-eye me-1'></i>View</a>
                            </div>
                        </div>
                        <button class="btn btn-sm d-inline-flex align-items-center btn-rounded" type="submit" name="delete" value="<?php echo $courseID; ?>"><i class='mdi mdi-delete'></i></button>
                    </td>
                </tr>
            </form>
        <?php  } ?>
    </tbody>
<?php  }