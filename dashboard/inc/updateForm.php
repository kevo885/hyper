<!-- Update user -->
<div class="collapse" id="updateUser">
    <?php
    if (isset($_GET['id']))
        echo "<form action=\"crud/update.php?id=$id\" method=\"post\">";
    else
        echo '<form action="crud/update.php" method="post">';
    ?>
    <div class="row align-items-center">
        <div class="col-md-6 mb-3">
            <div class="form-group mb-4">
                <label for="user_name">Name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-account-circle"></span></span>
                    <input type="text" name="newName" class="form-control" placeholder="Name">
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group mb-4">
                <label>Phone</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-phone"></span></span>
                    <input type="text" class="form-control" name='newPhone' placeholder="xxx-xxx-xxxx" data-toggle="input-mask" data-mask-format="000-000-0000">
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-6 mb-3">
            <div class="form-group mb-4">
                <label for="number">Username</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">@</span>
                    <input type="text" name="newUsername" class='form-control' placeholder="Username">
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group mb-4">
                <label for="number">Password</label>
                <div class="input-group">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                    <input type="password" name="newPassword" class='form-control' placeholder="Password">
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-6 mb-3">
            <label for="birthday">Birthday</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-calendar"></span></span>

                <input class="form-control" id="birthday" name='newDob' type="text" placeholder="mm/dd/yyyy" autocomplete="off" data-toggle="input-mask" data-mask-format="00/00/0000">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="gender">Gender</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-gender-female"></span></span>
                <select class="form-select mb-0" id="gender" name='newGender' aria-label="Gender">
                    <option selected disabled hidden style='display: none' value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="N/A">Prefer not to say</option>
                </select>
            </div>
        </div>
    </div>
    <?php
        echo '<button class="btn btn-primary rounded-pill mb-4" type="submit" name="updateUser">Save your changes</button>';
    ?>
    </form>
</div>

<!-- Update students -->
<div class="collapse" id="updateStudents">
    <?php
        echo "<form action=\"crud/update.php?id=$_GET[studentID]\" method=\"post\">";
    ?>
    <div class="row align-items-center">
        <div class="col-md-6 mb-3">
            <div class="form-group mb-4">
                <label for="user_name">Name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-account-circle"></span></span>
                    <input type="text" name="newName" class="form-control" placeholder="Name">
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group mb-4">
                <label >Email</label>
                <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-email"></span></span>
                    <input type="email" name="newEmail" class='form-control' placeholder="Email">
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-6 mb-3">
            <div class="form-group mb-4">
                <label for="number">Username</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">@</span>
                    <input type="text" name="newUsername" class='form-control' placeholder="Username">
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group mb-4">
                <label>Phone</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-phone"></span></span>
                    <input type="text" class="form-control" name='newPhone' placeholder="xxx-xxx-xxxx" data-toggle="input-mask" data-mask-format="000-000-0000">
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-6 mb-3">
            <label for="birthday">Birthday</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-calendar"></span></span>

                <input class="form-control" id="birthday" name='newDob' type="text" placeholder="mm/dd/yyyy" autocomplete="off" data-toggle="input-mask" data-mask-format="00/00/0000">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="gender">Gender</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-gender-female"></span></span>
                <select class="form-select mb-0" id="gender" name='newGender' aria-label="Gender">
                    <option selected disabled hidden style='display: none' value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="N/A">Prefer not to say</option>
                </select>
            </div>
        </div>
    </div>
    <?php
        echo '<button class="btn btn-primary rounded-pill mb-4" type="submit" name="updateStudent">Save your changes</button>';
    ?>
    </form>
</div>


<!-- Update course -->
<div class="collapse" id="updateCourse">
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
                <select name='newCredit' class="form-select">
                    <option selected disabled hidden style='display: none' value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="mb-3 col-md-2">
                <label class="form-label">Campus</label>
                <select name='newCampus' class="form-select">
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