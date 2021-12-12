<!-- Start Content-->
<div class="container-fluid">

    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu leftside-menu-detached">

            <div class="leftbar-user">
                    <span class="account-user-avatar">
                        <i class="fas fa-user fa-2x"></i>
                    </span> <span class="leftbar-user-name"><?php echo $user_name ?></span>
            </div>

            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span class="badge bg-info rounded-pill float-end">4</span>
                        <span> Dashboards </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="dashboard.php"><i class='mdi mdi-google-analytics me-1'></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="settings.php"><i class='mdi mdi-account-circle me-1'></i>My account</a>
                            </li>
                            <li>
                                <a href="users.php"><i class='mdi mdi-account-group me-1'></i>Teachers / Admin</a>
                            </li>
                            <li>
                                <a href="../inc/logout.php"><i class='mdi mdi-logout me-1'></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-title side-nav-item">Apps</li>

                <li class="side-nav-item">
                    <a href="courses.php" class="side-nav-link">
                        <i class="uil-meeting-board"></i>
                        <span> Courses </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="students.php" class="side-nav-link">
                        <i class="uil-book-reader"></i>
                        <span> Students </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="users.php" class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span>Teachers</span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="../index.php" class="side-nav-link">
                        <i class="uil-home"></i>
                        <span>Home</span>
                    </a>
                </li>
            </ul>
            <!-- End Sidebar -->
            <div class="clearfix"></div>
            <!-- Sidebar -left -->

        </div>