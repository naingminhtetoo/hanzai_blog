<?php
require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";

$user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hanzai Blog</title>
    <link rel="icon" href="<?php echo $url; ?>/images/app_logo_2.png">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/animate_it/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/feather-icon/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo $url;?>/vendor/summer_note/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/data_table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/data_table/jquery.dataTables.min.js">
    <link href="<?php echo $url; ?>/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/layout-switch.css" rel="stylesheet">
</head>
<body>

