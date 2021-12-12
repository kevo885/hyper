<?php
include_once "inc/head.php";
include_once "inc/header.php";
include_once "inc/side-bar.php";
include_once "../inc/.env.php";
?>
<div class="content-page">
    <div class="content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Data Tables</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Tables</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Courses table</h4>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="alt-pagination-preview">
                                <form action="" method="post">
                                    <table id="alternative-page-datatable" class="table dt-responsive nowrap">
                                        <!-- print user table -->
                                        <?php userTable(); ?>
                                    </table>
                                </form>
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- End Content -->

    <?php include_once "inc/footer.php" ?>