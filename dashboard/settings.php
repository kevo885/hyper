<?php
include_once "inc/head.php";
include_once "inc/header.php";
include_once "inc/side-bar.php";
?>
<div class="content-page">
    <div class="content">

        <!-- breadcrumbs -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Settings</h4>
                </div>
            </div>
        </div>
        <!-- Alert message -->
        <?php include_once "../inc/alerts.php"; ?>
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card text-center">
                    <div class="card-body">

                        <i class="rounded-circle avatar-lg img-thumbnail fas fa-user fa-4x"></i>

                        <h4 class="mb-0 mt-2"><?php echo $user_name ?></h4>
                        <p class="text-muted font-14"></p>
                        <a href="../inc/logout.php" class="btn btn-danger btn-sm mb-2">
                            <i class="mdi mdi-logout me-1"></i>Logout</a>
                        <a href="../inc/logout.php" class="btn btn-primary btn-sm mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#personalDetails" aria-expanded="false" aria-controls="personalDetails">
                            <i class="mdi mdi-chevron-down-circle-outline me-1"></i>Update</a>
                        <!-- <div class="col-sm-3 text-end">
                            <button class="btn btn-link ps-0 text-primary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#personalDetails" aria-expanded="false" aria-controls="personalDetails">Update</button>
                        </div> -->
                        <div class="collapse" id="personalDetails">
                            <form action="crud/modifyUser.php" method="post">
                                <div class="row pt-4">
                                    <div class="mb-4 col-md-6">
                                        <label class="form-label" for="name">Name</label>
                                        <input class="form-control" type="text" name="newName" id="name" placeholder="Name">
                                    </div>
                                    <div class="mb-4 col-md-6">
                                        <label class="form-label" for="username">Username</label>
                                        <input class="form-control" type="username" name="newUsername" id="username" placeholder="Username">
                                    </div>
                                    <div class="mb-4 col-md-6">
                                        <label class="form-label" for="password">Password</label>
                                        <input class="form-control" type="text" name="newPassword" id="password" placeholder="Password">
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-4" type="submit" name="update">Save your changes</button>
                            </form>
                        </div>

                        <div class="text-start mt-3">
                            <h4 class="font-13 text-uppercase">About me</h4>
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2"><?php echo $user_name ?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>User ID :</strong> <span class="ms-2 "><?php echo $userID ?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>Username :</strong> <span class="ms-2 "><?php echo $username?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>Phone number :</strong><span class="ms-2"><?php echo $phone ?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>Birthday :</strong> <span class="ms-2 "><?php echo $dob ?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>Age :</strong> <span class="ms-2 "><?php echo $age ?></span></p>


                        </div>

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- End Content -->
    <?php include_once "inc/footer.php";
