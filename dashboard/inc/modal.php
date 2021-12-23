 <!-- Modal to add user -->
<div id="addUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">User info</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form action="../inc/server.php" method="post" class="mt-4">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-4">
                                <label for="user_name">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-account-circle"></span></span>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-4">
                                <label>Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-phone"></span></span>
                                    <input type="text" name="phone" class="form-control" placeholder="xxx-xxx-xxxx" required data-toggle="input-mask" data-mask-format="000-000-0000">
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
                                    <input type="text" name="username" class='form-control' placeholder="Username" required>
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
                                    <input type="password" name="password" class='form-control' placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="birthday">Birthday</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-calendar"></span></span>

                                <input class="form-control" id="birthday" name='dob' type="text" placeholder="mm/dd/yyyy" required autocomplete="off" data-toggle="input-mask" data-mask-format="00/00/0000">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender">Gender</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-gender-female"></span></span>
                                <select class="form-select mb-0" id="gender" name='gender' aria-label="Gender" required>
                                    <option selected disabled hidden style='display: none' value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="N/A">Prefer not to say</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name='add_user'>Submit</button> </form>
            </div>
        </div>
    </div>
    </form>
    <!-- modal end -->
</div>


 <!-- Modal to add students -->
 <div id="addStudents" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">User info</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form action="crud/add.php" method="post" class="mt-4">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-4">
                                <label for="user_name">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-account-circle"></span></span>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-4">
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-email"></span></span>
                                    <input type="text" name="email" class="form-control" placeholder="Email" required>
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
                                    <input type="text" name="username" class='form-control' placeholder="Username" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-4">
                                <label>Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-phone"></span></span>
                                    <input type="text" name="phone" class="form-control" placeholder="xxx-xxx-xxxx" required data-toggle="input-mask" data-mask-format="000-000-0000">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="birthday">Birthday</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-calendar"></span></span>

                                <input class="form-control" id="birthday" name='dob' type="text" placeholder="mm/dd/yyyy" required autocomplete="off" data-toggle="input-mask" data-mask-format="00/00/0000">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender">Gender</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2"><span class="mdi mdi-gender-female"></span></span>
                                <select class="form-select mb-0" id="gender" name='gender' aria-label="Gender" required>
                                    <option selected disabled hidden style='display: none' value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="N/A">Prefer not to say</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name='addStudents'>Submit</button> </form>
            </div>
        </div>
    </div>
    </form>
    <!-- modal end -->
</div>
<!-- Modal to add course -->
<div id="course-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">Course info</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <!-- Form -->
                <form action="crud/add.php" method="post" class="mt-4">

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name='courseName' placeholder="Course name" required>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" name='subject' placeholder="Course subject" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label">Course number</label>
                            <input type="text" class="form-control" name='courseNumber' placeholder="Course number" data-toggle="input-mask" data-mask-format="0000" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrption</label>
                        <textarea class="form-control" placeholder="Enter course descrption" name="desc" style="height: 100px;" maxlength="225" data-toggle="maxlength" data-threshold="150" required></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Available seats</label>
                            <input type="text" class="form-control" name='avaliable' required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Credit hours</label>
                            <select name='credit' class="form-select" required>
                                <option selected disabled hidden style='display: none' value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label class="form-label">Campus</label>
                            <select name='campus' class="form-select" required>
                                <option selected disabled hidden style='display: none' value=""></option>
                                <option value="Main Campus">Main campus</option>
                                <option value="online">Online</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary rounded-pill" type="submit" name='addCourse'>Add course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View user info -->
<div id="viewUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">View user info</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-4 col-xl-10 ">
                        <div class="text-center">

                            <button class="btn btn-lg btn-white rounded-circle border-light">
                                <span class="fas fa-user"></span></button>
                            <h4 class="mb-0 mt-2 name"></h4>
                            <p class="text-muted font-14"></p>
                            <div class="text-start mt-3">
                                <h4 class="font-13 text-uppercase">About</h4>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <p class="text-muted mb-2 font-13"><strong>ID :</strong> <span class="id"></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Username :</strong> <span class="username"></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong> <span class="phone"></span></p>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <p class="text-muted mb-2 font-13"><strong>Birthday :</strong> <span class="dob"></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Age :</strong> <span class="age"></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Gender :</strong> <span class="gender"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- View course-->
    <div id="viewCourse" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">View course</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-xl-10 ">
                            <div class="text-center">
                                <div class="text-start mt-3">
                                    <h4 class="font-13">Course descrption</h4>
                                    <p class='desc'></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    