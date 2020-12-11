<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");


require_once "../core/base.php";
require_once "../core/functions.php";


$sql = "";
$page = 1;
$con = con();
$manual =  "";
$condition = "";
$no_of_records_per_page = 9;
$sub_category = 0;

$offset = ($page-1) * $no_of_records_per_page;
$manual = "LIMIT $offset , $no_of_records_per_page";

if(isset($_GET['sub_category'])){
    $sub_category = $_GET['sub_category'];
    if(!is_numeric($sub_category)){
        $sub_category = 0;
    }
    $condition = "sub_category_id = $sub_category";
    if(isset($_GET['page'])){
        $page = textFilter($_GET['page']);
        if(!is_numeric($page)){
            apiError([
                "error" => "page number must be number"
            ]);
        }
        $offset = ($page-1) * $no_of_records_per_page;
        $manual = "LIMIT $offset , $no_of_records_per_page";
    }
}

$order_sql = " ORDER BY id DESC";
$total_rows = countTotal('posts',$condition);
$total_pages = floor($total_rows / $no_of_records_per_page);

$sql_default = "SELECT posts.* FROM posts INNER JOIN sub_categories ON posts.sub_category_id = sub_categories.id  WHERE 1  AND $condition $order_sql $manual ";

$rows = [];
$query = mysqli_query($con,$sql_default);
if(!$query){
    $err['error'] = mysqli_error($con);
    apiError($err);
}
else{
    while ($row = mysqli_fetch_assoc($query)){
        $sub_category = subCategory($row['sub_category_id']);
        $category = category($sub_category['category_id']);
        $arr = [
            "id" => $row['id'],
            "title" => $row['title'],
            "user_id" => $row['user_id'],
            "sub_category" => $sub_category['name'],
            "category" => $category['name'],
            "description" =>$row['description'],
            "photo" => $row['photo'],
            "created_at" => $row['created_at'],
        ];
        array_push($rows,$arr);
    }
    apiOutput($rows);
}

