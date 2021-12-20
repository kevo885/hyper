<?php
ob_start();
session_start();
include_once "table.php";
include_once "auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Analytics Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- third party css -->
    <link href="../assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link type="text/css" href="../assets/css/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- third party css end -->

    <!-- App css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="../assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>