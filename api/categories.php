<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");


require_once "../core/base.php";
require_once "../core/functions.php";

$sql_default = "SELECT categories.* FROM categories INNER JOIN sub_categories ON categories.id = sub_categories.category_id GROUP BY categories.id";


$con = con();
$rows = [];
$query = mysqli_query($con,$sql_default);
if(!$query){
    $err['error'] = mysqli_error($con);
    apiError($err);
}
else{
    while ($row = mysqli_fetch_assoc($query)){
        $sub_category = subCategoriesByCategoryId($row['id'],'id,name');
        $arr = [
            "id" => $row['id'],
            "name" => $row['name'],
            "sub_categories" => $sub_category
        ];
        array_push($rows,$arr);
    }
    apiOutput($rows);
}
