<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";
if(!isset($_GET['id'])){
    linkTo('post.php');
}

$id = $_GET['id'];
$current = post($id);
if($current == null){
    echo "<script>alert('Something is wrong!')</script>";
    linkTo('post.php');
}
?>

<section class="main-section">
    <div class="container-fluid mx-2">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-2">
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card mb-4 border-0 shadow-sm overflow-auto">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="feather-info text-primary"></i>  Post Detail
                            </h5>
                            <div class="d-flex">

                                <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary btn-sm">
                                    <i class="feather-plus-circle"></i>
                                </a>
                                <a href="<?php echo $url; ?>/post.php" class="ml-2 btn btn-outline-info btn-sm">
                                    <i class="feather-list"></i>
                                </a>
<!--                                <div class="ml-2 btn btn-outline-secondary btn-sm box-toggle"title="Maximized and Minized">-->
<!--                                    <i class="feather-maximize-2"></i>-->
<!--                                </div>-->
                            </div>
                        </div>


                        <hr>


                        <h4>
                            <?php echo $current['title']; ?>
                        </h4>

                        <span class="my-3">
                            <span class="mr-2">
                                <i class="feather-user text-primary"></i>
                                <?php echo user($current['user_id'])['name']; ?>
                            </span>
                            <span class="mr-2">
                                <i class="feather-layers text-success"></i>
                                <span>
                                <?php echo category(subCategory($current['sub_category_id'])['category_id'])['name']; ?>
                                (<small>
                                    <?php echo subCategory($current['sub_category_id'])['name']; ?>
                                </small>)
                            </span>
                            </span>
                            <span class="">
                                <i class="feather-calendar text-danger"></i>
                                <?php echo date("j M Y",strtotime($current['created_at'])); ?>
                            </span>
                        </span>
                        <div>
                            <?php
                                $share_url = rawurlencode($url."/detail.php?id={$current['id']}");
                            ?>
                            <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo $share_url; ?>&layout=button&size=small&appId=2343078929128737&width=67&height=20" width="67" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                        <div>
                            <img src="files/<?php echo $current['photo'] ?>" class="img-fluid" alt="">
                        </div>
                        <div class="mt-4">
                            <?php echo html_entity_decode($current['description'],ENT_QUOTES); ?>
                        </div>
                    </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "layout/pre-footer.php" ?>
<script>

    $(function() {
        $(".app-name").text("Post");
        $(".list").removeClass("list-selected");
        $(".listPost").addClass("list-selected");
        // scrollLoad();
    });
</script>

<?php
clearError();
?>
<?php require_once "layout/footer.php" ?>


