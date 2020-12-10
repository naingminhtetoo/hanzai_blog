<?php require_once "layout/front_panel/header.php" ?>
    <title>Hanzai Blog</title>
<?php require_once "layout/front_panel/side_header.php" ?>

<?php
$pageno = 1;
if(isset($_GET['page'])){
    if(is_numeric($_GET['page'])){
        $pageno = $_GET['page'];
    }
}
$data = json_decode(file_get_contents("http://localhost/admin/api/posts.php?page=$pageno"));
?>
<?php require_once "layout/front_panel/ph_nav_bar.php"?>


<header class="container-fluid  p-0">
    <div class="container-xl logo-section d-flex align-items-center p-2 px-4">
        <img src="<?php echo $url; ?>/images/app_title_logo.png" id="app-photo" width="130px" alt="">
        <h1 class="mb-0 ml-2 font-weight-bold" id="app-title"><?php echo $info['name']; ?></h1>
    </div>
</header>
<?php require_once "layout/front_panel/nav_bar.php"; ?>
<div class="container-xl">

    <div class="row">
        <?php include_once "front_panel_posts_list.php"; ?>
        <?php require_once "layout/front_panel/right_side_bar.php"?>
    </div>
</div>

<?php require_once "layout/front_panel/footer.php"?>