<?php include_once "inc/head.php" ?>

<body class="authentication-bg" style="visibility: visible;">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="../index.php">
                                <span><img src="../assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <?php
                           include_once "../inc/alerts.php";
                            ?>
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your username and password to access admin panel.</p>
                            </div>
                            <div class="form-group mb-4">
                                <form action="../inc/server.php" method="POST">
                                    <?php include_once "inc/login-form.php" ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once "inc/footer.php" ?>