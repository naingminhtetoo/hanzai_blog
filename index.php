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
$data = json_decode(file_get_contents("$url/api/posts.php?page=$pageno"));
?>
<?php require_once "layout/front_panel/ph_nav_bar.php"?>
<?php require_once "layout/front_panel/app_logo_header.php"?>
<?php require_once "layout/front_panel/nav_bar.php"; ?>
<div class="container-xl">

    <div class="row">
        <?php include_once "front_panel_posts_list.php"; ?>
        <?php require_once "layout/front_panel/right_side_bar.php"?>
    </div>
</div>

<?php require_once "layout/front_panel/footer.php"?>
<script>
    $(".nav-item").removeClass("active");
    $(".nav-home").addClass("active");
</script>
