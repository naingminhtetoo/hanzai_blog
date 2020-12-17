<?php

require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";

$id = $_GET['id'];
if(!isset($_GET['id'])){
    linkTo('category.php');
}
$current = category($id);
if($current == null){
    echo "<script>alert('Something is wrong!')</script>";
    linkTo('category.php');
}
if(categoryDelete($id)){
    $sql="DELETE FROM sub_categories WHERE category_id = $id";
    if(runQuery($sql)){
        linkTo('category.php');
    }
}