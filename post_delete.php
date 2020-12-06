<?php

require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";

$id = $_GET['id'];
if(!isset($_GET['id'])){
    linkTo('post.php');
}
$current = post($id);
if($current == null){
    echo "<script>alert('Something is wrong!')</script>";
    linkTo('post.php');
}
if(postDelete($id)){
    linkTo('post.php');
}