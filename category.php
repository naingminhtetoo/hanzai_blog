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
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center">
                            <h5 class="mb-0">
                                <i class="feather-layers text-primary"></i> Category
                            </h5>

                        </div>
                        <hr>
                        <?php

                        if(isset($_POST['addCat'])){
                            categoryAdd();
                        }

                        ?>
                        <form method="post">

                            <div class="form-inline">
                                <input type="text" class="form-control mr-2" name="name" placeholder="New Category" required>
                                <button class="btn btn-primary" name="addCat">Add Category</button>
                            </div>
                            <?php
                            if(isset($_SESSION['error']['name'])){
                                ?>
                                <small class="text-danger font-weight-bold">
                                    <?php echo $_SESSION['error']['name'] ?>
                                </small>
                                <?php
                            }
                            ?>
                        </form>
                        <?php include 'category_list.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "layout/pre-footer.php" ?>
<script>

    $(function() {
        $(".app-name").text("Category");
        $(".list").removeClass("list-selected");
        $(".listCategory").addClass("list-selected");
        // scrollLoad();
    });
</script>

<?php
clearError();
?>
<?php require_once "layout/footer.php" ?>


