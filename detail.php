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
$data = json_decode(file_get_contents("http://localhost/admin/api/posts.php?id=$id"));
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