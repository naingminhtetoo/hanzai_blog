<?php

//common start

    function alert($data,$color="danger"){
        return "<p class='alert alert-$color'>$data</p>";
    }

    function modelAlert($message){
        echo "<script>alert('$message')</script>";
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
    function countTotal($table,$condition = 1){
        $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
        $total = fetch($sql);
        return $total['COUNT(id)'];
    }

    function short($str,$length="100"){
        return substr($str,0,$length)."...";
    }
//
    function textFilter($text){
        $text = trim($text);
        $text = htmlentities($text,ENT_QUOTES);
        $text = stripcslashes($text);
        return $text;
    }

    function removeFile($table,$condition,$column){
        $sql = "SELECT $column FROM $table WHERE $condition";
        $photo = "files/".fetch($sql)[$column];
        unlink($photo);
    }


//common end

//auth start

    function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errArr = [];
        if($email == '' || $password == ''){
            if($email == ''){
                $errArr['email'] = "Name is Required!";
            }
            if($password == ''){
                $errArr['password'] = "Password is Required!";

            }
            $_SESSION['error'] = $errArr;
        }
        else{
            $sql = "SELECT * FROM users WHERE email='$email'";
//            die($sql);
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
                    linkTo('dashboard.php');
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

function updateAccount(){
    $name = textFilter($_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_id = $_SESSION['user']['id'];
    $user_password = $_SESSION['user']['password'];
    $supportFileType = ['image/jpeg','image/png','image/jpg'];
    $hasError = false;
    if($name == '' || $email == '' || !password_verify($password,$user_password)){
        if($name == ''){
            $_SESSION['error']['name'] = "Name is Required!";
        }
        if($email == ''){
            $_SESSION['error']['email'] = "Category is Required!";
        }
        if(!password_verify($password,$user_password)){
            $_SESSION['error']['password'] = "Password is not valid";

        }
        $hasError = true;
    }

    if($_FILES['photo']['size'] == 0){
        if(!$hasError){
            $sql = "UPDATE users SET name='$name',email='$email' WHERE id='$user_id'";
            if(runQuery($sql)){
                refreshAccountData($email,$password,'account_setting.php');
            }
        }

    }
    else{
        if(!$hasError){
            $fileSize = floor($_FILES['photo']['size']/1000000);
            if($fileSize > 5){
                $_SESSION['error']['file'] = "File size must be maximum 5Mb";
            }
            else{
                $tempFile = $_FILES['photo']['tmp_name'];
                $fileName = uniqid()."_".$_FILES['photo']['name'];

                if(in_array($_FILES['photo']['type'],$supportFileType)){
                    $_SESSION['data']['description'] = '';

                    $saveFolder = "files/";
                    if(move_uploaded_file($tempFile,$saveFolder.$fileName)){
                        $dir = "files/{$_SESSION['user']['photo']}";
                        unlink($dir);
                        $sql = "UPDATE users SET name='$name',email='$email',photo='$fileName' WHERE id='$user_id'";
                        if(runQuery($sql)){
                            refreshAccountData($email,$password,'account_setting.php');
                        }
                    }
                }else{
                    $_SESSION['error']['file'] = "{$_FILES['photo']['type']} File type is not supported";
                }
            }

        }


    }

}

function changePassword(){
    $old_pwd= $_POST['old_password'];
    $new_pwd = $_POST['new_password'];
    $hasError = false;
    $confrim_pwd = $_POST['confrim_password'];

    $_SESSION['data']['old_password'] = $old_pwd;
    $_SESSION['data']['new_password'] = $new_pwd;
    $_SESSION['data']['confrim_password'] = $confrim_pwd;
    if(!password_verify($old_pwd,$_SESSION['user']['password']) ||$old_pwd == '' || $new_pwd == '' || $confrim_pwd == ''|| strlen($new_pwd) < 8 || strlen($confrim_pwd) < 8 || $confrim_pwd!= $new_pwd){
        if($old_pwd == ''){
            $_SESSION['error']['old_password'] = "Old Password is Required!";
        }
        else if(!password_verify($old_pwd, $_SESSION['user']['password'])){
            $_SESSION['error']['old_password'] = "Old Password is wrong";
        }
        if($new_pwd == ''){
            $_SESSION['error']['new_password'] = "New Password is Required!";
        }
        if($confrim_pwd == ''){
            $_SESSION['error']['confrim_password'] = "Confrim Password is Required!";
        }
        if(strlen($new_pwd) < 8 || strlen($confrim_pwd) < 8 ){
            $_SESSION['error']['pwd_short'] = "New Password Mush be at Least 8 Character";
        }
        if($confrim_pwd != $new_pwd){
            $_SESSION['error']['pwd_notequal'] = "New Password Must be the Same with Confrim Password";
        }

        $hasError = true;
    }

    if(!$hasError){
        $id = $_SESSION['user']['id'];
        $new_pwd_hash = password_hash($new_pwd,PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$new_pwd_hash' WHERE id=$id";
        if(runQuery($sql)){
            modelAlert("Password has been changed successfully! Please Login with New Password!");
            session_destroy();
            linkTo('login.php');
        }
    }

}

function refreshAccountData($email,$password,$redirect_url = 'dashboard.php'){
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
            linkTo($redirect_url);
        }
    }
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

function subCategoriesByCategoryId($category_id){
    $sql = "SELECT * FROM sub_categories WHERE category_id = $category_id";
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


//post start?\

function addPost(){

    $title = textFilter($_POST['title']);
    $category = textFilter($_POST['category']);
    $subCategory = textFilter($_POST['subCategory']);
    $description = textFilter($_POST['description']);
    $user_id = $_SESSION['user']['id'];
    $supportFileType = ['image/jpeg','image/png','image/jpg'];
    $fileSize = floor($_FILES['photo']['size']/1000000);
    $tempFile = $_FILES['photo']['tmp_name'];
    $fileName = uniqid()."_".$_FILES['photo']['name'];
    if($title == '' || $subCategory == '' || $subCategory == null || $category == '' || $description == '' || $description == null || $fileSize > 5){
        if($title == ''){
            $_SESSION['error']['title'] = "Title is Required!";
        }
        if($category == ''){
            $_SESSION['error']['category'] = "Category is Required!";
        }
        if($subCategory == '' || $subCategory == null){
            $_SESSION['error']['subcategory'] = "Sub Category is Required!";
        }
        if($description == '' || $description == null){
            $_SESSION['error']['description'] = "Description is Required!";
        }
        if($fileSize > 5 ){
            $_SESSION['error']['file'] = "File size must be maximum 5Mb";
        }
        $_SESSION['data']['description'] = $_POST['description'];

    }
    else{
        if(in_array($_FILES['photo']['type'],$supportFileType)){
            $_SESSION['data']['description'] = '';

            $saveFolder = "files/";
            if(move_uploaded_file($tempFile,$saveFolder.$fileName)){
                $sql = "INSERT INTO posts (title,description,user_id,sub_category_id,photo) VALUES ('$title','$description','$user_id','$subCategory','$fileName')";
                if(runQuery($sql)){
                    echo alert('New Post is added','success');
                }
            }
        }else{
            $_SESSION['data']['description'] = $_POST['description'];
            $_SESSION['error']['file'] = "{$_FILES['photo']['type']} File type is not supported";
        }
    }
}
function updatePost(){

    $title = textFilter($_POST['title']);
    $category = textFilter($_POST['category']);
    $subCategory = textFilter($_POST['subCategory']);
    $description = textFilter($_POST['description']);
    $id = textFilter($_POST['id']);
    $user_id = $_SESSION['user']['id'];
    $supportFileType = ['image/jpeg','image/png','image/jpg'];
    $hasError = false;
    if($title == '' || $subCategory == '' || $subCategory == null || $category == '' || $description == '' || $description == null){
        if($title == ''){
            $_SESSION['error']['title'] = "Title is Required!";
        }
        if($category == ''){
            $_SESSION['error']['category'] = "Category is Required!";
        }
        if($subCategory == '' || $subCategory == null){
            $_SESSION['error']['subcategory'] = "Sub Category is Required!";
        }
        if($description == '' || $description == null){
            $_SESSION['error']['description'] = "Description is Required!";
        }
        $_SESSION['data']['description'] = $_POST['description'];
        $hasError = true;
    }


    if($_FILES['photo']['size'] == 0){
        if(!$hasError){
            $sql = "UPDATE posts SET title='$title', description='$description',user_id='$user_id',sub_category_id='$subCategory' WHERE id='$id'";
            if(runQuery($sql)){
                modelAlert("Post is Updated");
                linkTo('post.php');
            }
        }

    }
    else{
        if(!$hasError){
            $fileSize = floor($_FILES['photo']['size']/1000000);
            if($fileSize > 5){
                $_SESSION['error']['file'] = "File size must be maximum 5Mb";
                $_SESSION['data']['description'] = $_POST['description'];

            }
            else{
                $tempFile = $_FILES['photo']['tmp_name'];
                $fileName = uniqid()."_".$_FILES['photo']['name'];

                if(in_array($_FILES['photo']['type'],$supportFileType)){
                    $_SESSION['data']['description'] = '';

                    $saveFolder = "files/";
                    if(move_uploaded_file($tempFile,$saveFolder.$fileName)){
                        removeFile('posts',"id=$id",'photo');
                        $sql = "UPDATE posts SET title='$title', description='$description',user_id='$user_id',sub_category_id='$subCategory',photo='$fileName' WHERE id='$id'";
                        if(runQuery($sql)){
                            modelAlert("Post is Updated");
                            linkTo('post.php');
                        }
                    }
                }else{
                    $_SESSION['data']['description'] = $_POST['description'];
                    $_SESSION['error']['file'] = "{$_FILES['photo']['type']} File type is not supported";
                }
            }

        }


    }

}
function post($id){
    $sql = "SELECT * FROM posts WHERE id = $id";
    return fetch($sql);
}

function posts(){
    $sql = "SELECT * FROM posts ORDER  BY id DESC";
    return fetchAll($sql);
}

function postDelete($id){
      removeFile('posts',"id='$id'",'photo');
      $sql="DELETE FROM posts WHERE id = $id ";
      return runQuery($sql);

}
//post end