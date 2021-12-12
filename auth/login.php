<?php include_once "inc/head.php" ?>

<body class="authentication-bg" style="visibility: visible;">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="../index.php">
                                <span><img src="../assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                        <?php
                            if (isset($_SESSION['message']) && isset($_SESSION['alert'])) { ?>
                                <div class="<?php echo $_SESSION['alert'] ?>" role="alert">
                                    <span class="fas fa-bullhorn me-1"></span>
                                    <strong><?php echo $_SESSION['message'] ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                                unset($_SESSION['message']);
                                unset($_SESSION['alert']);
                            }
                            ?>
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                            </div>
                            <div class="form-group mb-4">
                            <form action="../inc/server.php" method="POST">

                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input class="form-control" type="text" id="username" name='username' required placeholder="Enter your username">
                                </div>

                                <div class="mb-3">
                                    <a href="" class="text-muted float-end"><small>Forgot your password?</small></a>
                                    <label for="password" id='password' name='password' class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id='password' name='password' class="form-control" placeholder="Enter your password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checked" name='checked' >
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit" name='sign-in'> Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="register.php" class="text-muted ms-1"><b>Sign Up</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
    <?php include_once "inc/footer.php" ?>
