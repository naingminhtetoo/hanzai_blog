<?php

//common start

    function alert($data,$color="danger"){
        return "<p class='alert alert-$color'>$data</p>";
    }

    function runQuery($sql){
        $con = con();
        if(mysqli_query($con,$sql)){
            return true;
        }
        else{
            die("Query Fail: ".mysqli_error($con));
        }
    }

    function fetch($sql){
        $query = mysqli_query(con(),$sql);
        $rows = mysqli_fetch_assoc($query);

        return $rows;
    }


    function fetchAll($sql){
        $query = mysqli_query(con(),$sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($query)){
            array_push($rows,$row);
        }
        return $rows;
    }

    function redirect($l){
        header("location:$l");
    }

    function linkTo($l){
        echo "<script>location.href='$l'</script>";
    }

    function showTime($timestamp,$format = "d-m-yy"){
        return date($format,strtotime($timestamp));
    }
//
//    function countTotal($table,$condition = 1){
//        $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
//        $total = fetch($sql);
//        return $total['COUNT(id)'];
//    }
//
//    function short($str,$length="100"){
//        return substr($str,0,$length)."...";
//    }
//
    function textFilter($text){
        $text = trim($text);
        $text = htmlentities($text,ENT_QUOTES);
        $text = stripcslashes($text);
        return $text;
    }


//common end

//auth start

    function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errArr = [];
        if($email == '' || $password == '' || strlen($password) < 8 ){
            if($email == ''){
                $errArr['email'] = "Name is Required!";
            }
            if($password == ''){
                $errArr['password'] = "Password is Required!";

            }
            else if($password < 8 ){
                $errArr['password'] = "Password mush be at least 8 character!";
            }
            $_SESSION['error'] = $errArr;
        }
        else{

            $sql = "SELECT * FROM users where email='$email'";
            $query = mysqli_query(con(),$sql);
            $row = mysqli_fetch_assoc($query);
            if(!$row){
                return alert("Email or Password is wrong");
            }
            else{
                if(!password_verify($password,$row['password'])){
                    return alert("Email or Password is wrong");
                }
                else{
                    $_SESSION['user'] = $row;
                    redirect('dashboard.php');
                }
            }
        }
    }

    function clearError($val = "error"){
        $_SESSION[$val] = [];
    }
//auth end

// user start

function user($id){
    $sql = "SELECT * FROM users WHERE id = $id";
    return fetch($sql);
}

function users(){
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}

// user end

// category start

function category($id){
    $sql = "SELECT * FROM categories WHERE id = $id";
    return fetch($sql);
}

function categories(){
    $sql = "SELECT * FROM categories ORDER  BY id DESC";
    return fetchAll($sql);
}

function categoryAdd(){
    $name = textFilter(strip_tags($_POST['name']));
    $user_id = $_SESSION['user']['id'];

    if($name == ''){
            $_SESSION['error']['name'] = "Category Name is Required!";

    }
    else{
        $sql = "INSERT INTO categories (name,user_id) VALUES ('$name','$user_id')";

        if(runQuery($sql)){
//            linkTo("category.php");
        }

    }
    }

function categoryDelete($id){
    $sql="DELETE FROM categories WHERE id = $id";
    return runQuery($sql);

}

function categoryUpdate(){
    $name = $_POST['name'];
    $id = $_POST['id'];

    if($name == ''){
        $_SESSION['error']['name'] = "Category Name is Required!";

    }
    else{
        $sql = "UPDATE categories SET name='$name' WHERE id=$id";
        return runQuery($sql);
    }

}
// category end

//sub category start

function subCategoryAdd(){
        $category_id = textFilter(strip_tags($_POST['category']));
        $name = textFilter(strip_tags($_POST['name']));
        $user_id = $_SESSION['user']['id'];

    if($name == '' || $category_id == ''){
        if($name == ''){
            $_SESSION['error']['name'] = "Main Category is Required!";
        }
        if($category_id == ''){
            $_SESSION['error']['category'] = "Sub Category Name is Required!";
        }

    }
    else{
        $sql = "INSERT INTO sub_categories (name,category_id,user_id) VALUES ('$name','$category_id','$user_id')";
        if(runQuery($sql)){
            echo alert('Sub Category is added','success');
        }


    }

}

function subCategory($id){
    $sql = "SELECT * FROM sub_categories WHERE id = $id";
    return fetch($sql);
}

function subCategories(){
    $sql = "SELECT * FROM sub_categories ORDER  BY category_id DESC";
    return fetchAll($sql);
}

function subCategoryDelete($id){
    $sql="DELETE FROM sub_categories WHERE id = $id";
    return runQuery($sql);

}


function subCategoryUpdate(){
    $category_id = textFilter(strip_tags($_POST['category']));
    $name = textFilter(strip_tags($_POST['name']));
    $id = $_POST['id'];

    if($name == '' || $category_id == ''){
        if($name == ''){
            $_SESSION['error']['name'] = "Main Category is Required!";
        }
        if($category_id == ''){
            $_SESSION['error']['category'] = "Sub Category Name is Required!";
        }

    }
    else{
        $sql = "UPDATE sub_categories SET name='$name',category_id='$category_id' WHERE id=$id";
        if(runQuery($sql)){
            linkTo('sub_category.php');
        }


    }

}
//sub category end