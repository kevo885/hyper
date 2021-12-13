<?php
include_once "inc/head.php";
include_once "inc/header.php";
include_once "inc/side-bar.php";
?>
<div class="content-page">
    <div class="content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a><?php echo ucfirst(basename(__FILE__, '.php'))?></a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">View courses</h4>
                </div>
            </div>
        </div>
        <div class="btn mb-2 mb-md-0">
            <!-- Add courses Modal -->
            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded ">
                        <div class="modal-body p-0">
                            <div class="card p-4">
                                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-header">
                                    <h4 class="modal-title" id="topModalLabel">Course Info</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Form -->
                                    <form class="ps-3 pe-3" action="crud/add.php" method="POST">
                                        <?php include_once "inc/add-course-form.php"?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Alert message -->
        <?php include_once "../inc/alerts.php"; ?>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="alt-pagination-preview">
                                <form action="" method="post">
                                    <table id="alternative-page-datatable" class="table dt-responsive nowrap">
                                        <?php coursesTable() ?>
                                    </table>
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- End Content -->
    <?php include_once "inc/footer.php" ?>