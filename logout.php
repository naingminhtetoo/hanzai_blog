<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";

session_destroy();

linkTo('login.php');

?>