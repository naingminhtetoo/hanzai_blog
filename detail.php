<?php require_once "layout/front_panel/header.php" ?>
    <title>Hanzai Blog</title>
<?php require_once "layout/front_panel/side_header.php" ?>

<?php
$pageno = 1;
if(isset($_GET['id'])){
    if(is_numeric($_GET['id'])){
        $id = $_GET['id'];
    }
    else{
        $id=0;
    }
}
else{
    $id=0;
}
$data = json_decode(file_get_contents("$url/api/posts.php?id=$id"));
session_start();
if(isset($_SESSION['user']['id'])){
    $userId = $_SESSION['user']['id'];
}else{
    $userId = 0;
}

viewerRecord($userId, $id, $_SERVER['HTTP_USER_AGENT']);
?>
<?php require_once "layout/front_panel/ph_nav_bar.php"?>
<?php require_once "layout/front_panel/app_logo_header.php"?>

<?php require_once "layout/front_panel/nav_bar.php"; ?>
    <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="mt-3">
                        <ol class="breadcrumb m-0 p-0 bg-white">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        <div class="row">
            <?php include_once "front_panel_view_post_list.php"; ?>
            <?php require_once "layout/front_panel/right_side_bar.php"?>
        </div>
    </div>

<?php require_once "layout/front_panel/footer.php"?>

