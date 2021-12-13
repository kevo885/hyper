<?php include_once "inc/head.php" ?>

<body class="authentication-bg">

    <div class="account-pages pt-2 pt-md-5 pb-4 pb-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-7">
                    <div class="card">
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="../assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <?php
                            include_once "../inc/alerts.php";

                            ?>
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                                <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
                            </div>

                            <form action="../inc/server.php" method="POST">
                                <?php include_once "inc/register-form.php" ?>
                            </form>
                        </div> 
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?php include_once "inc/footer.php" ?>