<body data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false}'>

    <!-- Topbar Start -->
    <div class="navbar-custom topnav-navbar topnav-navbar-dark">
        <div class="container-fluid">

            <!-- LOGO -->
            <a href="dashboard.php" class="topnav-logo">
                <span class="topnav-logo-lg">
                    <img src="../assets/images/logo-light.png" alt="" height="16">
                </span>
                <span class="topnav-logo-sm">
                    <img src="../assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>
            <ul class="list-unstyled topbar-menu float-end mb-0">
                <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle pt-2 px-0 arrow-none rounded" role="button" data-bs-toggle="dropdown"  id="topbar-userdrop" aria-haspopup="true" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                            <button class="btn btn-lg btn-white rounded-circle shadow-inset border-light">
                                <span class="fas fa-user"></span>
                                
                            </button>
                            <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                <span class="mb-0 font-small fw-bold text-gray-900"><?php echo $name;?></span>
                            </div>
                        </div>
                    </a>                    
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                        <!-- item-->
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome <?php echo "$name !";?></h6>
                        </div>
                        <!-- item-->
                        <a href="settings.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle me-1"></i>
                            <span>My Account</span>
                        </a>
                          <!-- item-->
                          <a href="dashboard.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-google-analytics me-1"></i>
                            <span>Dashboard</span>
                        </a>
                        <!-- item-->
                        <a href="../index.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-home-circle me-1"></i>
                            <span>Home</span>
                        </a>
                        <!-- item-->
                        <a href="../inc/logout.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>
            <a class="button-menu-mobile disable-btn">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </div>
    </div>
    