<?php
include_once "inc/head.php";
include_once "inc/header.php";
include_once "inc/side-bar.php";
?>
<div class="content-page">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a><?php echo ucfirst(basename(__FILE__, '.php')) ?></a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Courses</h4>
                </div>
            </div>
        </div>
        <!-- Alert message -->
        <?php include_once "../inc/alerts.php"; ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="alt-pagination-preview">
                                <?php coursesTable() ?>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "inc/footer.php" ?>