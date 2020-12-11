<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");


require_once "../core/base.php";
require_once "../core/functions.php";


$sql = "";
$page = 1;
$con = con();
$no_of_records_per_page = 9;
$offset = ($page-1) * $no_of_records_per_page;
$order_sql = " ORDER BY id DESC";
$manual = "";


if(isset($_GET['id'])){
    $id = textFilter($_GET['id']);
    if(!is_numeric($id)){
        apiError([
            "error" => "id value is empty"
        ]);
    }
    $sql = " AND posts.id=$id";
}
else if(isset($_GET['page'])){

    $page = textFilter($_GET['page']);
    if(!is_numeric($page)){
        apiError([
            "error" => "page number must be number"
        ]);
    }
    $no_of_records_per_page = 9;
    $offset = ($page-1) * $no_of_records_per_page;
    $manual = "LIMIT $offset , $no_of_records_per_page";
}

else if(isset($_GET['offset']) && isset($_GET['limit']) && isset($_GET['no_id'])){
    $limit = textFilter($_GET['limit']);
    $no_id = textFilter($_GET['no_id']);
    $offset = textFilter($_GET['offset']);
    $sql .= "AND posts.id != $no_id";
    $manual = "LIMIT $limit OFFSET $offset";
}
else if(isset($_GET['limit'])){
    $limit = textFilter($_GET['limit']);
    $sql .= " LIMIT $limit";
}
if(isset($_GET['orderBy'])){
    $orderBy = textFilter($_GET['orderBy']);
    $order_sql = "ORDER BY id $orderBy";
}



$total_rows = countTotal('posts');
$total_pages = floor($total_rows / $no_of_records_per_page);
$sql_default = "SELECT posts.* FROM posts INNER JOIN sub_categories ON posts.sub_category_id = sub_categories.id  WHERE 1  $sql $order_sql $manual ";
//die($sql_default);
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
