<body>

    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
        <div class="container">

            <!-- logo -->
            <a href="index.php" class="navbar-brand me-lg-5">
                <img src="assets/images/logo.png" alt="" class="logo-dark" height="18" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- menus -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <!-- left menu -->
                <ul class="navbar-nav me-auto align-items-center">
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link active" href="">Home</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Features</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Pricing</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">FAQs</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Clients</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="">Contact</a>
                    </li>
                </ul>

                <!-- right menu -->
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-0">
                        <?php if (isset($_SESSION['id']))
                            echo '<a href="inc/logout.php" class="btn btn-sm btn-danger rounded-pill d-none d-lg-inline-flex"><i class="mdi mdi-logout me-2"></i>Logout</a>';

                        else
                            echo '<a href="auth/register.php" class="btn btn-success rounded-pill d-none d-lg-inline-flex"> <i class="mdi mdi-account-plus me-1"></i>Sign Up</a>';
                        ?>
                    </li>
                </ul>

            </div>
        </div>
    </nav>