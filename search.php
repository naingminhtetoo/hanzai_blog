<?php require_once "layout/front_panel/header.php" ?>
    <title>Hanzai Blog</title>
<?php require_once "layout/front_panel/side_header.php" ?>

<?php
if(!isset($_GET['search_text'])){
    linkTo('index.php');
}

$pageno = 1;
if(isset($_GET['page'])){
    if(is_numeric($_GET['page'])){
        $pageno = $_GET['page'];
    }
}
$text = rawurlencode($_GET['search_text']);

$data = json_decode(file_get_contents("$url/api/posts_by_search.php?search_text=$text&page=$pageno"));
?>
<?php require_once "layout/front_panel/ph_nav_bar.php"?>
<?php require_once "layout/front_panel/app_logo_header.php"?>
<?php require_once "layout/front_panel/nav_bar.php"; ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="mt-3">
                    <h6 class="">Search Results By <span class="text-primary font-weight-bold"><?php echo $_GET['search_text'] ?></span></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <?php include_once "search_result_list.php"; ?>
            <?php require_once "layout/front_panel/right_side_bar.php"?>
        </div>
    </div>

<?php require_once "layout/front_panel/footer.php"?>
    <script>
        $(".nav-item").removeClass("active");
        $(".nav-home").addClass("active");
    </script>
