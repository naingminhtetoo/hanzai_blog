<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";
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
            <div class="col-12">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="feather-layers text-primary"></i> Post List
                            </h5>
                            <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary btn-sm">
                                <i class="feather-plus-circle"></i>
                            </a>
                        </div>
                        <hr>

                        <?php include 'post_list.php'; ?>
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


