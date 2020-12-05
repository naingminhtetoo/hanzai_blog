<?php

require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";

$id = $_GET['id'];
if(!isset($_GET['id'])){
    linkTo('sub_category.php');
}
$current = subCategory($id);
if($current == null){
    echo "<script>alert('Something is wrong!')</script>";
    linkTo('sub_category.php');
}
if(subCategoryDelete($id)){
    linkTo('sub_category.php');
}